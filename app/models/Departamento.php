<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table ="departamentos";

    protected $fillable=['id','nombre','id_empresa','visible'];
}
