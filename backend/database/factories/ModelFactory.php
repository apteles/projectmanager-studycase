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

$factory->define(\ProjectManager\Entities\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => date("Y-m-d H:i:s"),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(\ProjectManager\Entities\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence
    ];
});

$factory->define(ProjectManager\Entities\Project::class, function (Faker $faker) {
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

$factory->define(ProjectManager\Entities\ProjectMembers::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,10),
        'user_id' => rand(1,10)
    ];
});

$factory->define(ProjectManager\Entities\ProjectNote::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,10),
        'title' => $faker->word,
        'note' => $faker->paragraph,
    ];
});

$factory->define(ProjectManager\Entities\OAuthClient::class, function (Faker $faker) {
    return [
      'id' => 'appid1',
      'secret' => 'secret',
      'name' => 'applaravel'
    ];
});

$factory->define(ProjectManager\Entities\ProjectTask::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'project_id' => rand(1,10),
        'start_date' => $faker->dateTime('now'),
        'due_date' =>$faker->dateTime('now'),
        'status' => rand(1,100)
    ];
});
