<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'full_name' => 'Jakub Kohout',
        'username' => 'Admin',
        'email' => 'test@gmail.com',
        'password' => bcrypt('Uchiha'),
        'role_id' => 1
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'id' => 1,
        'name' => 'google',
        'url' => 'http://www.google.com',
        'email' => 'google@gmail.com',
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker, $values) {
    return [
        'role_name' => $values['role_name'],
    ];
});

$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'permission_name' => 'approve benchmarks',
    ];
});

$factory->define(App\KeywordsPlan::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->date,
        'approved' => true,
        'company_id' => 1
    ];
});

$factory->define(App\Keyword::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->word
    ];
});