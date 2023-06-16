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
            $table->id('id');
            $table->string('pro_imagen',250)->nullable();
            $table->string('pro_nombre',250)->nullable();
            $table->text('pro_descripcion')->nullable();
            $table->integer('pro_stock')->unsigned();
            $table->date('pro_fecha_reg')->nullable();
            $table->string('pro_estado',15)->nullable();          
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id')->index('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
