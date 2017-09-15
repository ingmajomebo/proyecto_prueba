<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('idCliente');
            $table->string('dato',45);
            $table->string('nit',45);
            $table->string('nombreCliente',45);
            $table->string('pais',45);
            $table->string('departamento',45);
            $table->string('ciudad',45);
            $table->string('direccion',45);
            $table->string('telefono',45);
            $table->decimal('cupo',10,2);
            $table->decimal('saldoCupo',10,2);
            $table->integer('porcentajeVisitas');
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
        Schema::dropIfExists('cliente');
    }
}
