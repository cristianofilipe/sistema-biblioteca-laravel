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
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->unsignedBigInteger('visitante_id');
            $table->unsignedBigInteger('material_id');

            $table->foreign('material_id')
                  ->references('id_material')
                  ->on('materials')
                  ->onDelete('cascade');

            $table->foreign('visitante_id')
                  ->references('id_visitante')
                  ->on('visitantes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->dropForeign(['visitante_id']);
            $table->dropColumn('visitante_id');

            $table->dropForeign(['material_id']);
            $table->dropColumn('material_id');
        });
    }
};
