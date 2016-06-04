<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\Menu;
use App\models\Empresas;
use App\models\Departamento;
use App\models\Roles;
use App\models\Permisos_rol;
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

    public static function get_departamentos($empresa)
    {
        $deptos=Departamento::where('id_empresa',$empresa)
                            ->orderBy('id', 'asc')
                            ->get(['id','nombre']);    

        return $deptos;       
    }

    public static function get_roles($depto)
    {
        $roles=Roles::where('id_depto',$depto)
                    ->orderBy('id', 'asc')
                    ->get(['id','nombre']);
        return $roles;
    }

    public static function permisos_rol($rol)
    {
        $permisos=Permisos_rol::where('id_rol',$rol)
                              ->orderBy('id', 'asc')
                              ->get(['id_menu']);
        return $permisos;
    }

    public static function info_menu($menu)
    {
        $info=Menu::where('id',$menu)
                       ->get();
        return $info;
    }


}
