<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita', function (Blueprint $table) {
            $table->increments('idVisita');
            $table->dateTime('fecha');
            $table->decimal('valorNeto',10,2);
            $table->decimal('valorVisita',10,2);
            $table->string('observaciones',400);
            $table->integer('idVendedor')->unsigned();
            $table->foreign('idVendedor')->references('idVendedor')->on('vendedor')->onDelete('cascade');
            $table->integer('idCliente')->unsigned();
            $table->foreign('idCliente')->references('idCliente')->on('cliente')->onDelete('cascade');
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
        Schema::dropIfExists('visita');
    }
}
