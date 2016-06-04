<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPermisosRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_rol', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_menu');
            $table->integer('id_rol');
            $table->integer('id_depto'); 
            $table->integer('id_empresa');
            $table->integer('agregar');
            $table->integer('editar');
            $table->integer('eliminar');
            $table->integer('reportes');
            $table->integer('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permisos_rol');
    }
}
