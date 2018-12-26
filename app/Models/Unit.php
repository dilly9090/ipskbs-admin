<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    protected $table='unit';
    protected $fillable = ['nama_unit','id_parent','sub_unit','status','created_at','updated_at','deleted_at'];

    function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi','id_parent');
    }
    function kabupaten()
    {
        return $this->belongsTo('App\Models\Kabupaten','sub_unit');
    }
}
