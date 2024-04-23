<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionsTable extends Migration
{
    public function up()
    {
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id('idtransaccion');
            $table->unsignedBigInteger('cuenta_origen');
            $table->unsignedBigInteger('cuenta_destino');
            $table->decimal('monto', 10, 2);
            $table->timestamp('fecha')->default(now());
            $table->foreign('cuenta_origen')->references('idcuenta')->on('cuentas');
            $table->foreign('cuenta_destino')->references('idcuenta')->on('cuentas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaccions');
    }
}
