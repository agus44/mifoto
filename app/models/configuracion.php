<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\Menu;
class configuracion extends Model
{
    public static function verificar_usuario($usuario,$clave)
    {
    	$sql="SELECT *FROM usuarios WHERE usuario='$usuario' AND pass='$clave'";
    	$resultado=DB::select($sql);
    	return $resultado;
    }

    public static function all_menus()
    {
    	$menus = Menu::where('id_padre', null)
                       ->orderBy('id', 'asc')
                       ->get();
    	return $menus;
    }

    public static function menus_hijos($menu)
    {
        $menus = Menu::where('id_padre',$menu)
                       ->orderBy('id', 'asc')
                       ->get();

        return $menus;
    }
}
