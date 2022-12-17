<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tindakan extends Model
{
    protected $table='tindakan';
    protected $fillable=['nama_tindakan_medis','keterangan'];
}
