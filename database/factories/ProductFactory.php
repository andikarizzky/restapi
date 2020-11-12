<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "detail" => $faker->paragraph,
        "price" => $faker->numberBetween(100,1000),
        "stock" => $faker->randomDigit,
        "discount" => $faker->numberBetween(2,30),
        "user_id" => function(){
        	return \App\User::all()->random();
        }
    ];
});

// php artisan make:model Product -fmr
// php artisan make:model Review -fmr

// php artisan tinker

// factory(\App\Product::class,50)->create()

// factory(\App\Review::class,50)->create()

// exit
