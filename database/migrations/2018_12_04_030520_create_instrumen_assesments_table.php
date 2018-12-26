<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumenAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumen_assesment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->nullable()->default(0);
            $table->integer('id_unit')->nullable()->default(0);
            $table->string('nomor_penugasan')->nullable();
            $table->string('perihal_penugasan')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->date('waktu_assement')->nullable();
            $table->date('waktu_kejadian')->nullable();
            $table->string('lokasi_kejadian')->nullable();
            $table->string('kronologis')->nullable();
            $table->integer('id_jenis')->nullable()->default(0);
            $table->integer('jumlah_meninggal')->nullable()->default(0);
            $table->integer('jumlah_luka')->nullable()->default(0);
            $table->text('data_korban')->nullable();
            $table->text('ahli_waris')->nullable();
            $table->text('surat_kematian')->nullable();
            $table->text('keterangan_surat')->nullable();
            $table->text('keterangan_ahli_waris')->nullable();
            $table->text('fc_rekening_ahli_waris')->nullable();
            $table->text('fc_rekening_luka')->nullable();
            $table->text('laporan_kejadian_polisi')->nullable();
            $table->text('surat_rekomendasi_ke_prov')->nullable();
            $table->text('surat_rekomendasi_dari_prov')->nullable();
            $table->text('surat_tugas')->nullable();
            $table->text('sppd')->nullable();
            $table->text('foto_kegiatan')->nullable();
            $table->text('sk_telah_assesmen')->nullable();
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
        Schema::dropIfExists('instrumen_assesment');
    }
}
