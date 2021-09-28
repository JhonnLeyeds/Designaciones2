<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designacion extends Model
{
    protected static function cnatidad_cupos($id_es, $per, $ges){
        return \DB::table('quotas')
            ->where('quotas.id_stable_salud','=',$id_es)
            ->where('quotas.periodo','=',$per)
            ->where('quotas.gestion','=',$ges)
            ->get();
    }
    protected static function ver_periodos_gestion($id){
        return \DB::table('enable_periods')
            ->join('periods','periods.id','=','enable_periods.id_period')
            ->join('gestion','gestion.id','=','enable_periods.id_gestion')
            ->where('id_gestion','=',$id)
            ->get([
                'periods.period','periods.id as id_periodo',
                'enable_periods.date_start','enable_periods.date_end',
                'gestion.id as id_gestion','gestion.gestion',
            ]);
    }    
    protected static function list_students($t, $g, $p){
        return "Nos quedamos aqui en esta parte";
        \DB::table('student')    
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',1)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list(){
        return \DB::table('student')    
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',1)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list_1(){
        return \DB::table('student')            
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',1)
            ->where('quotas.id_student','!=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list_insti_1(){
        return \DB::table('student')
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',0)
            ->where('quotas.id_student','!=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list_insti(){
        return \DB::table('student')            
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',0)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function view_designation_student($id){
        return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('student.id','=',$id)
            ->get([
                'student.id','student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.celular','student.correo','student.sexo','student.direccion',
                'quotas.designation_date','quotas.status_designation','quotas.start_date','quotas.end_date','quotas.periodo',
                'internation_types.name_type',
                'estable_saluds.name_estable_salud',
            ])->first();
    }
    protected static function view_designation_student_insti($id){
        return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('student.id','=',$id)
            ->get([
                'student.id','student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.celular','student.correo','student.sexo','student.direccion',
                'quotas.designation_date','quotas.status_designation','quotas.start_date','quotas.end_date','quotas.periodo',
                'internation_types.name_type',
                'estable_saluds.name_estable_salud',
            ])->first();
    }
    //funciones para retornar datos para la vista de los detalles de la designacion
    protected static function view_designation_student_dates($id){
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'student.id',
                'career.name_career',
                'faculties.name_faculty',
                'univeridads.name_university',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department',
            ])
            ->first();
    }
    protected static function view_designation_student_dates_insti($id){
        return \DB::table('student')
            ->join('careers_institute','careers_institute.id','=','student.insti_id')
            ->join('institutes','institutes.id','=','careers_institute.institute_id')
            ->join('municipalities','municipalities.id','=','institutes.municipality_id')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'student.id',
                'careers_institute.name_career',
                'institutes.name_institute',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department',
            ])
            ->first();
    }
    protected static function view_certification($id){
        $ver = \DB::table('quotas')
                ->where('quotas.id_student','=',$id)
                ->join('student','student.id','=','quotas.id_student')
                ->get([
                    'id_student',
                    'student.insti_id',
                    'student.carrer_id',
                ])->first();
        if($ver->insti_id === 1){
            return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            //->join('quotas AS q','q.id_stable_salud','=','estable_saluds.id')
            ->join('estable_saluds AS q','q.id','=','quotas.id_stable_salud')
            ->join('municipalities','municipalities.id','=','q.id_muni')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->where('quotas.id_student','=',$id)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.type',
                'quotas.id','quotas.designation_date','quotas.start_date','quotas.end_date',
                'career.name_career',
                'univeridads.name_university',
                'q.name_estable_salud',
                'municipalities.nombre_red',
                'municipalities.name_municipality',
                'internation_types.name_type'

            ])->first();
        }elseif($ver->carrer_id === 1){
            return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('careers_institute','careers_institute.id','=','student.insti_id')
            ->join('institutes','institutes.id','=','careers_institute.institute_id')
            //->join('quotas AS q','q.id_stable_salud','=','estable_saluds.id')
            ->join('estable_saluds AS q','q.id','=','quotas.id_stable_salud')
            ->join('municipalities','municipalities.id','=','q.id_muni')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->where('quotas.id_student','=',$id)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.type',
                'quotas.id','quotas.designation_date','quotas.start_date','quotas.end_date',
                'careers_institute.name_career',
                'institutes.name_institute',
                'q.name_estable_salud',
                'municipalities.name_municipality',
                'municipalities.nombre_red',
                'internation_types.name_type'

            ])->first();
        }        
    }
    //function para mandar datos del estuduiante para su designacion de cupos
    protected static function student_view($id){
        return $ver = \DB::table('student')
                ->where('student.id','=',$id)
                ->get()->first();
        
    }
    protected static function student_view_insti($id){
        return $ver = \DB::table('student')
                ->where('student.id','=',$id)
                ->get()->first();
        
    }
    protected static function student_view_quotas(){
        return \DB::table('quotas')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->where('status_designation','=',0)
            ->groupBy('quotas.tipe_internship','internation_types.name_type')
            ->get([
                'internation_types.name_type',
                'quotas.tipe_internship'
            ]);
    }
    protected static function quota_select_one($id,$id_periodo){
        return \DB::table('quotas')
            ->where('status_designation','=',0)
            ->where('id_student','=',NULL)
            ->where('periodo','=',$id_periodo)
            ->where('quotas.tipe_internship','=',$id)
            ->inRandomOrder()
            ->first();
    }
    protected static function quota_select_one_insti($id,$id_periodo){
        return \DB::table('quotas')
            ->where('status_designation','=',0)
            ->where('id_student','=',NULL)
            ->where('periodo','=',$id_periodo)
            ->where('quotas.tipe_internship','=',$id)
            ->inRandomOrder()
            ->first();
    }
    protected static function view_designations(){
        return \DB::table('quotas')
            ->join('student','student.id','=','quotas.id_student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('quotas.status_designation','=',1)            
            ->where('quotas.id_student','!=', NULL)  
            ->where('student.type','=', 1)    
            ->get([
                'quotas.start_date','quotas.end_date','quotas.periodo',
                'student.ci','student.name','student.ap_pat','student.ap_mat','student.exp','student.birth_date','student.correo','student.sexo','student.caso_esp',
                'career.name_career',
                'univeridads.name_university',
                'estable_saluds.name_estable_salud',
            ]);
    }
    protected static function student_view_c_f_u($id){
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->where('student.id','=', $id)  
            ->get();
    }
    protected static function count_cupos_medicos($id_centro_salud,$gestion,$periodo,$m){
        return \DB::table('quotas')
            ->where('quotas.id_stable_salud','=',$id_centro_salud)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.tipe_internship','=',$m)
            ->where('quotas.status_designation','=',0)
            ->get(['quotas.status_designation']);
    }
    protected static function cant_cupos_registrados($id_centro_salud,$gestion,$periodo,$m){
        return \DB::table('quotas')
            ->where('quotas.id_stable_salud','=',$id_centro_salud)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.tipe_internship','=',$m)
            ->get(['quotas.status_designation']);
    }
}
