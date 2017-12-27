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

$factory->define(App\User::class, function () {
    static $password;

    $faker = \Faker\Factory::create('es_AR');
    $dni = rand(12000000, 42000000);
    $matricula = 'MP-'.$dni.'-'.rand(2015,2018);

    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'nickname' => $faker->userName,
        'dni' => $dni,
        'matricula' => $matricula,
        'email' => $faker->unique()->safeEmail,
        'telefono' => '('.rand(386, 388).') '.rand(2, 7).'-'.rand(100000, 999999),
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'registro_id' => 1,
        'image_path' => 'user.png'
    ];
});

$factory->define(App\Vehiculo::class, function (Faker $faker) {
    return [
        'dominio' => function () {
            $alphas = range('a', 'z');
            $selected = array_rand($alphas, 3);
            $letters = $alphas[$selected[0]].$alphas[$selected[1]].$alphas[$selected[2]];
            return strtoupper($letters.rand(100,999));
        },
        'tipo_vehiculo_id' => 1
    ];
});

$factory->define(App\Informe::class, function (Faker $faker) {
    return [
        'estado_tramite_id' => rand(1, 3),
        'tipo_tramite_id' => rand(2, 8),
        'vehiculo_id' => factory(\App\Vehiculo::class)->create()->id,
        'usuario_id' => rand(4, 53),
        'registro_id' => rand(2, 8),
        'numero_tramite' => rand(1000, 5000),
        'observaciones' => function () {
            $options = rand(1, 4);
            switch ($options) {
                case 1:
                    return 'Falta firma de consentimiento de conyuge.';
                    break;
                case 2:
                    return 'Debe comprobante de cancelación de prenda.';
                    break;
                case 3:
                    return 'Debe abonar diferencia de arancel.';
                    break;
                case 4:
                    return null;
                    break;
                default:
                    return null;
                    break;
            }
        }
    ];
});

$factory->define(App\Consulta::class, function (Faker $faker) {
    $informe = factory(App\Informe::class)->make(['estado_tramite_id' => rand(2, 3)]);
    
    repeat_inf:
    try {
        $informe->save();
    } catch (\Illuminate\Database\QueryException $e) {
        $informe = factory(App\Informe::class)->make(['estado_tramite_id' => rand(2, 3)]);
        goto repeat_inf;
    }
    
    return [
        'informe_id' => $informe->id,
        'registro_id' => $informe->registro->id,
        'consulta' => $faker->text(200),
        'respuesta' => function () use ($faker) {
            $rta = rand(0, 1);
            switch ($rta) {
                case 0:
                    return null;
                    break;
                case 1:
                    return $faker->text(200);
                    break;
                default:
                    return null;
                    break;
            }
        },
        'usuario_asistente_id' => rand(2, 3)
    ];
});
