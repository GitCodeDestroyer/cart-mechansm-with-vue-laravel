<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'owner_id' => $faker->numberBetween(1, DB::table('users')->count()),
        'product_id' => $faker->numberBetween(1, DB::table('products')->count()),
    ];
});
