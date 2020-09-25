<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituto;
use App\Province;
use App\Departamento;
use App\CareerInstitute;
use App\InternshipTipes;
class InstituteController extends Controller
{
    public function index_institutes(){
        $institutes = Instituto::view_intitutes();
        return view('institutes.index',compact('institutes'));
    }
    public function create_institutes(){
        $departments = Departamento::get();
        return view('institutes.create',compact('departments'));
    }
    public function store_institutes(Request $request){
        $status = 'success';
        $conent = 'El Instituto '. $request->name_institute .' fue Registrado Correctamente';
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'name_institute' => 'required|unique:institutes',     
        ],[
            'name_institute.required' => 'El Nombre del Instituto es Requerido',
			'name_institute.unique' => 'El Nombre Instituto ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',            
        ]);
        $institute = new Instituto();
        $institute->name_institute = request ('name_institute');
		$institute->municipality_id = $request->id_municipality;
        $institute->user_create = \Auth::user()->id;
        $institute->save();
        return redirect()->route('create_institutes', $institute->id)
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function show_institutes(Request $request){
        $institute = Instituto::show_instituto($request->id);
		return view('institutes.show',compact('institute'));
    }
    public function edit_institutes(Request $request){
        $institute_edit = Instituto::find_edit_institute($request->id);
        $departments = Departamento::all();        
		$prov = Province::find($institute_edit[0]->id);
		$province = \DB::table('provinces')
			->where('provinces.id_department','=',$institute_edit[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$institute_edit[0]->id_province)
		->get();
        return view('institutes.edit',compact('institute_edit','departments','prov','province','municipalities'));
    }
    public function update_institutes(Request $request, Instituto $id){
        $status = 'success';
        $conent = 'El Instituto '. $request->name_institute .' fue Actualizado Correctamente';        
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'name_institute' => 'required|unique:institutes,name_institute,'.$id->id,
        ],[
            'name_institute.required' => 'El Nombre del Instituto es Requerido',
			'name_institute.unique' => 'El Nombre Instituto ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',            
        ]);
        
        try {
            $save_institute = Instituto::find($request->id->id);
            $save_institute->name_institute = $request->name_institute;
            $save_institute->municipality_id = $request->id_municipality;
            $save_institute->user_create = \Auth::user()->id;
            $save_institute->save();
        } catch (\Throwable $th) {
            $status = 'error';
            $conent = 'El Instituto '. $request->name_institute .' NO fue Registrado';  
        }
        return redirect()->route('index_institutes', $id->id)
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function delete_institutes(Request $request){
        $status = 'success';
        $conent = 'El Instituto '. $request->name_institute .' fue Borrado Correctamente';    
        try {
            $institute = Instituto::find($request->id)->delete();
        } catch (\Throwable $th) {
            $status = 'error';
            $conent = 'El Instituto '. $request->name_institute .' no fue Borrado';   
        }
        
        return redirect()->route('index_institutes')
        ->with('info', [
            'status' => $status,
            'content' => $conent
        ]);
    }
    public function index_careers_institutes(){
        $careers_institute = CareerInstitute::view_carrers_intitutes();         
        return view('institutes.careers.index',compact('careers_institute'));
    }
    public function create_careers_institutes(){
        $types_int = InternshipTipes::get_types_institute();
        $departments = Departamento::get();
        return view('institutes.careers.create',compact('departments','types_int'));
    }
    public function store_careers_institutes(Request $request, CareerInstitute $id){
        $status = 'success';
        $conent = 'La Carrera'. $request->name_institute .' fue Registrada Correctamente';
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_institute' => 'numeric',
            'name_career' => 'required|unique:careers_institute',     
        ],[
            'name_career.required' => 'El Nombre de la Carrera es Requerido',
			'name_career.unique' => 'El Nombre de la Carrera ya está en uso',
            'id_institute.numeric' => 'Seleccione un Instituto',
            'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',            
        ]);
        $career = new CareerInstitute();
        $career->name_career = request ('name_career');
        $career->type_internation = request ('type_int');
		$career->institute_id = $request->id_institute;
        $career->user_create = \Auth::user()->id;
        $career->save();
        return redirect()->route('create_careers_institutes', $career->id)
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function edit_careers_institutes(Request $request){
        $types_int = InternshipTipes::get_types_institute();
        $institute_career_edit = CareerInstitute::find_edit_institute_career($request->id);
        $departments = Departamento::all();        
		$prov = Province::find($institute_career_edit[0]->id);
		$province = \DB::table('provinces')
			->where('provinces.id_department','=',$institute_career_edit[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$institute_career_edit[0]->id_province)
        ->get();
        $institutes = \DB::table('institutes')
			->where('institutes.municipality_id','=',$institute_career_edit[0]->id_municipality)
		->get();
        return view('institutes.careers.edit',compact('types_int','institutes','institute_career_edit','departments','prov','province','municipalities'));
    }
    public function update_careers_institutes(Request $request,  CareerInstitute $id){
        $status = 'success';
        $conent = 'La Carrera'. $request->name_institute .' fue actualizada Correctamente';
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_institute' => 'numeric',
            'name_career' => 'required|unique:careers_institute,name_career,'.$id->id,
        ],[
            'name_career.required' => 'El Nombre de la Carrera es Requerido',
			'name_career.unique' => 'El Nombre de la Carrera ya está en uso',
            'id_institute.numeric' => 'Seleccione un Instituto',
            'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',            
        ]);
        try {
            $save_career_institute = CareerInstitute::find($request->id->id);
            $save_career_institute->name_career = $request->name_career;
            $save_career_institute->institute_id = $request->id_institute;
            $save_career_institute->type_internation = $request->type_int;
            $save_career_institute->user_create = \Auth::user()->id;
            $save_career_institute->save();
        } catch (\Throwable $th) {
            $status = 'error';
            $conent = 'La Carrera '. $request->name_institute .' NO Actualizada correctamente';  
        }
        return redirect()->route('index_careers_institutes', $id->id)
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function show_careers_institutes(Request $request){
        return "falta esto ";
    }
    public function delete_careers_institutes(Request $request){
        $name = CareerInstitute::find($request->id);
        $status = 'success';
        $conent = 'La Carrera '. $name->name_career .' fue Borrada Correctamente';    
        try {
            $institute = CareerInstitute::find($request->id)->delete();
        } catch (\Throwable $th) {
            $status = 'error';
            $conent = 'El Instituto '. $request->name_career .' no fue Borrado';   
        }
        
        return redirect()->route('index_careers_institutes')
        ->with('info', [
            'status' => $status,
            'content' => $conent
        ]);
    }
    public function charge_career_insti(Request $request){
        $career_insitute = CareerInstitute::charge_career($request->id);
        return $career_insitute;
    }
    public function charge_career_institutes(Request $request){
        return CareerInstitute::charge_career_institute($request->id);
         
    }
}
