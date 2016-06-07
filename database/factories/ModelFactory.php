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
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\models\Usuarios::class, function (Faker\Generator $faker) {
    return [
        'usuario' => $faker->name,
        'pass' => $faker->name,
        'nombre' => $faker->name,
        'imagen' => $faker->name,
        'id_rol' => $faker->name,
        'id_depto' => $faker->name,
        'id_empresa'=> $faker->name,
        'visible' => $faker->name,
    ];
});

$factory->define(App\models\Menu::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_padre' => $faker->name,
        'url' => $faker->name,
        'icono'=> $faker->name,
        'clase'=> $faker->name,
        'visible'=> $faker->name,
    ];
});

$factory->define(App\models\Empresas::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Departamento::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_empresa' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Roles::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'nombre' => $faker->name,
        'id_depto' => $faker->name,
        'visible' => $faker->name
    ];
});

$factory->define(App\models\Permisos_rol::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'id_menu' => $faker->name,
        'id_rol' => $faker->name,
        'id_depto' => $faker->name,
        'id_empresa' => $faker->name,
        'agregar' => $faker->name,
        'eliminar' => $faker->name,
        'reportes' => $faker->name,
        'visible' => $faker->name
    ];
});