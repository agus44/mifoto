<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table ="usuarios";

    protected $fillable=['id','usuario','pass','nombre','imagen','id_rol','id_depto','id_empresa','visible'];
}
