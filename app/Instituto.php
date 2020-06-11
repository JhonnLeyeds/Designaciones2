<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
	protected  $table = 'institutes';
    protected $fillable =
	[
        'nombre','depart_id',
    ];
    protected static function view_intitutes(){
        return \DB::table('institutes')
            ->join('municipalities','municipalities.id','=','institutes.municipality_id')                   
            ->get([
                'institutes.id',
                'institutes.name_institute',
                'institutes.created_at',
                'institutes.updated_at',
                'municipalities.name_municipality',
            ]);
    }
    protected static function show_instituto($id){
        return \DB::table('institutes')
            ->join('municipalities','municipalities.id','=','institutes.municipality_id')                   
            ->join('provinces','provinces.id','=','municipalities.id_province')  
            ->join('departamentos','departamentos.id','=','provinces.id_department')  
            ->where('institutes.id','=',$id)  
            ->get([
                'institutes.id',
                'institutes.name_institute',
                'institutes.created_at',
                'institutes.updated_at',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department'
            ]);
    }
    protected static function find_edit_institute($id){
        return \DB::table('institutes')
        ->join('municipalities','municipalities.id','=','institutes.municipality_id')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('institutes.id','=',$id)
        ->get([
            'institutes.id',
            'institutes.name_institute',
            'institutes.municipality_id AS id_municipality',
            'municipalities.id_province',
            'provinces.id_department',
        ]);
    }
}
