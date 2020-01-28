<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Mostrar una lista de los registros
    public function index()
    {
        $users = User::all();
        return view('usuarios.index' , ['users' => $users]);
    }

    //Mostrar el formulario para crear un nuevo registro
    public function create()
    {

        return view('usuarios.create');
    }

    //ALmancena los registros recien creados de create en la BD
    public function store(Request $request)
    {
        $usuario = new User();

        $usuario->name = request ('name');
        $usuario->email = request ('email');
        $usuario->password = request ('password');

        $usuario->save();
        return redirect('/usuarios');

    }

    //Mostramos un registro especifico
    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }

    //Muestra el formulario con los datos a editar de un registro en especifico
    public function edit($id)
    {
        return view('usuarios.edit', ['user' => User::findOrFail($id)]);
    }

    //Actualizar un registro en la BD
    public function update(UserFormRequest $request, $id)
    {
        $usuario =  User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');


        $usuario->update();
        return redirect('/usuarios');
    }

    //Elimina un registro especifico de la BD
    public function destroy($id)
    {
        $usuario =  User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
