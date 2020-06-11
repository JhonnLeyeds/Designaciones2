<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstableSalud extends Model
{
    protected $table = 'estable_saluds';
    protected  $fillable =
    [
    	'cod_estable_salud',
    	'name_estable_salud',
        'type',
        'id_muni',
        'user_create',

    ];
    protected static function view_medical_center(){
        return $view_medical_center = \DB::table('estable_saluds')
        ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
        ->get([
            'estable_saluds.id',
            'estable_saluds.cod_estable_salud',
            'estable_saluds.name_estable_salud',
            'estable_saluds.type',
            'estable_saluds.cod_muni',
            'estable_saluds.id_muni',
            'estable_saluds.created_at',
            'municipalities.name_municipality',
            'estable_saluds.user_create',
        ]);
    }
    protected static function show_medical_center($id){
        return \DB::table('estable_saluds')
        ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('estable_saluds.id','=',$id)
        ->get([
            'estable_saluds.id',
            'estable_saluds.cod_estable_salud',
            'estable_saluds.name_estable_salud',
            'estable_saluds.type',
            'estable_saluds.created_at',
            'estable_saluds.updated_at',
            'municipalities.name_municipality',
            'provinces.name_province',
            'departamentos.name_department',
        ]);
    }
    protected static function find_edit_medicalCenter($id){
        return $find_edit_medicalCenter = \DB::table('estable_saluds')
        ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('estable_saluds.id','=',$id)
        ->get([
            'estable_saluds.id',
            'estable_saluds.cod_estable_salud',
            'estable_saluds.subsector',
            'estable_saluds.atention_nivel',
            'estable_saluds.name_estable_salud',
            'estable_saluds.id_muni',
            'municipalities.id_province',
            'provinces.id_department',
        ]);
    }
    protected static function show_medical_center_dates($id){
        return $find_edit_medicalCenter = \DB::table('mc_dmc')
        ->join('date_medical_center','date_medical_center.id','=','mc_dmc.id_date_medical_center')
        ->where('mc_dmc.id_medical_center','=',$id)
        ->get();
    }
}
