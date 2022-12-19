
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
					<h1 class="panel-title text-center" style="font-size:25px"><b>UBAH DATA TINDAKAN MEDIS</b></h1>
				</div>
					<div class="panel-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                         {{Session('sukses') }}
                        </div>
                    @endif
                    <form action = "/Tindakan/{{$tindakan->id}}/update" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group {{$errors->has('kode_tindakan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Kode Tindakan</label>
                <input type="text" class="form-control" name="kode_tindakan" placeholder="Masukkan Kode Tindakan" value="{{old('kode_tindakan', $tindakan->kode_tindakan)}}" required>
                @if($errors->has('kode_tindakan'))
                  <span class="help-block">{{$errors->first('kode_tindakan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_tindakan_medis') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Tindakan</label>
                <input type="text" class="form-control" name="nama_tindakan_medis"  placeholder="Masukkan Nama Tindakan Medis" value="{{old('nama_tindakan_medis', $tindakan->nama_tindakan_medis)}}" required>
                @if($errors->has('nama_tindakan_medis'))
                  <span class="help-block">{{$errors->first('nama_tindakan_medis')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('harga') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Harga</label>
                <input type="number" class="form-control" name="harga"  placeholder="Masukkan Harga" value="{{old('harga', $tindakan->harga)}}" required>
                @if($errors->has('harga'))
                  <span class="help-block">{{$errors->first('harga')}}</span>
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

