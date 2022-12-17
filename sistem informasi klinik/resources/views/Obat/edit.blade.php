
@extends('Layouts.master')

@section('content')
<div class="main">
      <div class="main-container">
          <div class = "container-fluid">
            <div class = "row">
            <br>
              <div class = "col-md-12">
              <div class="panel">
				<div class="panel-heading">
					<h1 class="panel-title text-center" style="font-size:25px"><b>UBAH DATA OBAT</b></h1>
				</div>
					<div class="panel-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                         {{Session('sukses') }}
                        </div>
                    @endif
                    <form action = "/Obat/{{$obat->id}}/update" method="POST" enctype="multipart/form-data">
                       @csrf
                <div class="form-group {{$errors->has('nama_obat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" placeholder="Masukkan Nama Obat" value="{{old('nama_obat', $obat->nama_obat)}}" required>
                @if($errors->has('nama_obat'))
                  <span class="help-block">{{$errors->first('nama_obat')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('stok') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Stok</label>
                <input type="text" class="form-control" name="stok"  placeholder="Masukkan Stok Obat" value="{{old('stok', $obat->stok)}}" required>
                @if($errors->has('stok'))
                  <span class="help-block">{{$errors->first('stok')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('harga') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text" class="form-control" name="harga"  placeholder="Masukkan Harga Obat" value="{{old('harga', $obat->harga)}}" required>
                @if($errors->has('harga'))
                  <span class="help-block">{{$errors->first('harga')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('keterangan_obat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" class="form-control" name="keterangan_obat"  placeholder="Masukkan Keterangan Obat" value="{{old('keterangan_obat', $obat->keterangan_obat)}}" required>
                @if($errors->has('keterangan_obat'))
                  <span class="help-block">{{$errors->first('keterangan_obat')}}</span>
                @endif
            </div>
      <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
                    </form>
					</div>
				</div>
              </div>
            </div>
        </div>                  
</div>

@endsection

