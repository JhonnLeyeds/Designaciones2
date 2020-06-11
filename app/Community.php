<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communities';
    protected  $fillable =
    [
    	'cod_comu',
    	'name_community',
        'cod_muni',
        'id_muni',
        'user_create',

    ];
    protected static function view_communities(){
        return $view_municipalities = \DB::table('communities')
        ->join('municipalities','municipalities.id','=','communities.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->get([
            'communities.id',
            'communities.cod_comu',
            'communities.name_community',
            'communities.created_at',
            'municipalities.name_municipality',
            'provinces.name_province',
            'departamentos.name_department',
        ]);
    }
    protected static function show_community($id){
        return $show_community = \DB::table('communities')
        ->join('municipalities','municipalities.id','=','communities.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('communities.id','=',$id)
        ->get([
            'communities.id',
            'communities.cod_comu',
            'communities.name_community',
            'communities.created_at',
            'communities.updated_at',
            'municipalities.name_municipality',
            'provinces.name_province',
            'departamentos.name_department',
        ]);
    }
    protected static function find_cominity_edit($id){
        return $edit_community = \DB::table('communities')
        ->join('municipalities','municipalities.id','=','communities.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('communities.id','=',$id)
        ->get([
            'communities.id',
            'communities.cod_comu',
            'communities.name_community',
            'communities.id_muni',
            'municipalities.id_province',
            'provinces.id_department',
        ]);
    }
}
