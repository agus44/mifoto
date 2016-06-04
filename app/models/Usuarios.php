<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table ="usuarios";

    protected $fillable=['id','usuario','pass','id_rol','nombre','id_empresa'];
}
