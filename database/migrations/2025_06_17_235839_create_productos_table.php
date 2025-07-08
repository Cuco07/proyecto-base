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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio');
            $table->decimal('preciocompra');
            $table->integer('stock');
            $table->string('fechacreacion');
            $table->string('estado');

            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categorias');

            $table->unsignedBigInteger('idmarca');
            $table->foreign('idmarca')->references('id')->on('marcas');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
