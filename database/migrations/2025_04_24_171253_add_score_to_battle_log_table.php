<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('battle_log', function (Blueprint $table) {
            $table->integer('score')->nullable()->default(0); // Menambahkan kolom score
        });
    }

    public function down()
    {
        Schema::table('battle_log', function (Blueprint $table) {
            $table->dropColumn('score');
        });
    }

};
