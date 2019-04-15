<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstrumenLaporanKejadian extends Model
{
    protected $table='instrumen_laporan_kejadian';
    protected $fillable=['id_user','status','id_unit','waktu_kejadian','lokasi_kejadian','kronologis','no_laporan','id_jenis','jumlah_korban_terdampak','jumlah_korban_meninggal','jumlah_korban_luka','jumlah_korban_anak','jumlah_korban_dewasa','jumlah_korban_lansia','jumlah_korban_disabilitas','jumlah_rusak_ringan','jumlah_rusak_sedang','jumlah_rusak_berat','kerugian_lain','id_kebutuhan','lokasi_pengungsi','upaya_penanganan','data_korban','dokumentasi_kejadian','created_at','updated_at','deleted_at'];

    function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    function jenis()
    {
        return $this->belongsTo('App\Models\JenisBencana','id_jenis');
    }
}
