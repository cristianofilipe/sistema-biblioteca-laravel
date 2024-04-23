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
        Schema::create('curso_tcc', function (Blueprint $table) {
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('tcc_id');

            $table->timestamps();

            $table->foreign('curso_id')
                  ->references('id_curso')
                  ->on('cursos')
                  ->onDelete('cascade');
            
            $table->foreign('tcc_id')
                  ->references('id_tcc')
                  ->on('tccs')
                  ->onDelete('cascade');
                  
            $table->primary(['curso_id', 'tcc_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_tcc');
    }
};
