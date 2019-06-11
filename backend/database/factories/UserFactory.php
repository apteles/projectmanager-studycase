<?php

use Faker\Generator as Faker;

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

$factory->define(\CodeProject\Entities\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(\CodeProject\Entities\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence
    ];
});

$factory->define(CodeProject\Entities\Project::class, function (Faker $faker) {
    return [
        'owner_id' => rand(1,10),
        'client_id' => rand(1,10),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'progress' => rand(1,100),
        'status' => rand(1,3),
        'due_date' => $faker->dateTime('now')
    ];
});

$factory->define(CodeProject\Entities\ProjectMembers::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,10),
        'user_id' => rand(1,10)
    ];
});

$factory->define(CodeProject\Entities\ProjectNote::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,10),
        'title' => $faker->word,
        'note' => $faker->paragraph,
    ];
});

