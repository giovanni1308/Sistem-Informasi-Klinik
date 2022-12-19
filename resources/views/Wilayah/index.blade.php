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
                <h2 class="panel-title text-center" style="font-size:30px"><b>DATA POLIKLINIK</b></h2>
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
                        <td>Kode Ruangan</td>
                        <td>Nama Poliklinik</td>
                        <td>Keterangan</td>
                        @if(auth()->user()->role=='Administrator')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($data_wilayah as $result => $hasil)
                    <tr>
                        <td>{{$result + $data_wilayah->firstitem()}}</td>
                        <td>{{$hasil->kode_ruangan}}</td>
                        <td>{{$hasil->nama_poliklinik}}</td>
                        <td>{{$hasil->keterangan}}</td>
                        <td><a href="/Wilayah/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/Wilayah/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
                  {{$data_wilayah->links()}}
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
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Poliklinik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/Wilayah/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('kode_ruangan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Kode Ruangan</label>
                <input type="text" class="form-control" name="kode_ruangan" placeholder="Masukkan Kode Ruangan" value="{{old('kode_ruangan')}}" required>
                @if($errors->has('kode_ruangan'))
                  <span class="help-block">{{$errors->first('kode_ruangan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_poliklinik') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Poliklinik</label>
                <input type="text" class="form-control" name="nama_poliklinik"  placeholder="Masukkan Nama Poliklinik" value="{{old('nama_poliklinik')}}" required>
                @if($errors->has('nama_poliklinik'))
                  <span class="help-block">{{$errors->first('nama_poliklinik')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('keterangan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" class="form-control" name="keterangan"  placeholder="Masukkan Keterangan" value="{{old('keterangan')}}" required>
                @if($errors->has('keterangan'))
                  <span class="help-block">{{$errors->first('keterangan')}}</span>
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
