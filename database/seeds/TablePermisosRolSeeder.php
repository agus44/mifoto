<?php

use Illuminate\Database\Seeder;

class TablePermisosRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Permisos_rol::class)->create([
        		'id_menu'=>1,
        		'id_rol'=>1,
        		'id_depto'=>1,
        		'id_empresa'=>1,
        		'agregar'=>1,
        		'editar'=>1,
        		'eliminar'=>1,
        		'reportes'=>1,
        		'visible'=>1
        	]); 

        factory(App\models\Permisos_rol::class)->create([
        		'id_menu'=>6,
        		'id_rol'=>1,
        		'id_depto'=>1,
        		'id_empresa'=>1,
        		'agregar'=>1,
        		'editar'=>1,
        		'eliminar'=>1,
        		'reportes'=>1,
        		'visible'=>1
        	]); 

        factory(App\models\Permisos_rol::class)->create([
        		'id_menu'=>7,
        		'id_rol'=>1,
        		'id_depto'=>1,
        		'id_empresa'=>1,
        		'agregar'=>1,
        		'editar'=>1,
        		'eliminar'=>1,
        		'reportes'=>1,
        		'visible'=>1
        	]); 

        factory(App\models\Permisos_rol::class)->create([
        		'id_menu'=>8,
        		'id_rol'=>1,
        		'id_depto'=>1,
        		'id_empresa'=>1,
        		'agregar'=>1,
        		'editar'=>1,
        		'eliminar'=>1,
        		'reportes'=>1,
        		'visible'=>1
        	]); 

        factory(App\models\Permisos_rol::class)->create([
                'id_menu'=>2,
                'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'agregar'=>1,
                'editar'=>1,
                'eliminar'=>1,
                'reportes'=>1,
                'visible'=>1
            ]); 

         factory(App\models\Permisos_rol::class)->create([
                'id_menu'=>3,
                'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'agregar'=>1,
                'editar'=>1,
                'eliminar'=>1,
                'reportes'=>1,
                'visible'=>1
            ]); 

          factory(App\models\Permisos_rol::class)->create([
                'id_menu'=>4,
                'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'agregar'=>1,
                'editar'=>1,
                'eliminar'=>1,
                'reportes'=>1,
                'visible'=>1
            ]); 

          factory(App\models\Permisos_rol::class)->create([
                'id_menu'=>5,
                'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'agregar'=>1,
                'editar'=>1,
                'eliminar'=>1,
                'reportes'=>1,
                'visible'=>1
            ]); 

          factory(App\models\Permisos_rol::class)->create([
                'id_menu'=>9,
                'id_rol'=>1,
                'id_depto'=>1,
                'id_empresa'=>1,
                'agregar'=>1,
                'editar'=>1,
                'eliminar'=>1,
                'reportes'=>1,
                'visible'=>1
            ]); 
    }
}
