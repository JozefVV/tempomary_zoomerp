<?php

use App\Models\Address;
use App\Models\Warehouse;
use Faker\Generator as Faker;

$factory->define(Warehouse::class, function (Faker $faker) {
    $address_id = factory(Address::class)->create()->id;
    return [
        'name'=> $faker->company,
        'address_id' => $address_id
    ];
});

$factory->state(Warehouse::class, 'noAddress', function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
