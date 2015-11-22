<?php

use App\User;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function asLoggedInUser(array $defaults = [])
    {
        $user = factory(User::class)->create($defaults);
        $this->actingAs($user);

        return $user;
    }

    protected function makeAdminUser()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user = factory(User::class)->create();
        factory(\App\Profile::class)->create(['user_id' => $user->id]);
        $user->assignRole($role);

        return $user;
    }

    protected function asAnAdminUser()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user = factory(User::class)->create();
        factory(\App\Profile::class)->create(['user_id' => $user->id]);
        $user->assignRole($role);
        $this->actingAs($user);
    }
}
