<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{   
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {            
            $table->increments('id');
            $table->string('ruc');
            $table->string('razonsocial');
            $table->string('bandera');
            $table->string('direccion');
            $table->string('grupo')->nullable();
            $table->longText('contactos');
            $table->boolean('activo')->default(1);
            // RELACION
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
   
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
