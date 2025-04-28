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
        Schema::table('progress_petualangan', function (Blueprint $table) {
            $table->text('soal_ids')->nullable(); // Menyimpan ID soal yang sudah dijawab
        });
    }

    public function down()
    {
        Schema::table('progress_petualangan', function (Blueprint $table) {
            $table->dropColumn('soal_ids');
        });
    }

};
