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

        factory(User::class)->state('superadmin')->create();
        factory(User::class,3)->state('admin')->create();
        factory(User::class,5)->state('manager')->create();
        factory(User::class,30)->state('user')->create();
    }
}
