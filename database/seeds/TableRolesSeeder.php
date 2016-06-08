<?php

use Illuminate\Database\Seeder;

class TableRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\models\Roles::class)->create([
        		'nombre'=>'Director de Informática',
        		'id_depto'=>1,
        		'visible'=>1
        	]); 

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Jefe de Proyectos',
        		'id_depto'=>1,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Administrador BD',
        		'id_depto'=>1,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Analista Programador',
        		'id_depto'=>1,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Tester',
        		'id_depto'=>1,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Director de RR.HH',
        		'id_depto'=>2,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Jefe de Logística',
        		'id_depto'=>3,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Supervisor de Logística',
        		'id_depto'=>3,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Operario Recepción',
        		'id_depto'=>3,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Operario',
        		'id_depto'=>3,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Jefe de Servicio Técnico',
        		'id_depto'=>4,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Administrador Servicio Técnico',
        		'id_depto'=>4,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
        		'nombre'=>'Técnico',
        		'id_depto'=>4,
        		'visible'=>1
        	]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Director de Informática',
                'id_depto'=>5,
                'visible'=>1
            ]); 

         factory(App\models\Roles::class)->create([
                'nombre'=>'Jefe de Proyectos',
                'id_depto'=>5,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Administrador BD',
                'id_depto'=>5,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Analista Programador',
                'id_depto'=>5,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Tester',
                'id_depto'=>5,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Director de RR.HH',
                'id_depto'=>6,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Jefe de Logística',
                'id_depto'=>7,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Supervisor de Logística',
                'id_depto'=>7,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Operario Recepción',
                'id_depto'=>7,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Operario',
                'id_depto'=>7,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Jefe de Servicio Técnico',
                'id_depto'=>8,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Administrador Servicio Técnico',
                'id_depto'=>8,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Técnico',
                'id_depto'=>8,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Supervisor',
                'id_depto'=>8,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Vendedor',
                'id_depto'=>9,
                'visible'=>1
            ]);

         factory(App\models\Roles::class)->create([
                'nombre'=>'Jefe de Ventas',
                'id_depto'=>9,
                'visible'=>1
            ]);
    }
}
