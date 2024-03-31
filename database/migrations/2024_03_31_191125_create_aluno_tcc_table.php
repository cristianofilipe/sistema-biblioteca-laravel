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
        Schema::create('aluno_tcc', function (Blueprint $table) {
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('tcc_id');
            // Outros campos adicionais, se necessário
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('aluno_id')->references('id_aluno')->on('alunos')->onDelete('cascade');
            $table->foreign('tcc_id')->references('id_tcc')->on('tccs')->onDelete('cascade');

            // Definindo uma chave primária composta
            $table->primary(['aluno_id', 'tcc_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_tcc');
    }
};
