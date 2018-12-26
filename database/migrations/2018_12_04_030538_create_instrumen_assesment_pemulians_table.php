<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumenAssesmentPemuliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumen_assesment_pemulian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->nullable()->default(0);
            $table->integer('dinas_provinsi')->nullable()->default(0);
            $table->integer('id_unit')->nullable()->default(0);
            $table->string('nomor_penugasan')->nullable();
            $table->string('perihal_penugasan')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->date('tanggal_kejadian')->nullable();
            $table->time('waktu_kejadian')->nullable();
            $table->text('kronologi')->nullable();
            $table->text('penyebab')->nullable();
            $table->integer('jlh_rusak_berat')->nullable()->default(0);
            $table->integer('jlh_rusak_sedang')->nullable()->default(0);
            $table->integer('jlh_rusak_ringan')->nullable()->default(0);
            $table->integer('jlh_meninggal')->nullable()->default(0);
            $table->integer('jlh_luka')->nullable()->default(0);
            $table->text('rekap_data_korban')->nullable();
            $table->text('foto')->nullable();
            $table->text('surat_tugas')->nullable();
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
        Schema::dropIfExists('instrumen_assesment_pemulian');
    }
}
