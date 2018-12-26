<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumenLaporangKejadiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumen_laporan_kejadian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->nullable()->default(0);
            $table->integer('id_unit')->nullable()->default(0);
            $table->date('waktu_kejadian')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->string('lokasi_kejadian')->nullable();
            $table->text('kronologis')->nullable();
            $table->integer('id_jenis')->nullable()->default(0);
            $table->integer('jumlah_korban_terdampak')->nullable()->default(0);
            $table->integer('jumlah_korban_meninggal')->nullable()->default(0);
            $table->integer('jumlah_korban_luka')->nullable()->default(0);
            $table->integer('jumlah_korban_anak')->nullable()->default(0);
            $table->integer('jumlah_korban_dewasa')->nullable()->default(0);
            $table->integer('jumlah_korban_lansia')->nullable()->default(0);
            $table->integer('jumlah_korban_disabilitas')->nullable()->default(0);
            $table->integer('jumlah_rusak_ringan')->nullable()->default(0);
            $table->integer('jumlah_rusak_sedang')->nullable()->default(0);
            $table->integer('jumlah_rusak_berat')->nullable()->default(0);
            $table->text('kerugian_lain')->nullable();
            $table->integer('id_kebutuhan')->nullable()->default(0);
            $table->text('lokasi_pengungsi')->nullable();
            $table->text('upaya_penanganan')->nullable();
            $table->text('data_korban')->nullable();
            $table->text('dokumentasi_kejadian')->nullable();
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
        Schema::dropIfExists('instrumen_laporan_kejadian');
    }
}
