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
        Schema::create('autor_livro', function (Blueprint $table) {
            $table->unsignedBigInteger('autor_id');
            $table->unsignedBigInteger('livro_id');
            // Outros campos adicionais, se necessário
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('autor_id')->references('id_autor')->on('autors')->onDelete('cascade');
            $table->foreign('livro_id')->references('id_livro')->on('livros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autor_livro');
    }
};
