<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        /*Model::unguard();
        try {
            Schema::disableForeignKeyConstraints();

            $this->call(UserTableSeeder::class);

            Schema::enableForeignKeyConstraints();
         } catch (\Throwable $th){
            return $th->getMessage();
         }*/
    }
}
