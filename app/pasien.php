<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\pegawai;
use App\wilayah;

class pasien extends Model
{
    protected $table='pasien';
    protected $fillable=['id','kode_rekam_medis','nama','tanggal_lahir','jenis_kelamin','alamat','pekerjaan','dokter_penanggungjawab','poliklinik','keluhan'];

    public function pegawai(){
        return $this->belongsTo('App\pegawai');
    }

    public function wilayah(){
        return $this->belongsTo('App\wilayah');
    }

    public function pasienWilayah(){
        return DB::table('pasien')
        ->join('wilayah', 'wilayah.id', '=', 'pasien.poliklinik')
        ->select('pasien.id','pasien.kode_rekam_medis','pasien.nama','pasien.tanggal_lahir','pasien.jenis_kelamin','pasien.alamat','pasien.pekerjaan','pasien.poliklinik','pasien.dokter_penanggungjawab','wilayah.nama_poliklinik','pasien.keluhan')
        ->get();
    }
}
