<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNodin3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instrumen_assesment_pemulian', function (Blueprint $table) {
            $table->string('nodin_kasubdit')->nullable();
            $table->string('nodin_direktur')->nullable();
            $table->string('disposisi_direktur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instrumen_assesment_pemulian', function (Blueprint $table) {
            $table->dropColumn('nodin_kasubdit');
            $table->dropColumn('nodin_direktur');
            $table->dropColumn('disposisi_direktur');
        });
    }
}
