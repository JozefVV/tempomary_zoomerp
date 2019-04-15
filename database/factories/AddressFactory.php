<?php

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street_number' => $faker->buildingNumber,
        'street_name' => $faker->streetName ,
        'post_code' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country,
        'latitude' => $faker->latitude($min = -90, $max = 90) ,
        'longitude' => $faker->longitude($min = -180, $max = 180) ,
    ];
});
