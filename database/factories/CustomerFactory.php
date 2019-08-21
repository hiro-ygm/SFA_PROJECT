<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile_telno' => $faker->phoneNumber,
        'company_name' => $faker->company,
        'department' => $faker->randomElement($array = ['社長', '部長', '課長', '係長']),
        'rank' => $faker->randomElement($array = ['A', 'B', 'C', 'D']),
        'industory_id' => $faker->numberBetween($min = 1, $max = 4),
        'image_url' => $faker->imageUrl($width = 640, $height = 480, $category = 'cats', $randomize = true, $word = null),
    ];
});
