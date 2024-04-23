<?php
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreatePersonasTable extends Migration
	{
	    public function up()
	    {
	        Schema::create('personas', function (Blueprint $table) {
	            $table->id('idpersona');
	            $table->string('nombre', 100);
	            $table->string('apellido', 100);
	            $table->string('direccion', 255)->nullable();
	            $table->string('telefono', 15)->nullable();
	            $table->boolean('es_admin')->default(false); // Nuevo campo para indicar si es admin o no
	            $table->timestamps();
	        });
	    }

	    public function down()
	    {
	        Schema::dropIfExists('personas');
	    }
	}