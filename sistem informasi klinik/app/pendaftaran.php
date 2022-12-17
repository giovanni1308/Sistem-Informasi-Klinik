<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    protected $table='pendaftaran';
    protected $fillable=['NIK','nama','tanggal_lahir','jenis_kelamin','alamat','pekerjaan'];
}
