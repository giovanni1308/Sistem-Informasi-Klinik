<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    protected $table='obat';
    protected $fillable=['nama_obat','stok','harga','keterangan_obat'];
}
