<?php

namespace App\Http\Controllers;

use App\EstableSalud;
use App\Departamento;
use App\Municipality;
use Illuminate\Http\Request;

use App\Roles;
use Caffeinated\Shinobi\Models\Role;

class EstableSaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_medicalCenter()
    {
        $medical_centers = EstableSalud::view_medical_center();
        return view('medicalCenter.index',compact('medical_centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_medicalCenter()
    {
        $subse = \DB::table('subsectores')->get();
        $at_le = \DB::table('level_atention')->get();
        $dates_medical_center = \DB::table('date_medical_center')->get();
        $departments = Departamento::get();
        return view('medicalCenter.create',compact('at_le','departments','dates_medical_center','subse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_medicalCenter(Request $request)
    {
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'subsector' => 'numeric',
            'nivel_atencion' => 'numeric',
            'name_estable_salud' => 'required|unique:estable_saluds',
            'cod_estable_salud' => 'required|unique:estable_saluds',  
            //'type' => 'numeric',
            'character' => 'required',       
        ],[
            'name_estable_salud.required' => 'El Nombre Centro Medico es requerido',
			'name_estable_salud.unique' => 'El valor del campo Centro Medico ya está en uso',
			'cod_estable_salud.required' => 'El campo Codigo Centro Medico es requerido',
			'cod_estable_salud.unique' => 'El valor del campo Codigo Centro Medico ya está en uso',
            'id_municipality.numeric' => 'Seleccione un Municipio',
            'subsector.numeric' => 'Seleccione un Subsector',
            'nivel_atencion.numeric' => 'Seleccione un Nivel de Antencion',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',
            'type.numeric' => 'Seleccione un Tipo',
            'character.required' => 'Debe seleccionar al menos una Caracteristica'
        ]);
        $mun = Municipality::find($request->id_municipality);	
		$medicalCenter = new EstableSalud();
        $medicalCenter->name_estable_salud = request ('name_estable_salud');
        $medicalCenter->cod_estable_salud = request ('cod_estable_salud');
        $medicalCenter->type = "1";
        $medicalCenter->subsector = request ('subsector');
        $medicalCenter->atention_nivel = request ('nivel_atencion');
		$medicalCenter->id_muni = $request->id_municipality;
		$medicalCenter->cod_muni = $mun->cod_muni;
        $medicalCenter->user_create = \Auth::user()->id;
        $medicalCenter->save();
        $id_medical_center = EstableSalud::find($medicalCenter->id);
        foreach($request->character as $ch){
            \DB::table('mc_dmc')->insert(
                ['id_medical_center' => $id_medical_center->id,
                 'id_date_medical_center' => $ch,
                 'created_at' => date("Y-m-d H:i:s"),
                 'updated_at' => date("Y-m-d H:i:s"),
                 ]
            );
        }
        return redirect()->route('create_medicalCenter', $mun->id)
            ->with('info', 'Centro Medico'. $request->name_estable_salud .'registrado con  éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstableSalud  $estableSalud
     * @return \Illuminate\Http\Response
     */
    public function show_medicalCenter(Request $request)
    {
        $medical_center_dates = EstableSalud::show_medical_center_dates($request->id);
        $medical_center = EstableSalud::show_medical_center($request->id);
        return view('medicalCenter.show',compact('medical_center','medical_center_dates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstableSalud  $estableSalud
     * @return \Illuminate\Http\Response
     */
    public function edit_medicalCenter(Request $request)
    {
        $subse = \DB::table('subsectores')->get();
        $at_le = \DB::table('level_atention')->get();
        $date_medical_center = \DB::table('date_medical_center')->get();
        $medicalCenter = EstableSalud::find_edit_medicalCenter($request->id);
        $departments = Departamento::get();
        $province = \DB::table('provinces')
			->where('provinces.id_department','=',$medicalCenter[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$medicalCenter[0]->id_province)
        ->get();
        $dates_me_c_regis = \DB::table('mc_dmc')
			->where('mc_dmc.id_medical_center','=',$medicalCenter[0]->id)
		->get();
        return view('medicalCenter.edit',compact('dates_me_c_regis','date_medical_center','departments','medicalCenter','province','municipalities','subse','at_le'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstableSalud  $estableSalud
     * @return \Illuminate\Http\Response
     */
    public function update_medicalCenter(Request $request, EstableSalud $id)
    {
        //return $id;
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'subsector' => 'numeric',
            'nivel_atencion' => 'numeric',
            //'type' => 'numeric',
            'name_estable_salud' => 'required|unique:estable_saluds,name_estable_salud,'.$id->id,
            'cod_estable_salud' => 'required|unique:estable_saluds,cod_estable_salud,'.$id->id,
            'character' => 'required',
        ],[
            'name_estable_salud.required' => 'El campo Nombre Centro Medico es requerido',
            'subsector.numeric' => 'Seleccione un Subsector',
            'nivel_atencion.numeric' => 'Seleccione un Nivel de Antencion',
			'name_estable_salud.unique' => 'El valor del campo Nombre Centro Medico ya está en uso',
			'cod_estable_salud.required' => 'El campo Codigo Centro Medico es requerido',
            'cod_estable_salud.unique' => 'El valor del campo Codigo Centro Medico ya está en uso',
            'type.numeric' => 'Seleccione Tipo',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',
            'character.required' => 'Debe seleccionar al menos una Caracteristica'
        ]);
        $mun = Municipality::find($request->id_municipality);	
		$medicalCenter = EstableSalud::find($id->id);
        $medicalCenter->name_estable_salud = request ('name_estable_salud');
        $medicalCenter->cod_estable_salud = request ('cod_estable_salud');
        $medicalCenter->subsector = request ('subsector');
        $medicalCenter->atention_nivel = request ('nivel_atencion');
        $medicalCenter->type = '1';
		$medicalCenter->id_muni = $request->id_municipality;
		$medicalCenter->cod_muni = $mun->cod_muni;
        $medicalCenter->user_create = \Auth::user()->id;
        $medicalCenter->save();
        //$role= Role::find($request->id)->delete();
        \DB::table('mc_dmc')->where('id_medical_center', $id->id)->delete();
        //\DB::table('mc_dmc')->find()->where('id_medical_center','=',$id->id)->delete();
        foreach($request->character as $as){
            
            \DB::table('mc_dmc')->insert(
                ['id_medical_center' => $id->id,
                    'id_date_medical_center' => $as,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    ]
            );
        }
        return redirect()->route('index_medicalCenter', $mun->id)
            ->with('info', 'Centro Medico'. $request->name_estable_salud .'fue actualizado con  éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstableSalud  $estableSalud
     * @return \Illuminate\Http\Response
     */
    public function delete_medicalCenter(Request $request)
    {
        $medicalCenter= EstableSalud::find($request->id)->delete();
        return redirect()->route('index_medicalCenter')->with('info', ' Eliminado correctamente');
    }
}
