<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstrumenJHPKBS extends Model
{
    use SoftDeletes;
    protected $table='instrumen_JHPKBS';
    protected $fillable=['id_user','status','provinsi_id','kabupaten_id','kecamatan_id','kelurahan_id','id_unit','lokasi','id_jenis','kronologis','total_pengunsi','total_dewasa_lk','total_dewasa_pr','total_anak_lk_6_17','total_anak_pr_6_17','total_balita_0_5','total_lansia','dokumen','no_laporan','created_at','updated_at','deleted_at'];

    function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    function jenis()
    {
        return $this->belongsTo('App\Models\JenisBencana','id_jenis');
    }
}
