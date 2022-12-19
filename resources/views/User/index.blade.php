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
                <h2 class="panel-title text-center" style="font-size:30px"><b>DATA PENGGUNA</b></h2>
								</div>
                @if(auth()->user()->role=='Administrator')
                <button type="button" class="btn btn-primary btn-sm left" style="margin:0px 0px 10px 25px" data-toggle="modal" data-target="#exampleModal">Tambah Pengguna</button>
                @endif
                <br>
								<div class="panel-body">
                 </div>
									<table class="table table-hover">
										<thead>
											<tr>
                        <td>No</td>
                        <td>Role</td>
                        <td>Nama</td>
                        <td>Email</td>
                        @if(auth()->user()->role=='Administrator')
                        <td>AKSI</td>
                        @endif
											</tr>
										</thead>
										<tbody>
                    @foreach($data_user as $result => $hasil)
                    <tr>
                        <td>{{$result + $data_user->firstitem()}}</td>
                        <td>{{$hasil->role}}</td>
                        <td>{{$hasil->name}}</td>
                        <td>{{$hasil->email}}</td>
                        <td><a href="/User/{{$hasil->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="/User/{{$hasil->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus secara permanen??')">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
										</tbody>
									</table>
                  {{$data_user->links()}}
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
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "/User/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Peran</label>
                <select name="role" class="form-control" id="role" required>
                    <option placeholder>Pilih...</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Dokter">Dokter</option>
                </select>
                @if($errors->has('role'))
                  <span class="help-block">{{$errors->first('role')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Pengguna</label>
                <input type="text" class="form-control" name="name"  placeholder="Masukkan Nama Pengguna" value="{{old('name')}}" required>
                @if($errors->has('name'))
                  <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" name="email"  placeholder="Masukkan Email" value="{{old('email')}}" required>
                @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" name="password"  placeholder="Masukkan Password" value="{{old('password')}}" required>
                @if($errors->has('password'))
                  <span class="help-block">{{$errors->first('password')}}</span>
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
