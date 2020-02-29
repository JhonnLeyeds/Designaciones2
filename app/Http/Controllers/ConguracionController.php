<?php

namespace App\Http\Controllers;

use App\Univeridad;
use App\Instituto;
use App\Carrer;
use Illuminate\Http\Request;

class ConguracionController extends Controller
{
	public function Agregar()
	{
		 $univer = Univeridad::all();
		 $insti = Instituto::all();
		 $carrer = Carrer::all();
         return view('configuraciones.index' ,  ['univer' => $univer , 'insti' => $insti , 'carrer' => $carrer  ]);



	}
}
