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
        Schema::create('materials', function (Blueprint $table) {
            $table->id('id_material');
            $table->date('data_entrada');
            $table->enum('tipo_material', ['livro', 'revista', 'tcc', 'cd']);
            $table->enum('modo_aquisicao', ['comprado', 'doado', 'ofertado']);
            $table->integer('qtd_material');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
