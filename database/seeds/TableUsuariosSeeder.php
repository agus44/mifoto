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
                'nombre'=>'Pablo Barría Reyes',
                'imagen'=>'1.jpg',
        		'id_rol'=>1,
        		'id_depto'=>1,
        		'id_empresa'=>1,
                'visible'=>1
        	]);

        factory(App\models\Usuarios::class)->create([
        		'usuario'=>'evidal',
        		'pass'=>'r4p4nu1',
        		'nombre'=>'Eduardo Vidal',
                'imagen'=>'2.jpg',
        		'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'visible'=>1
        	]);

        factory(App\models\Usuarios::class)->create([
                'usuario'=>'william',
                'pass'=>'12345',
                'nombre'=>'William Industrial',
                'imagen'=>'3.jpg',
                'id_rol'=>28,
                'id_depto'=>9,
                'id_empresa'=>2,
                'visible'=>1
            ]);

        factory(App\models\Usuarios::class)->create([
                'usuario'=>'logistica',
                'pass'=>'12345',
                'nombre'=>'Logistic Boss',
                'imagen'=>'4.png',
                'id_rol'=>7,
                'id_depto'=>3,
                'id_empresa'=>1,
                'visible'=>1
            ]);

        factory(App\models\Usuarios::class)->create([
                'usuario'=>'Ventas',
                'pass'=>'12345',
                'nombre'=>'Pablo Barría',
                'imagen'=>'5.jpg',
                'id_rol'=>29,
                'id_depto'=>9,
                'id_empresa'=>2,
                'visible'=>1
            ]);
    }
}
