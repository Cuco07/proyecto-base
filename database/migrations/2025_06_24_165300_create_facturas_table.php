<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->decimal('subtotal' ,10,2);
            $table->decimal('impuestos',10,2);
            $table->decimal('total',10,2);

            $table->unsignedBigInteger('idcliente');
            $table->foreign('idcliente')->references('id')->on('clientes');

            $table->unsignedBigInteger('idestado');
            $table->foreign('idestado')->references('id')->on('estados');

            $table->unsignedBigInteger('idmodopago');
            $table->foreign('idmodopago')->references('id')->on('modopagos');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};

