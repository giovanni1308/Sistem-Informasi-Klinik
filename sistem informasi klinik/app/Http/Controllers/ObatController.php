<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obat;

class ObatController extends Controller
{
    public function index()
    {
       $data_obat=obat::paginate(10);
       return view('Obat.index',['data_obat'=> $data_obat]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_obat'=>'required',
            'stok'=>'required|numeric',
            'harga'=>'required|numeric',
            'keterangan_obat'=>'required'
        ]);

        //insert->obat_table
        $obat = new obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->stok = $request->stok;
        $obat->harga = $request->harga;
        $obat->keterangan_obat = $request->keterangan_obat;
        $obat->save();

        return redirect('/Obat')->with('sukses','Data Obat Berhasil diinput');
    }

    public function edit($id)
    {
        $obat = obat::find($id);
        return view('Obat.edit',['obat' => $obat]);  

    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'nama_obat'=>'required',
            'stok'=>'required|numeric',
            'harga'=>'required|numeric',
            'keterangan_obat'=>'required'
        ]);

        $obat = obat::find($id);
        $obat->update($request->all());
        
        return redirect('/Obat')->with('sukses','Data Obat Berhasil diubah');
    }

    function delete($id)
    {
        $obat = obat::find($id);
        $obat->delete($obat);
        return redirect('/Obat')->with('sukses','Data Obat Berhasil Dihapus');
    }
}
