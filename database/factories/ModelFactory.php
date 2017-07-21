<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'is_admin' => rand(0,1),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];

});

/*
 * Factory to make category
 */
$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->unique()->word,
        'description' => $faker->sentence,
    ];

});

/*
 * Factory to make posts and relate them to a random category available
 */
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph(50),
        'status' => rand(0, 1),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }

    ];

});

