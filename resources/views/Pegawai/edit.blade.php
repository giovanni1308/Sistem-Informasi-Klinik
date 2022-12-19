
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
					<h1 class="panel-title text-center" style="font-size:25px"><b>UBAH DATA PEGAWAI</b></h1>
				</div>
					<div class="panel-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                         {{Session('sukses') }}
                        </div>
                    @endif
                    <form action = "/Pegawai/{{$pegawai->id}}/update" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group {{$errors->has('NIK') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" class="form-control" name="NIK" placeholder="Masukkan NIK" value="{{old('NIK', $pegawai->NIK)}}" required>
                @if($errors->has('NIK'))
                  <span class="help-block">{{$errors->first('NIK')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_pegawai') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Pegawai</label>
                <input type="text" class="form-control" name="nama_pegawai"  placeholder="Masukkan Nama Pegawai" value="{{old('nama_pegawai', $pegawai->nama_pegawai)}}" required>
                @if($errors->has('nama_pegawai'))
                  <span class="help-block">{{$errors->first('nama_pegawai')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('jabatan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Jabatan</label>
                <select name="jabatan" class="form-control" id="jabatan" required>
                    <option placeholder>Pilih...</option>
                    <option value="Administrator" {{($pegawai->jabatan === 'Administrator') ? 'selected' : '' }}>Administrator</option>
                    <option value="Dokter" {{($pegawai->jabatan === 'Dokter') ? 'selected' : '' }}>Dokter</option>
                </select>
                @if($errors->has('jabatan'))
                  <span class="help-block">{{$errors->first('jabatan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir"  value="{{old('tanggal_lahir', $pegawai->tanggal_lahir)}}" required>
                @if($errors->has('tanggal_lahir'))
                  <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option placeholder>Pilih...</option>
                    <option value="Pria" {{($pegawai->jenis_kelamin === 'Pria') ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{($pegawai->jenis_kelamin === 'Wanita') ? 'selected' : '' }}>Wanita</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                  <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" name="email"  placeholder="Masukkan Email" value="{{old('email', $pegawai->email)}}" required>
                @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="alamat"  placeholder="Masukkan Alamat" value="{{old('alamat', $pegawai->alamat)}}" required>
                @if($errors->has('alamat'))
                  <span class="help-block">{{$errors->first('alamat')}}</span>
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

