<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\Menu;
use App\models\Empresas;
use App\models\Departamento;
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

    public static function all_empresas()
    {
        $empresas = Empresas::all();
        return $empresas;
    }

    public static function all_departamentos()
    {
        $deptos=Departamento::all();
        return $deptos;
    }
}
