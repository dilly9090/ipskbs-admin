<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use SoftDeletes;
    protected $table='dokumen';
    protected $fillable=['status','jenis_dokumen','id_laporan','nama_dokumen','created_at','updated_at','deleted_at'];
}
