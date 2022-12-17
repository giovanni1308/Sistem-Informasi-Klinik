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
                <h2 class="panel-title text-center" style="font-size:30px"><b>DATA PASIEN</b></h2>
								</div>
                @if(auth()->user()->role=='admin')
                <button type="button" class="btn btn-primary btn-sm left" style="margin:0px 0px 10px 25px" data-toggle="modal" data-target="#exampleModal">Pendaftaran Pasien</button>
                @endif
                <br>
								<div class="panel-body">
                 </div>
									<table class="table table-hover">
										<thead>
											<tr>
                        <td>No</td>
                        <td>NIK</td>
                        <td>Nama</td>
                        <td>Tanggal Lahir</td>
                        <td>Jenis Kelamin</td>
                        <td>Alamat</td>
                        <td>Pekerjaan</td>
                        @if(auth()->user()->role=='admin')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($data_pasien as $result => $hasil)
                    <tr>
                        <td>{{$result + $data_pasien->firstitem()}}</td>
                        <td>{{$hasil->NIK}}</td>
                        <td>{{$hasil->nama}}</td>
                        <td>{{$hasil->tanggal_lahir}}</td>
                        <td>{{$hasil->jenis_kelamin}}</td>
                        <td>{{$hasil->alamat}}</td>
                        <td>{{$hasil->pekerjaan}}</td>
                        <td><a href="/Pasien/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/Pasien/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
                  {{$data_pasien->links()}}
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
  </div> 

  @if(auth()->user()->role=='admin')
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/Pasien/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('NIK') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" class="form-control" name="NIK" placeholder="Masukkan NIK" value="{{old('NIK')}}" required>
                @if($errors->has('NIK'))
                  <span class="help-block">{{$errors->first('NIK')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Pasien</label>
                <input type="text" class="form-control" name="nama"  placeholder="Masukkan Nama Pasien" value="{{old('nama')}}" required>
                @if($errors->has('nama'))
                  <span class="help-block">{{$errors->first('nama')}}</span>
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
                <input type="text" class="form-control" name="jenis_kelamin"  placeholder="Masukkan Jenis Kelamin" value="{{old('jenis_kelamin')}}" required>
                @if($errors->has('jenis_kelamin'))
                  <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="alamat"  placeholder="Masukkan Alamat" value="{{old('alamat')}}" required>
                @if($errors->has('alamat'))
                  <span class="help-block">{{$errors->first('alamat')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('pekerjaan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan"  placeholder="Masukkan Pekerjaan" value="{{old('pekerjaan')}}" required>
                @if($errors->has('pekerjaan'))
                  <span class="help-block">{{$errors->first('pekerjaan')}}</span>
                @endif
            </div>
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
