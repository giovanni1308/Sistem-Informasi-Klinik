<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pegawai;
use DB;
use Route;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        
            $data_pegawai = pegawai::paginate(10);
        
        return view('Pegawai.index',['data_pegawai' => $data_pegawai]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'NIK'=>'required|min:16',
            'nama_pegawai'=>'required|min:5',
            'jabatan'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'email'=>'required|unique:pegawai,email',
            'alamat'=>'required'
        ]);
        

        //insert->pegawai_table
        $pegawai = new pegawai;
        $pegawai->NIK = $request->NIK;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        $pegawai->save();

        return redirect('/Pegawai')->with('sukses','Data Berhasil diinput');
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
        $pegawai = pegawai::find($id);
        return view('Pegawai.edit',['pegawai' => $pegawai]);   
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'NIK'=>'required|min:16',
            'nama_pegawai'=>'required|min:5',
            'jabatan'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'email'=>'required',
            'alamat'=>'required'
        ]);

        $pegawai = pegawai::find($id);
        $pegawai -> update($request->all());
        
        return redirect('/Pegawai')->with('sukses','Data berhasil diubah');
      
    }

    public function delete($id){
        $pegawai = pegawai::find($id);
        $pegawai -> delete($pegawai);

        return redirect('/Pegawai')->with('sukses','Data Berhasil Dihapus');
    
    }
}
