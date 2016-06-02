<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table ="roles";

    protected $fillable=['id','nombre','id_depto','visible'];
}
