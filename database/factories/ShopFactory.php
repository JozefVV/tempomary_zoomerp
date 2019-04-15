<?php

use App\Models\Shop;
use App\Models\Address;
use App\Models\Warehouse;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    $address_id = factory(Address::class)->create()->id;
    $warehouse_id = factory(Warehouse::class)->state('noAddress')->create(['address_id'=>$address_id])->id;
    
    return [
        'name' => $faker->company,
        'email' => $faker->email,
        'warehouse_id' => $warehouse_id,
        'address_id' => $address_id,
        'phone' => $faker->phoneNumber,
    ];
});
