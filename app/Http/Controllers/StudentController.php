<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Departamento;
use App\Student;
use App\Univeridad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // public function getCarrer()
    // {
    //      if ($request->ajax()) {
    //         $careers = Univeridad::where('depart_id', $request->depart_id)->get();
    //         foreach ($careers as $career) {
    //             $careersArray[$career->id] = $career->nombre;
    //      }
    //     return response()->json($careersArray);
    //     }

    // }

    public function index()
    {
        $students = Student::all();
        return view('estudiantes.index' ,  ['students' => $students ]);
    }

    public function create()
    {

        //CON ESO LLAMO MIS DATOS DESDE LA BD
         $departamentos = Departamento::all();
         $casos = Caso::all();
         return view('estudiantes.create', compact('departamentos', 'casos'));


    }


    public function store(Request $request)
    {
            $student = new Student();
            $student->nombre = request('nombre');
            $student->ap_pat = request('ap_pat');
            $student->ap_mat = request('ap_mat');
            $student->ci = request('ci');
            $student->exp = request('exp');
            $student->date = request('date');
            $student->celular = request('celular');
            $student->correo = request('correo');
            $student->sexo = request('sexo');
            $student->depart_id = request('depart_id');
            $student->univ_id = request('univ_id');
            $student->insti_id = request('insti_id');
            $student->carrer_id = request('carrer_id');
            $student->caso_id = request('caso_id');

            $student->save();
            return redirect('/estudiantes');

    }

    public function edit($id)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function cargar_uni(Request $request){
        $depa = "SELECT * FROM univeridads WHERE depart_id = :id";
        $uni = \DB::select(\DB::raw($depa),array('id'=>$request->id));
        $depa = "SELECT * FROM institutos WHERE depart_id = :id";
        $insti = \DB::select(\DB::raw($depa),array('id'=>$request->id));
        $val = ['univ'=>$uni,'insti'=>$insti];
        return $val;
    }

    public function cargar_carre_unir(Request $request){
        $carrer = "SELECT * FROM carrer WHERE univ_id = :id";
        $carrer_uni = \DB::select(\DB::raw($carrer),array('id'=>$request->id));
        return $carrer_uni;
    }

    public function cargar_carrer(Request $request){
        $uni = "SELECT * FROM carrer WHERE carrer_id = :id";
        $carr = \DB::select(\DB::raw($uni),array('id'=>$request->id));
        return $carr;
    }

}
