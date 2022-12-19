
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
					<h1 class="panel-title text-center" style="font-size:25px"><b>UBAH DATA PASIEN</b></h1>
				</div>
					<div class="panel-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                         {{Session('sukses') }}
                        </div>
                    @endif
                    <form action = "#" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group {{$errors->has('NIK') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" class="form-control" name="NIK" placeholder="Masukkan NIK" value="{{old('NIK', $pasien->NIK)}}" required>
                @if($errors->has('NIK'))
                  <span class="help-block">{{$errors->first('NIK')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Pasien</label>
                <input type="text" class="form-control" name="nama"  placeholder="Masukkan Nama Pasien" value="{{old('nama', $pasien->nama)}}" required>
                @if($errors->has('nama'))
                  <span class="help-block">{{$errors->first('nama')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir"  value="{{old('tanggal_lahir', $pasien->tanggal_lahir)}}" required>
                @if($errors->has('tanggal_lahir'))
                  <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option placeholder>Pilih...</option>
                    <option value="Pria" {{($pasien->jenis_kelamin === 'Pria') ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{($pasien->jenis_kelamin === 'Wanita') ? 'selected' : '' }}>Wanita</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                  <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="alamat"  placeholder="Masukkan Alamat" value="{{old('alamat', $pasien->alamat)}}" required>
                @if($errors->has('alamat'))
                  <span class="help-block">{{$errors->first('alamat')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('pekerjaan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan"  placeholder="Masukkan Pekerjaan" value="{{old('pekerjaan', $pasien->pekerjaan)}}" required>
                @if($errors->has('pekerjaan'))
                  <span class="help-block">{{$errors->first('pekerjaan')}}</span>
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

