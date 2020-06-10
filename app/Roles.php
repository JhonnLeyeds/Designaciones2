<?php

namespace App;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected static function select_one_role_view($id_role){   
        return Role::find($id_role);           
    }    
    protected static function select_one_role_permissions_view($id_role){
        $x = $id_role;
        //return $x;
        return $permissions_role = \DB::table('permission_role')
            ->join('permissions','permission_role.permission_id','=','permissions.id')
                    ->where('permission_role.role_id','=',$id_role)
            ->get();
    }
}
