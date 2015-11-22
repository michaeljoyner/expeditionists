<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $user = factory(\App\User::class)->create(['email' => 'joe@example.com', 'password' => 'password']);
        $user->assignRole($role);
        $user->addProfile();
        $user->profile->addGallery('my images');

        $user2 = factory(\App\User::class)->create(['email' => 'jack@example.com', 'password' => 'password']);
        $user2->addProfile();
        $user2->profile->addGallery('my images');

    }
}
