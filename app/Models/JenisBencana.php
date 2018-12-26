<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBencana extends Model
{
    use SoftDeletes;
    protected $table='jenis_bencana';
    protected $fillable=['jenis','keterangan','flag','created_at','updated_at','deleted_at'];
}
