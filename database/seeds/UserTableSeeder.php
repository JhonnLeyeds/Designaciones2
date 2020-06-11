<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $root = new User();
        $root->email = 'root@admin.com';
        $root->username ='root';
        $root->first_name ='Root';
        $root->password =bcrypt('password');
        $root->start_date =now();
        $root->created_by = 1;
        $root->updated_by = 1;
        $root->save();
    }
}
