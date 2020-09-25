<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{


    protected  $table = 'career';

    protected  $fillable =
    [
    	'nombre',
         'univ_id',
         'faculty_id',
    	 'insti_id',

    ];


    public static function view_careers(){

        return \DB::table('career')
        ->join('faculties','faculties.id','=','career.faculty_id')
        ->join('univeridads','univeridads.id','=','faculties.id_university')
        ->get([
            'career.id',
            'career.name_career',
            'career.created_at',
            'faculties.name_faculty',
            'univeridads.name_university',
        ]);

    }
    protected static function show_career($id){
        return \DB::table('career')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
                ->where('career.id','=',$id)
            ->get([
                'career.id',
                'career.name_career',
                'career.description',
                'career.created_at',
                'career.updated_at',
                'faculties.name_faculty',
                'univeridads.name_university',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department',
            ]);
    }
    protected static function find_edit_career($id){
        return \DB::table('career')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('career.id','=',$id)
            ->get([
                'career.faculty_id AS id_fa',
                'career.name_career',
                'career.type_internation',
                'career.description',
                'faculties.id_university',
                'univeridads.id_municipality',
                'municipalities.id_province',
                'provinces.id_department',
                'departamentos.id AS d_id',
                'career.id',
            ]);
    }
}
