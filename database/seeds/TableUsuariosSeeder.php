<?php

use Illuminate\Database\Seeder;

class TableUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Usuarios::class)->create([
        		'usuario'=>'pbarria',
        		'pass'=>'utemmacul1097',
        		'tipo_usuario'=>1,
        		'nombre'=>'Pablo Barría Reyes',
        		'id_empresa'=>1
        	]);

        factory(App\models\Usuarios::class)->create([
        		'usuario'=>'evidal',
        		'pass'=>'r4p4nu1',
        		'tipo_usuario'=>1,
        		'nombre'=>'Eduardo Vidal',
        		'id_empresa'=>1
        	]);
    }
}
