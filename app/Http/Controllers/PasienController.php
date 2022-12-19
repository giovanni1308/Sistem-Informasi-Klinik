<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pasien;
use App\User;
use App\pegawai;
use App\wilayah;
use DB;
use Route;

class PasienController extends Controller
{

    public function __construct()
    {
        $this->pasien = new pasien();
    }
     
    public function index()
    {
        
            $pegawai= pegawai::paginate(10);
            $wilayah= wilayah::paginate(10);
            $data_pasien = [
                'pasien' => $this->pasien->pasienWilayah(),
            ];
        
        return view('Pasien.index', $data_pasien, compact('pegawai', 'wilayah'));
    }

    public function create()
    {
        // $this->validate($request,[
        //     'kode_rekam_medis'=>'required|unique:pasien,kode_rekam_medis',
        //     'nama'=>'required|min:5',
        //     'tanggal_lahir'=>'required',
        //     'jenis_kelamin'=>'required',
        //     'alamat'=>'required|min:5',
        //     'pekerjaan'=>'required',
        //     'dokter_penanggungjawab'=>'required',
        //     'poliklinik'=>'required',
        //     'keluhan'=>'required|min:5'
        // ]);
        

        // $pasien = new pasien;
        // $pasien->kode_rekam_medis = $request->kode_rekam_medis;
        // $pasien->nama = $request->nama;
        // $pasien->tanggal_lahir = $request->tanggal_lahir;
        // $pasien->jenis_kelamin = $request->jenis_kelamin;
        // $pasien->alamat = $request->alamat;
        // $pasien->pekerjaan = $request->pekerjaan;
        // $pasien->dokter_penanggungjawab = $request->dokter_penanggungjawab;
        // $pasien->poliklinik = $request->poliklinik;
        // $pasien->keluhan = $request->keluhan;
        // $pasien->save();

        // return redirect('/Pasien')->with('sukses','Data Berhasil diinput');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_rekam_medis'=>'required|unique:pasien,kode_rekam_medis',
            'nama'=>'required|min:5',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:5',
            'pekerjaan'=>'required',
            'dokter_penanggungjawab'=>'required',
            'poliklinik'=>'required',
            'keluhan'=>'required|min:5'
        ]);
        

        $pasien = new pasien;
        $pasien->kode_rekam_medis = $request->kode_rekam_medis;
        $pasien->nama = $request->nama;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->dokter_penanggungjawab = $request->dokter_penanggungjawab;
        $pasien->poliklinik = $request->poliklinik;
        $pasien->keluhan = $request->keluhan;
        $pasien->save();

        return redirect('/Pendaftaran-pasien')->with('sukses','Data Berhasil diinput');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $pasien = pasien::find($id);
        $pegawai= pegawai::paginate(10);
        return view('Pasien.edit',['pasien' => $pasien]);   
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kode_rekam_medis'=>'required',
            'nama'=>'required|min:5',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:5',
            'pekerjaan'=>'required',
            'dokter_penanggungjawab'=>'required',
            'poliklinik'=>'required',
            'keluhan'=>'required|min:5'
        ]);

        $pasien = pasien::find($id);
        $pasien -> update($request->all());
        
        return redirect('/Pasien')->with('sukses','Data berhasil diubah');
      
    }

    public function destroy($id){
        
        pasien::delete($id);

        return redirect('/Pendaftaran-pasien')->with('sukses','Data Berhasil Dihapus');
    
    }
        
}
