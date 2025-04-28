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
            $table->string('jawaban_user')->nullable(); // Menambahkan kolom jawaban_user
        });
    }

    public function down()
    {
        Schema::table('battle_log', function (Blueprint $table) {
            $table->dropColumn('jawaban_user'); // Menghapus kolom jawaban_user jika rollback
        });
    }

};
