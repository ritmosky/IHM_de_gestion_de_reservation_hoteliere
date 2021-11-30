<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Guest::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name'  => $faker->lastName(),
        'address'    => $faker->streetAddress(),
        'code_postal'   => $faker->numerify('##-###'),
        'ville'      => $faker->city(),
        'num_id'      => $faker->numerify('###########'),
        'contact'    => 'test contact',
    ];
});

$factory->state(App\Models\Guest::class, 'polish', function () {
    $faker = \Faker\Factory::create('pl_PL');

    return [
        'first_name' => $faker->firstName(),
        'last_name'  => $faker->lastName(),
        'address'    => $faker->streetAddress(),
        'code_postal'   => $faker->postcode(),
        'ville'      => $faker->city(),
        'num_id'      => $faker->num_id(),
        'contact'    => 'test contact',
    ];
});

$factory->state(App\Models\Guest::class, 'german', function () {
    $faker = \Faker\Factory::create('de_DE');

    return [
        'first_name' => $faker->firstName(),
        'last_name'  => $faker->lastName(),
        'address'    => $faker->streetAddress(),
        'code_postal'   => $faker->numerify('##-###'),
        'ville'      => $faker->city(),
        'num_id'      => $faker->numerify('###########'),
        'contact'    => 'test contact',
    ];
});

$factory->state(App\Models\Guest::class, 'belarus', function () {
    $faker = \Faker\Factory::create('bg_BG');

    return [
        'first_name' => $faker->firstName(),
        'last_name'  => $faker->lastName(),
        'address'    => $faker->streetAddress(),
        'code_postal'   => $faker->numerify('##-###'),
        'ville'      => $faker->city(),
        'num_id'      => $faker->numerify('###########'),
        'contact'    => 'test contact',
    ];
});

$factory->state(App\Models\Guest::class, 'french', function () {
    $faker = \Faker\Factory::create('fr_FR');

    return [
        'first_name' => $faker->firstName(),
        'last_name'  => $faker->lastName(),
        'address'    => $faker->streetAddress(),
        'code_postal'   => $faker->numerify('##-###'),
        'ville'      => $faker->city(),
        'num_id'      => $faker->numerify('###########'),
        'contact'    => 'test contact',
    ];
});

$factory->state(App\Models\Guest::class, 'czech', function () {
    $faker = \Faker\Factory::create('cs_CZ');

    return [
        'first_name' => $faker->firstName(),
        'last_name'  => $faker->lastName(),
        'address'    => $faker->streetAddress(),
        'code_postal'   => $faker->numerify('##-###'),
        'ville'      => $faker->city(),
        'num_id'      => $faker->numerify('###########'),
        'contact'    => 'test contact',
    ];
});
