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
                @if(auth()->user()->role=='Administrator')
                <button type="button" class="btn btn-primary btn-sm left" style="margin:0px 0px 10px 25px" data-toggle="modal" data-target="#exampleModal">Pendaftaran Pasien</button>
                @endif
                <br>
								<div class="panel-body">
                 </div>
									<table class="table table-hover">
										<thead>
											<tr>
                        <td>No</td>
                        <td>Kode Rekam Medis</td>
                        <td>Nama</td>
                        <td>Jenis Kelamin</td>
                        <td>Dokter Penanggungjawab</td>
                        <td>Poliklinik Tujuan</td>
                        <td>Keluhan</td>
                        @if(auth()->user()->role=='Administrator')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($pasien as $result => $hasil)
                    <tr>
                        <td>{{ $result + 1 }}</td>
                        <td>{{$hasil->kode_rekam_medis}}</td>
                        <td>{{$hasil->nama}}</td>
                        <td>{{$hasil->jenis_kelamin}}</td>
                        <td>{{$hasil->dokter_penanggungjawab}}</td>
                        <td>{{$hasil->poliklinik}}</td>
                        <td>{{$hasil->keluhan}}</td>
                        <td><a href="/Pasien/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/Pendaftaran-pasien/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
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
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "{{route('Pendaftaran-pasien.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('kode_rekam_medis') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Kode Rekam Medis</label>
                <input type="text" class="form-control" name="kode_rekam_medis" placeholder="Masukkan Kode Rekam Medis" value="{{old('kode_rekam_medis')}}" required>
                @if($errors->has('kode_rekam_medis'))
                  <span class="help-block">{{$errors->first('kode_rekam_medis')}}</span>
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
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option placeholder>Pilih...</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
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
            <div class="form-group {{$errors->has('dokter_penanggungjawab') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Dokter Penanggungjawab</label>
                <select name="dokter_penanggungjawab" class="form-control" id="dokter_penanggungjawab" required>
                    <option placeholder>Pilih...</option>
                    @foreach($pegawai as $pegawais => $peg)
                    @if($peg -> jabatan === 'Dokter')
                    <option value="{{$peg->nama_pegawai}}">{{$peg->nama_pegawai}}</option>
                    @endif
                    @endforeach
                </select>
                @if($errors->has('dokter_penanggungjawab'))
                  <span class="help-block">{{$errors->first('dokter_penanggungjawab')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('poliklinik') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Poliklinik Tujuan</label>
                <select name="poliklinik" class="form-control" id="poliklinik" required>
                    <option placeholder>Pilih...</option>
                    @foreach($wilayah as $region => $reg)
                    <option value="{{$reg->id}}">{{$reg->nama_poliklinik}}</option>
                    @endforeach
                </select>
                @if($errors->has('poliklinik'))
                  <span class="help-block">{{$errors->first('poliklinik')}}</span>
                @endif
            </div>
            <!-- <div class="form-group {{$errors->has('poliklinik') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Poliklinik Tujuan</label>
                <select name="poliklinik" class="form-control" id="poliklinik" required>
                    <option placeholder>Pilih...</option>
                    @foreach($wilayah as $region => $reg)
                    <option value="{{$reg->id}}">{{$reg->nama_poliklinik}}</option>
                    @endforeach
                </select>
                @if($errors->has('dokter_penanggungjawab'))
                  <span class="help-block">{{$errors->first('dokter_penanggungjawab')}}</span>
                @endif
            </div> -->
            <div class="form-group {{$errors->has('keluhan') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Keluhan</label>
                <textarea type="text" class="form-control" name="keluhan"  placeholder="Masukkan Keluhan" required>{{old('keluhan')}}</textarea>
                @if($errors->has('keluhan'))
                  <span class="help-block">{{$errors->first('keluhan')}}</span>
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
