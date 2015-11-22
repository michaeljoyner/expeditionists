<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase {

    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_registers_a_user()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $currentUser = factory('App\User')->create();
        $currentUser->assignRole($role);
        $userDetails = factory('App\User')->make();

        $userDetailsArray = $userDetails->toArray();
        $userDetailsArray['password'] = 'password';
        $userDetailsArray['password_confirmation'] = 'password';


        $this->actingAs($currentUser)
            ->visit('/admin/register')
            ->submitForm('Register', $userDetailsArray);

        $this->seeInDatabase('users', $userDetails->toArray());
    }

    /**
     * @test
     */
    public function it_does_not_allow_a_non_admin_user_to_create_users()
    {
        $newUserDetails = factory(User::class)->make()->toArray();
        $newUserDetails['password'] = 'password';
        $newUserDetails['password_confirmation'] = 'password';
        $user = factory(User::class)->create();

        $this->assertFalse($user->hasRole('admin'));

        try {
            $this->actingAs($user)
                ->visit('/admin/register')
                ->submitForm('Register', $newUserDetails)
                ->notSeeInDatabase('users', [
                    'name' => $newUserDetails['name'],
                    'email' => $newUserDetails['email']
                ]);
        } catch (Exception $e) {
            $this->assertContains ("Received status code [403]",$e->getMessage());
        }

    }

    /**
     * @test
     */
    public function it_creates_default_user_without_a_role()
    {
        $this->asAnAdminUser();

        $newUser = factory(User::class)->make(['password' => 'password']);
        $this->visit('/admin/register')
            ->submitForm('Register', array_merge($newUser->toArray(), ['password' => 'password', 'password_confirmation' => 'password']))
            ->seeInDatabase('users', [
                'name' => $newUser->name,
                'email' => $newUser->email
            ]);

        $testUser = User::where('email', $newUser->email)->first();

        $this->assertFalse($testUser->hasRole('admin'));
    }

    /**
     * @test
     */
    public function it_can_create_an_admin_user()
    {
        $this->asAnAdminUser();

        $newUser = factory(User::class)->make();

        $this->visit('/admin/register')
            ->submitForm('Register', array_merge($newUser->toArray(), [
                'password' => 'password',
                'password_confirmation' => 'password',
                'is_admin' => 'on'
            ]))
            ->seeInDatabase('users', [
                'name' => $newUser->name,
                'email' => $newUser->email
            ]);

        $testUser = User::where('email', $newUser->email)->first();
        $this->assertTrue($testUser->hasRole('admin'), 'The user has an admin role');

    }



    /**
     * @test
     */
    public function it_wont_register_with_a_duplicate_email()
    {
        $currentUser = factory('App\User')->create();

        $validUser = factory('App\User')->create(['name' => 'Good Joe', 'email' => 'joe@example.com']);

        $userDetails = [
            'name' => 'Bad Joe',
            'email' => 'joe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $this->actingAs($currentUser)
            ->visit('/admin/register')
            ->submitForm('Register', $userDetails)
            ->see('that email has already been taken');

        $this->seeInDatabase('users', $validUser->toArray());
        $this->notSeeInDatabase('users', ['name' => 'Bad Joe', 'email' => 'joe@example.com']);
    }

    /**
     * @test
     */
    public function a_user_can_be_edited()
    {
        $this->asAnAdminUser();
        $validUser = factory('App\User')->create(['name' => 'Good Joe', 'email' => 'joe@example.com']);

        $this->visit('/admin/users/'.$validUser->id.'/edit')
            ->type('Bad Joe', 'name')
            ->type('badjoe@example.com', 'email')
            ->press('Save');

        $this->seeInDatabase('users', ['id' => $validUser->id, 'name' => 'Bad Joe', 'email' => 'badjoe@example.com']);
        $this->notSeeInDatabase('users', ['name' => 'Good Joe', 'email' => 'joe@example.com']);
    }

    /**
     * @test
     */
    public function it_can_only_be_updated_by_an_admin_or_by_the_owner()
    {
        $adminUser = $this->makeAdminUser();
        $owner = factory(User::class)->create();
        $noseyParker = factory(User::class)->create();

        $this->actingAs($adminUser)
            ->visit('/admin/users/'.$owner->id.'/edit')
            ->type('Rob Stark', 'name')
            ->type('robbo@winterfell.con', 'email')
            ->press('Save')
            ->seeInDatabase('users', [
                'id' => $owner->id,
                'name' => 'Rob Stark',
                'email' => 'robbo@winterfell.con'
            ]);

        $this->actingAs($owner)
            ->visit('/admin/users/'.$owner->id.'/edit')
            ->type('Robert Stark', 'name')
            ->type('robert@winterfell.con', 'email')
            ->press('Save')
            ->seeInDatabase('users', [
                'id' => $owner->id,
                'name' => 'Robert Stark',
                'email' => 'robert@winterfell.con'
            ]);

        $this->actingAs($noseyParker)
            ->visit('/admin/users/'.$owner->id.'/edit');

        try {
            $this->type('Tywin Lannister', 'name')
                ->type('tyty@casterly.con', 'email')
                ->press('Save');
        } catch (Exception $e) {
            $this->assertContains ("Received status code [403]",$e->getMessage());
        }

        $this->notSeeInDatabase('users', [
            'id' => $owner->id,
            'name' => 'Tywin Lannister',
            'email' => 'tyty@casterly.con'
        ]);


    }

    /**
     * @test
     */
    public function it_deletes_a_user()
    {
        $this->asAnAdminUser();
        $user2 = factory('App\User')->create();

        $this->withoutMiddleware();
        $this->call('DELETE', '/admin/users/'.$user2->id);
        $this->notSeeInDatabase('users', $user2->toArray());
    }

    /**
     * @test
     */
    public function it_can_only_be_deleted_by_an_admin_user()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user1 = factory(User::class)->create();
        $user1->assignRole($role);
        $user2 = factory(User::class)->create();
        $test1 = factory(User::class)->create(['name' => 'Eddard Stark']);
        $test2 = factory(User::class)->create(['name' => 'Joffrey Baratheon']);

        $this->withoutMiddleware();
        $this->actingAs($user1)
            ->call('DELETE', '/admin/users/'.$test2->id);

        $this->notSeeInDatabase('users', ['id' => $test2->id, 'name' => 'Joffrey Baratheon']);

        $this->actingAs($user2);

        try {
            $this->call('DELETE', '/admin/users/'.$test1->id);
        } catch (Exception $e) {
            $this->assertContains ("Received status code [403]",$e->getMessage());
        }

        $this->seeInDatabase('users', ['id' => $test1->id, 'name' => 'Eddard Stark']);
    }

    /**
     * @test
     */
    public function it_wont_delete_the_final_user()
    {
        $user1 = factory('App\User')->create();
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user1->assignRole($role);

        $this->withoutMiddleware();
        $this->actingAs($user1);
        $this->call('DELETE', '/admin/users/'.$user1->id);
        $this->seeInDatabase('users', [
            'id' => $user1->id,
            'name' => $user1->name,
            'email' => $user1->email
        ]);
    }

    /**
     * @test
     */
    public function a_user_can_reset_their_password()
    {
        $user = $this->asLoggedInUser(['email' => 'joe@example.com', 'password' => 'password']);

        $this->visit('/admin/users/password/reset')
            ->submitForm('Reset Password', [
                'current_password' => 'password',
                'password' => 'newpassword',
                'password_confirmation' => 'newpassword'
            ])->seeInDatabase('users', ['id' => $user->id, 'email' => 'joe@example.com']);

        \Illuminate\Support\Facades\Auth::logout();
        $this->visit('/admin/login')
            ->submitForm('Login', [
                'email' => 'joe@example.com',
                'password' => 'newpassword'
            ])->seePageIs('/admin');
    }


}