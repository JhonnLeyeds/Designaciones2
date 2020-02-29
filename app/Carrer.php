<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{


    protected  $table = 'carrer';

    protected  $fillable =
    [
    	'nombre',
    	 'univ_id',
    	 'insti_id',

    ];


    public static function carrer($id){

    	return Carrer::where( 'faculty_id' , '=' , $id )->get();

    }
}
