<?php

use App\User;
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
        DB::table('users')->truncate();

        User::create([
            'role_id' => 1,
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@admins.com',
            'password' => Hash::make('Superadmin123'),
            'remember_token' => str_random(10)
        ]);

        factory(User::class,10)->create();
    }
}
