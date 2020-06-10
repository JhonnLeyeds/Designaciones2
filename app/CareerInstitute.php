<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerInstitute extends Model
{
    protected  $table = 'careers_institute';

    protected  $fillable =
    [
    	'name_career',
         'description',
         'institute_id',
    	 'user_create',

    ];
    public static function view_carrers_intitutes(){
        return \DB::table('careers_institute')
        ->join('institutes','institutes.id','=','careers_institute.institute_id')
        ->get([
            'careers_institute.id',
            'careers_institute.name_career',
            'careers_institute.created_at',
            'institutes.name_institute',
        ]);
    }
    public static function charge_career($id){
        return \DB::table('institutes')
            ->where('institutes.municipality_id','=',$id)
            ->get();
    }
    public static function find_edit_institute_career($id){
        return \DB::table('careers_institute')
            ->join('institutes','institutes.id','=','careers_institute.institute_id')
            ->join('municipalities','municipalities.id','=','institutes.municipality_id')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('careers_institute.id','=',$id)
            ->get([
                'careers_institute.id',
                'careers_institute.name_career',
                'careers_institute.institute_id',
                'institutes.municipality_id AS id_municipality',
                'municipalities.id_province',
                'provinces.id_department',
                'departamentos.id AS d_id',
            ]);
    }
    public static function charge_career_institute($id){
        return \DB::table('careers_institute')
            ->where('careers_institute.institute_id','=',$id)
            ->get();

    }
}
