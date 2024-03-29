<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Review;
use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        //
        'customer' => $faker->name,
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5),
        'product_id' => function(){
          return Product::all()->random();
        }
    ];
});
