<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wilayah extends Model
{
    protected $table='wilayah';
    protected $fillable=['kode_ruangan','nama_poliklinik','keterangan'];
}
