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
        $root->name ='Root';
        $root->password =bcrypt('password');
        $root->save();
    }
}
