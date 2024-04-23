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
        Schema::table('autortcc', function (Blueprint $table) {
            $table->unsignedBigInteger('tcc_id');

            $table->foreign('tcc_id')
                  ->references('id_tcc')
                  ->on('tccs')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('autortcc', function (Blueprint $table) {
            $table->dropForeign(['tcc_id']);
            $table->dropColumn('tcc_id');
        });
    }
};
