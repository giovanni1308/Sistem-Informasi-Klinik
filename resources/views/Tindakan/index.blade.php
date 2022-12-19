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
                <h2 class="panel-title text-center" style="font-size:30px"><b>DATA TINDAKAN MEDIS</b></h2>
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
                        <td>Kode Tindakan</td>
                        <td>Nama Tindakan</td>
                        <td>Harga</td>
                        @if(auth()->user()->role=='Administrator')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($data_tindakan as $result => $hasil)
                    <tr>
                        <td>{{$result + $data_tindakan->firstitem()}}</td>
                        <td>{{$hasil->kode_tindakan}}</td>
                        <td>{{$hasil->nama_tindakan_medis}}</td>
                        <td>@currency($hasil->harga)</td>
                        <td><a href="/Tindakan/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/Tindakan/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
                  {{$data_tindakan->links()}}
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
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Tindakan Medis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/Tindakan/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('kode_tindakan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Kode Tindakan</label>
                <input type="text" class="form-control" name="kode_tindakan" placeholder="Masukkan Kode Tindakan Medis" value="{{old('kode_tindakan')}}" required>
                @if($errors->has('kode_tindakan'))
                  <span class="help-block">{{$errors->first('kode_tindakan')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('nama_tindakan_medis') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Tindakan</label>
                <input type="text" class="form-control" name="nama_tindakan_medis"  placeholder="Masukkan Nama Tindakan Medis" value="{{old('nama_tindakan_medis')}}" required>
                @if($errors->has('nama_tindakan_medis'))
                  <span class="help-block">{{$errors->first('nama_tindakan_medis')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('harga') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Harga</label>
                <input type="number" class="form-control" name="harga"  placeholder="Masukkan Harga" value="{{old('harga')}}" required>
                @if($errors->has('harga'))
                  <span class="help-block">{{$errors->first('harga')}}</span>
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
