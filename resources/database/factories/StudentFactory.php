<?php


use App\Student;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Student::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'ap_pat' => $faker->firstNameMale,
        'ap_mat' => $faker->firstNameFemale,
        'ci' => $faker->unique()->unixTime,
        'exp' => $faker->countryCode ,
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'celular' => $faker->unique()->phoneNumber,
        'correo' => $faker->unique()->safeEmail,
        'sexo' => $faker->firstNameMale,
        'depart_id' => $faker->state,
        'univ_id' => $faker->unique()->company,
        'insti_id' => $faker->unique()->company,
        'carrer_id' => $faker->unique()->company,
        'caso_esp' => $faker->unique()->company,
    ];
});
