<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_02', function (Blueprint $table) {
            $table->integer('id_cliente');
            $table->string('razon_social',50);
            $table->string('domicilio',100);
            $table->string('localidad',50);
            $table->smallInteger('cp',)->nullable();
            $table->string('provincia',50);
            $table->string('telefono',50);
            $table->string('email',80);
            $table->string('contacto',50);
            $table->decimal('bonificacion',10,4);
            $table->string('zona',50);
            $table->string('vendedor',100);
            $table->string('cuit',50);
            $table->smallInteger('id_lista',)->nullable();
            $table->string('lista',50);
            $table->string('pago',50);
            $table->decimal('saldo',10,4);
            $table->decimal('limite_credito',10,4)->nullable();
            $table->text('observacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
