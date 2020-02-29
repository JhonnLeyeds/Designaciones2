<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{



	protected  $table = 'student';
    protected  $fillable =
    [
    	'nombre',
    	'ap_pat',
        'ap_mat',
        'ci',
        'exp',
        'date',
        'celular',
        'correo',
        'sexo',
        'depart_id',
		'univ_id',
        'insti_id',
        'carrer_id',
        'caso_esp',

    ];
}
