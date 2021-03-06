<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Movie;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname'  => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'password', // password
        'remember_token' => Str::random(10),
        'birthdate' => $faker->date()
    ];
});

$factory->define(Movie::class, function(Faker $faker){
    return [
        'title' => $faker->unique()->companyEmail,
        'year' => $faker->year,
        'imdb_id' => $faker->postcode,
    ];
});