<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table ="empresas";

    protected $fillable=['id','nombre'];
}
