<?php

namespace App\Http\Controllers;

use App\Roles;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::paginate(20);
        return view('roles.index', compact('roles'));
    }
    public function create(Request $request){
        $permissions = Permission::orderBy('id')->get();
        return view('roles.create',compact('permissions'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles',       
        ],[
            'name.required' => 'El campo Nombre Rol es requerido',
            'name.unique' => 'El valor del campo Nombre Rol ya está en uso'
        ]);
        $role = Role::create($request->all());
         //actualizacion de Roles
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('index_roles', $role->id)->with('info', 'Rol registrado con  éxito');
    }
}
