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
        Schema::create('curso_professor', function (Blueprint $table) {
            $table->unsignedBigInteger('professor_id');
            $table->unsignedBigInteger('curso_id');
            // Outros campos adicionais, se necessário
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('professor_id')->references('id_professor')->on('professors')->onDelete('cascade');
            $table->foreign('curso_id')->references('id_curso')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_professor');
    }
};
