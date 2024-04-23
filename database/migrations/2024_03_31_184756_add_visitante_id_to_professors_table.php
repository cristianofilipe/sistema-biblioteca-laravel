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
        Schema::table('professors', function (Blueprint $table) {
            $table->unsignedBigInteger('visitante_id');

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
        Schema::table('professors', function (Blueprint $table) {
            $table->dropForeign(['visitante_id']);
            $table->dropColumn('visitante_id');
        });
    }
};
