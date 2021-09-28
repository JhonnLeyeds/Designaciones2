<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
	protected  $table = 'departamentos';
	protected $fillable =
	[
		'nombre',
		'cod_depa',
		'user_create',
	];
	protected static function show_department($id){
		return $show_department = \DB::table('departamentos')
            ->join('users','users.id','=','departamentos.user_create')
					->where('departamentos.id','=',$id)
            ->get([
				'departamentos.id',
				'departamentos.nombre',
				'departamentos.cod_depa',
				'departamentos.created_at',
				'departamentos.updated_at',
				'users.name',
			]);
	}
	protected static function edit_department($id){
		return $role = \DB::table('departamentos')->where('departamentos.id','=',$id)->get();
	}
}
