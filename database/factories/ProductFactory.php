<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $images = '';
    for ($i = $faker->numberBetween(1, 5); $i >= 0; $i--) {
        $images = $images."'img/products/product-".$faker->numberBetween(1, 14).".jpg',";
    }
    return [
        'images' => $images,
        'available' => $faker->boolean,
        'qty' => $faker->randomNumber(3),
        'price' => $faker->numberBetween(10000, 100000),
        'title' => $faker->sentence,
        'about' => $faker->paragraph,
    ];
});
