<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notifikasi extends Model
{
    use SoftDeletes;
    protected $table='notifikasi';
    protected $fillable=['judul','pesan','tanggal','jam','sender','to','seen_status','created_at','updated_at','deleted_at'];

    function sender()
    {
        $this->belongsTo('App\User','sender');
    }

    function to()
    {
        $this->belongsTo('App\User','to');
    }
}
