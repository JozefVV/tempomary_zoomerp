<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


$factory->define(App\User::class,function (Faker $faker) {
    return [
        'firstname' => $name = $faker->firstName,
        'lastname' => $faker->lastName,
        'nickname' => $name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('Secret'),
        'remember_token' => str_random(10),
        'enabled' => true,
    ];
});

$factory->state(App\User::class, 'superadmin', function ($user, $faker) {
    return [
        'firstname' => 'Super',
        'lastname' => 'Admin',
        'email' => 'superadmin@example.org',
        'remember_token' => str_random(10),
        'password' => Hash::make('12345678')
    ];
});
$factory->afterCreatingState(App\User::class, 'superadmin', function ($user, $faker) {
    $user->assignRole('superadmin');
});

$factory->afterCreatingState(App\User::class, 'admin', function ($user, $faker) {
    $user->assignRole('admin');
});

$factory->afterCreatingState(App\User::class, 'manager', function ($user, $faker) {
    $user->assignRole('manager');
});

$factory->afterCreatingState(App\User::class, 'user', function ($user, $faker) {
    $user->assignRole('user');
});

