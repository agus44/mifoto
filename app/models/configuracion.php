<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
class configuracion extends Model
{
    public static function verificar_usuario($usuario,$clave)
    {
    	$sql="SELECT *FROM usuarios WHERE usuario='$usuario' AND pass='$clave'";
    	$resultado=DB::select($sql);
    	return $resultado;
    }
}
