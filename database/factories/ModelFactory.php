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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'nickname' => $faker->userName,
        'dni' => rand(12000000, 42000000),
        'email' => $faker->unique()->safeEmail,
        'telefono' => '('.rand(386, 388).') '.rand(2, 7).'-'.rand(111111, 999999),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'registro_id' => 1,
        'rol_id' => 1
    ];
});
