<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Concert::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'subtitle' => $faker->sentence,
        'date' => Carbon::parse('+2 weeks'),
        'ticket_price' => $faker->randomNumber(2),
        'venue' => $faker->name,
        'venue_address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'additional_information' => $faker->sentence,
    ];
});

$factory->state(App\Models\Concert::class, 'published', function($faker) {
    return [
        'published_at' => Carbon::parse('-1 week'),
    ];
});

$factory->state(App\Models\Concert::class, 'unpublished', function($faker) {
    return [
        'published_at' => null,
    ];
});

