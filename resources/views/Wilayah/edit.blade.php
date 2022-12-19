
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
					<h1 class="panel-title text-center" style="font-size:25px"><b>UBAH DATA POLIKLINIK</b></h1>
				</div>
					<div class="panel-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                         {{Session('sukses') }}
                        </div>
                    @endif
                    <form action = "/Wilayah/{{$wilayah->id}}/update" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group {{$errors->has('kode_ruangan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">kode_ruangan</label>
                <input type="text" class="form-control" name="kode_ruangan" placeholder="Masukkan Kode Ruangan" value="{{old('kode_ruangan', $wilayah->kode_ruangan)}}" required>
                @if($errors->has('kode_ruangan'))
                  <span class="help-block">{{$errors->first('kode_ruangan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_poliklinik') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Poliklinik</label>
                <input type="text" class="form-control" name="nama_poliklinik"  placeholder="Masukkan Nama Poliklinik" value="{{old('nama_poliklinik', $wilayah->nama_poliklinik)}}" required>
                @if($errors->has('nama'))
                  <span class="help-block">{{$errors->first('nama')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('keterangan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" class="form-control" name="keterangan"  placeholder="Masukkan Keterangan" value="{{old('keterangan', $wilayah->keterangan)}}" required>
                @if($errors->has('keterangan'))
                  <span class="help-block">{{$errors->first('keterangan')}}</span>
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

