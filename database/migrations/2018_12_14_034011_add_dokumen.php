<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instrumen_JHPKBS', function (Blueprint $table) {
            $table->string('dokumen_rekening')->nullable();
            $table->string('dokumen_foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instrumen_JHPKBS', function (Blueprint $table) {
            $table->dropColumn('dokumen_rekening');
            $table->dropColumn('dokumen_foto');
        });
    }
}
