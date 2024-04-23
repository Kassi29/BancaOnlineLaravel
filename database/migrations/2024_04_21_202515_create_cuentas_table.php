<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id('idcuenta');
            $table->string('tipo', 20);
            $table->decimal('saldo', 10, 2);
            $table->date('fecha_creacion');
            $table->unsignedBigInteger('idcliente');
            $table->foreign('idcliente')->references('idpersona')->on('personas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}