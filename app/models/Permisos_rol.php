<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Permisos_rol extends Model
{
    protected $table ="permisos_rol";

    protected $fillable=['id','id_menu','id_rol','id_depto','id_empresa','agregar','editar','eliminar','reportes','visible'];
}
