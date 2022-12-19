<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wilayah;
use App\User;
use DB;


class WilayahController extends Controller
{
    public function index(Request $request)
    {
        
            $data_wilayah = wilayah::paginate(10);
        
        return view('Wilayah.index',['data_wilayah' => $data_wilayah]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'kode_ruangan'=>'required',
            'nama_poliklinik'=>'required',
            'keterangan'=>'required|min:5'
        ]);
        

        //insert->wilayah_table
        $wilayah = new wilayah;
        $wilayah->kode_ruangan = $request->kode_ruangan;
        $wilayah->nama_poliklinik = $request->nama_poliklinik;
        $wilayah->keterangan = $request->keterangan;
        $wilayah->save();

        return redirect('/Wilayah')->with('sukses','Data Berhasil diinput');
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
        $wilayah = wilayah::find($id);
        return view('Wilayah.edit',['wilayah' => $wilayah]);   
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kode_ruangan'=>'required',
            'nama_poliklinik'=>'required',
            'keterangan'=>'required|min:5'
        ]);

        $wilayah = wilayah::find($id);
        $wilayah -> update($request->all());
        
        return redirect('/Wilayah')->with('sukses','Data berhasil diubah');
      
    }

    public function delete($id){
        $wilayah = wilayah::find($id);
        $wilayah -> delete($wilayah);

        return redirect('/Wilayah')->with('sukses','Data Berhasil Dihapus');
    
    }
}
