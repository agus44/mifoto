<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
         $this->call(TableUsuariosSeeder::class);
         $this->call(TableMenuSeeder::class);
         $this->call(TableEmpresasSeeder::class);
         $this->call(TableDepartamentosSeeder::class);
         $this->call(TableRolesSeeder::class);
        Model::reguard();
    }
}
