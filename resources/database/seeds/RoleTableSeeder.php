<?php

use Caffeinated\Shinobi\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsRole::truncate();

        $admin = new ModelsRole();
        $admin->name = 'Admin';
        $admin->slug ='admin';
        $admin->description ='Rol de Administrador';
        $admin->special ='all-access';
        $admin->save();
    }
}
