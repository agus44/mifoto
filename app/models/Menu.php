<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table ="menu";

    protected $fillable=['id','nombre','id_padre','url','icono','clase','visible'];
}
