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
                <h2 class="panel-title text-center" style="font-size:30px"><b>DATA OBAT</b></h2>
								</div>
                @if(auth()->user()->role=='Administrator')
                <button type="button" class="btn btn-primary btn-sm left" style="margin:0px 0px 10px 25px" data-toggle="modal" data-target="#exampleModal">Tambah Obat</button>
                @endif
                <br>
								<div class="panel-body">
                 </div>
									<table class="table table-hover">
										<thead>
											<tr>
                        <td>No</td>
                        <td>Nama Obat</td>
                        <td>Stok</td>
                        <td>Harga</td>
                        <td>Keterangan</td>
                        @if(auth()->user()->role=='Administrator')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($data_obat as $result => $hasil)
                    <tr>
                        <td>{{$result + $data_obat->firstitem()}}</td>
                        <td>{{$hasil->nama_obat}}</td>
                        <td>{{$hasil->stok}}</td>
                        <td>{{$hasil->harga}}</td>
                        <td>{{$hasil->keterangan_obat}}</td>
                        <td><a href="/Obat/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/Obat/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
                  {{$data_obat->links()}}
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
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/Obat/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('nama_obat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" placeholder="Masukkan Nama Obat" value="{{old('nama_obat')}}" required>
                @if($errors->has('nama_obat'))
                  <span class="help-block">{{$errors->first('nama_obat')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('stok') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Stok</label>
                <input type="text" class="form-control" name="stok"  placeholder="Masukkan Stok Obat" value="{{old('stok')}}" required>
                @if($errors->has('stok'))
                  <span class="help-block">{{$errors->first('stok')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('harga') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text" class="form-control" name="harga"  placeholder="Masukkan Harga Obat" value="{{old('harga')}}" required>
                @if($errors->has('harga'))
                  <span class="help-block">{{$errors->first('harga')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('keterangan_obat') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" class="form-control" name="keterangan_obat"  placeholder="Masukkan Keterangan Obat" value="{{old('keterangan_obat')}}" required>
                @if($errors->has('keterangan_obat'))
                  <span class="help-block">{{$errors->first('keterangan_obat')}}</span>
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
