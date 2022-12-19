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
                <h2 class="panel-title text-center" style="font-size:30px"><b>DATA PEGAWAI</b></h2>
								</div>
                @if(auth()->user()->role=='Administrator')
                <button type="button" class="btn btn-primary btn-sm left" style="margin:0px 0px 10px 25px" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                @endif
                <br>
								<div class="panel-body">
                 </div>
									<table class="table table-hover">
										<thead>
											<tr>
                        <td>No</td>
                        <td>NIK</td>
                        <td>Nama Pegawai</td>
                        <td>Jabatan</td>
                        <td>Jenis Kelamin</td>
                        <td>Email</td>
                        @if(auth()->user()->role=='Administrator')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($data_pegawai as $result => $hasil)
                    <tr>
                        <td>{{$result + $data_pegawai->firstitem()}}</td>
                        <td>{{$hasil->NIK}}</td>
                        <td>{{$hasil->nama_pegawai}}</td>
                        <td>{{$hasil->jabatan}}</td>
                        <td>{{$hasil->jenis_kelamin}}</td>
                        <td>{{$hasil->email}}</td>
                        <td><a href="/Pegawai/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/Pegawai/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
                  {{$data_pegawai->links()}}
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
  </div> 

  @if(auth()->user()->role=='Administrator')
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/Pegawai/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('NIK') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" class="form-control" name="NIK"  placeholder="Masukkan NIK" value="{{old('NIK')}}" required>
                @if($errors->has('NIK'))
                  <span class="help-block">{{$errors->first('NIK')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_pegawai') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Pegawai</label>
                <input type="text" class="form-control" name="nama_pegawai"  placeholder="Masukkan Nama Pegawai" value="{{old('nama_pegawai')}}" required>
                @if($errors->has('nama_pegawai'))
                  <span class="help-block">{{$errors->first('nama_pegawai')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('jabatan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Jabatan</label>
                <select name="jabatan" class="form-control" id="jabatan" required>
                    <option placeholder>Pilih...</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Dokter">Dokter</option>
                </select>
                @if($errors->has('jabatan'))
                  <span class="help-block">{{$errors->first('jabatan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir"  value="{{old('tanggal_lahir')}}" required>
                @if($errors->has('tanggal_lahir'))
                  <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option placeholder>Pilih...</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                  <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" name="email"  placeholder="Masukkan Email" value="{{old('email')}}" required>
                @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="alamat"  placeholder="Masukkan Alamat" value="{{old('alamat')}}" required>
                @if($errors->has('alamat'))
                  <span class="help-block">{{$errors->first('alamat')}}</span>
                @endif
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
      </div>
    </div>
  </div>
  @endif
@endsection
