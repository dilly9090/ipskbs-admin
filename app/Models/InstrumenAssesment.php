<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstrumenAssesment extends Model
{
    use SoftDeletes;
    protected $table='instrumen_assesment';
    protected $fillable=['id_user','id_unit','status','nomor_penugasan','perihal_penugasan','waktu_assement','waktu_kejadian','lokasi_kejadian','kronologis','id_jenis','jumlah_meninggal','jumlah_luka','data_korban','ahli_waris','surat_kematian','keterangan_surat','keterangan_ahli_waris','fc_rekening_ahli_waris','fc_rekening_luka','laporan_kejadian_polisi','surat_rekomendasi_ke_prov','surat_rekomendasi_dari_prov','surat_tugas','sppd','foto_kegiatan','sk_telah_assesmen','created_at','updated_at','deleted_at'];

    function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    function jenis()
    {
        return $this->belongsTo('App\Models\JenisBencana','id_jenis');
    }
}
