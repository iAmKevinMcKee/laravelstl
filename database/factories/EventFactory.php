<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'topic' => $faker->word,
        'date' => $faker->dateTimeThisMonth($min = 'now'),
        'speaker' => $faker->name,
        'video_url' => null,
        'created_by' => 1
    ];
});
