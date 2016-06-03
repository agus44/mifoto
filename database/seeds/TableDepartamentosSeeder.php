<?php

use Illuminate\Database\Seeder;

class TableDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Departamento::class)->create([
        		'nombre'=>'Informática',
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Departamento::class)->create([
        		'nombre'=>'Recursos Humanos',
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Departamento::class)->create([
        		'nombre'=>'Logística',
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

        factory(App\models\Departamento::class)->create([
        		'nombre'=>'Servicio Técnico',
        		'id_empresa'=>1,
        		'visible'=>1
        	]);

         factory(App\models\Departamento::class)->create([
                'nombre'=>'Informática',
                'id_empresa'=>2,
                'visible'=>1
            ]);

        factory(App\models\Departamento::class)->create([
                'nombre'=>'Recursos Humanos',
                'id_empresa'=>2,
                'visible'=>1
            ]);

        factory(App\models\Departamento::class)->create([
                'nombre'=>'Logística',
                'id_empresa'=>2,
                'visible'=>1
            ]);

        factory(App\models\Departamento::class)->create([
                'nombre'=>'Servicio Técnico',
                'id_empresa'=>2,
                'visible'=>1
            ]);

        factory(App\models\Departamento::class)->create([
                'nombre'=>'Ventas',
                'id_empresa'=>2,
                'visible'=>1
            ]);



    }
}
