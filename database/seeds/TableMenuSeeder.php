<?php

use Illuminate\Database\Seeder;

class TableMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\models\Menu::class)->create([
        		'nombre'=>'Configuración',
        		'id_padre'=>null,
        		'url'=>'/configuracion/1',
        		'icono'=>null,
        		'clase'=>'fa fa-gears',
        		'visible'=>1
        	]);

        factory(App\models\Menu::class)->create([
                'nombre'=>'Mantenedor Menús',
                'id_padre'=>1,
                'url'=>'/mant_menu/2',
                'icono'=>null,
                'clase'=>'fa fa-navicon',
                'visible'=>1
            ]);

        factory(App\models\Menu::class)->create([
                'nombre'=>'Crear Menú',
                'id_padre'=>2,
                'url'=>'/crear_menu/3',
                'icono'=>null,
                'clase'=>'fa fa-plus',
                'visible'=>1
            ]);
        factory(App\models\Menu::class)->create([
                'nombre'=>'Listado Menú',
                'id_padre'=>2,
                'url'=>'/Listado_menu/4',
                'icono'=>null,
                'clase'=>'fa fa-list-ol',
                'visible'=>1
            ]);
        
    }
}
