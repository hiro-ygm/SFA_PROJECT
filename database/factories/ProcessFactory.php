<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Process::class, function (Faker $faker) {
    return [
        'contact_date' => $faker->dateTimeBetween($startDate = '2018-01-01 00:00:00', $endDate = '2018-08-31 00:00:00', $timezone = "Asia/Tokyo"),
        // 'contact_date' => $faker->dateTimeBetween($startDate = '-5 months', $endDate = '2019-12-31 00:00:00' ),
        // 'purpose' => $faker->randomElement(['ヒアリング','見積提示','案件発生','成約']),
        'purpose' => $faker->randomElement(['ヒアリング','ヒアリング','ヒアリング','見積提示','見積提示','見積提示','クロージング','クロージング','成約']),
        // 'purpose' => 'ヒアリング',
        // 'purpose' => '案件発生',
        'progress_rate' => $faker->randomElement(['10','20','30','40','50','60','70','80','90',]),
        'user_id' => $faker->numberBetween(1, 10),
        'customer_id' => $faker->numberBetween(1, 10),
        'industory_id' => $faker->numberBetween(1, 3),
        'memo' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        'done' => $faker->boolean(30),
    ];
});
