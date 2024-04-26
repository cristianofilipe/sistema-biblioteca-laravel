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
        Schema::create('classificacao_livro', function (Blueprint $table) {
            $table->unsignedBigInteger('cdd_id');
            $table->unsignedBigInteger('livro_id');
            // Outros campos adicionais, se necessário
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('cdd_id')->references('cdd')->on('classificacao')->onDelete('cascade');
            $table->foreign('livro_id')->references('id_livro')->on('livros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classificacao_livro');
    }
};
