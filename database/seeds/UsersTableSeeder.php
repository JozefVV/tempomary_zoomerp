<?php

use App\Models\User;
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
        // DB::table('users')->truncate();

        factory(User::class)->state('superadmin')->create();
        factory(User::class, 2)->state('admin')->create();
        factory(User::class, 2)->state('manager')->create();
        factory(User::class, 5)->state('user')->create();


        factory(User::class)->state('admin')->create([
            'email' => 'admin@example.com'
        ]);
        factory(User::class)->state('user')->create([
            'email' => 'tester@example.com'
        ]);
        factory(User::class)->state('manager')->create([
            'email' => 'manager@example.com'
        ]);
    }
}
