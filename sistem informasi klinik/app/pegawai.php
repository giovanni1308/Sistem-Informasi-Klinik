<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table='pegawai';
    protected $fillable=['NIK','nama_pegawai','jabatan','tanggal_lahir','jenis_kelamin','email','alamat'];
}
