<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumenJHPKBSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumen_JHPKBS', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->nullable()->default(0);
            $table->integer('provinsi_id')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->integer('kabupaten_id')->nullable()->default(0);
            $table->integer('kecamatan_id')->nullable()->default(0);
            $table->integer('kelurahan_id')->nullable()->default(0);
            $table->integer('id_unit')->nullable()->default(0);
            $table->string('lokasi')->nullable();
            $table->integer('id_jenis')->nullable()->default(0);
            $table->text('kronologis')->nullable();
            $table->integer('total_pengunsi')->nullable()->default(0);
            $table->integer('total_dewasa_lk')->nullable()->default(0);
            $table->integer('total_dewasa_pr')->nullable()->default(0);
            $table->integer('total_anak_lk_6_17')->nullable()->default(0);
            $table->integer('total_anak_pr_6_17')->nullable()->default(0);
            $table->integer('total_balita_0_5')->nullable()->default(0);
            $table->integer('total_lansia')->nullable()->default(0);
            $table->text('dokumen')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumen_JHPKBS');
    }
}
