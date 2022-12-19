<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tindakan;
use DB;
use Route;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_tindakan = tindakan::paginate(10);
        
        return view('Tindakan.index',['data_tindakan' => $data_tindakan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'kode_tindakan'=>'required',
            'nama_tindakan_medis'=>'required',
            'harga'=>'required'
        ]);
        

        //insert->tindakan_table
        $tindakan = new tindakan;
        $tindakan->kode_tindakan = $request->kode_tindakan;
        $tindakan->nama_tindakan_medis = $request->nama_tindakan_medis;
        $tindakan->harga = $request->harga;
        $tindakan->save();

        return redirect('/Tindakan')->with('sukses','Data Berhasil diinput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $tindakan = tindakan::find($id);

        return view('Tindakan.edit',['tindakan' => $tindakan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kode_tindakan'=>'required',
            'nama_tindakan_medis'=>'required',
            'harga'=>'required'
        ]);

        $tindakan = tindakan::find($id);
        $tindakan -> update($request->all());
        
        return redirect('/Tindakan')->with('sukses','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $tindakan = tindakan::find($id);
        $tindakan -> delete($tindakan);

        return redirect('/Tindakan')->with('sukses','Data Berhasil Dihapus');
    
    }
}
