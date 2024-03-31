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
        Schema::table('tccs', function (Blueprint $table) {
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('curso_id');

            $table->foreign('material_id')
                  ->references('id_material')
                  ->on('materials')
                  ->onDelete('cascade');
        
            $table->foreign('curso_id')
                  ->references('id_curso')
                  ->on('cursos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tccs', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
            $table->dropColumn('curso_id');

            $table->dropForeign(['material_id']);
            $table->dropColumn('material_id');
        });
    }
};
