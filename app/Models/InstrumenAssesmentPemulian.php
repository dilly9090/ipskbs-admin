<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstrumenAssesmentPemulian extends Model
{
    use SoftDeletes;
    protected $table='instrumen_assesment_pemulian';
    protected $fillable=['id_user','status','dinas_provinsi','dinas_kabupaten','id_unit','nomor_penugasan','perihal_penugasan','tanggal_kejadian','waktu_kejadian','kronologi','penyebab','jlh_rusak_berat','jlh_rusak_sedang','jlh_rusak_ringan','jlh_meninggal','jlh_luka','rekap_data_korban','foto','surat_tugas','created_at','updated_at','deleted_at'];

    function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}
