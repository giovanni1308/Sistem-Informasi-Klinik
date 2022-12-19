<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pegawai extends Model
{
    protected $table='pegawai';
    protected $fillable=['NIK','nama_pegawai','jabatan','tanggal_lahir','jenis_kelamin','email','alamat'];

    public function pasien(){
        return $this->hasMany('App\pasien');
    }

}
