<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        //
        'project_name' => $faker->company . "様の件",
        'customer_id' => $faker->numberBetween(1, 50),
        'industory_id' => $faker->numberBetween(1, 3),
        'sales_amount' => $faker->numberBetween($min = 500000, $max =1000000),
        'product_id' => $faker->numberBetween(1, 3),
        'start_date' => $faker->dateTimeThisYear($max = '2019-12-31 12:59:00',$timezone = "Asia/Tokyo")->format('Y-m-d'),
        'sintyokuritu' => $faker->randomElement(['10','20','30','40','50','60','70','80','90']),
        'close_date' => $faker->dateTimeThisYear($min = '2019-06-01 12:59:00',$timezone = "Asia/Tokyo")->format('Y-m-d'),
        'created_at' => $faker->dateTimeBetween($startDate = '2021-01-01 00:00:00',$endDate = '2021-12-31 12:59:00',$timezone = "Asia/Tokyo")->format('Y-m-d'),
        // 'created_at' => $faker->dateTimeThisYear($max = '2019-12-31 12:59:00',$timezone = "Asia/Tokyo"),
        'sales_date' => $faker->dateTimeThisYear($max = '2019-12-31 12:59:00',$timezone = "Asia/Tokyo")->format('Y-m-d'),
        'updated_at' => $faker->dateTimeBetween($startDate = '2016-01-01 00:00:00',$endDate = '2016-12-31 12:59:00',$timezone = "Asia/Tokyo")->format('Y-m-d'),
    ];
});
