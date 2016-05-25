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
        		'url'=>'/configuracion',
        		'icono'=>'/iconos/configuracion.png',
        		'clase'=>'btn-configuracion',
        		'visible'=>1
        	]);

        
    }
}
