<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


$factory->define(User::class,function (Faker $faker) {
    return [
        'firstname' => $name = $faker->firstName,
        'lastname' => $faker->lastName,
        'nickname' => $name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('12345678'),
        'remember_token' => str_random(10),
        'enabled' => true,
    ];
});

$factory->state(User::class, 'superadmin', function ($user, $faker) {
    return [
        'firstname' => 'Super',
        'lastname' => 'Admin',
        'email' => env("DEV_LOGIN_SUPERADMIN_EMAIL", "superadmin@example.com"),
        'remember_token' => str_random(10),
        'password' => Hash::make(env("DEV_LOGIN_SUPERADMIN_PASSWORD", "12345678"))
    ];
});
$factory->afterCreatingState(User::class, 'superadmin', function ($user, $faker) {
    $user->assignRole('superadmin');
});

$factory->afterCreatingState(User::class, 'admin', function ($user, $faker) {
    $user->assignRole('admin');
});

$factory->afterCreatingState(User::class, 'manager', function ($user, $faker) {
    $user->assignRole('manager');
});

$factory->afterCreatingState(User::class, 'user', function ($user, $faker) {
    $user->assignRole('user');
});

