<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pendaftaran;
use App\User;
use DB;
use Route;

class PasienController extends Controller
{
     
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_pasien=pendaftaran::where('name','LIKE','%'.$request->cari.'%')->get();
        }
        else{
            $data_pasien = pendaftaran::paginate(10);
        }
        
        return view('PendaftaranPasien.index',['data_pasien' => $data_pasien]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'NIK'=>'required',
            'nama'=>'required|min:5',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:5',
            'pekerjaan'=>'required'
        ]);
        

        //insert->pasien_table
        $pasien = new pendaftaran;
        $pasien->NIK = $request->NIK;
        $pasien->nama = $request->nama;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->save();

        return redirect('/Pasien')->with('sukses','Data Berhasil diinput');
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $pasien = pendaftaran::find($id);
        return view('Pasien.edit',['pasien' => $pasien]);   
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'NIK'=>'required',
            'nama'=>'required|min:5',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:5',
            'pekerjaan'=>'required'
        ]);

        $pasien = pendaftaran::find($id);
        $pasien -> update($request->all());
        
        return redirect('/Pasien')->with('sukses','Data berhasil diubah');
      
    }

    public function delete($id){
        $pasien = pendaftaran::find($id);
        $pasien -> delete($pasien);

        return redirect('Pasien')->with('sukses','Data Berhasil Dihapus');
    
    }
        
}
