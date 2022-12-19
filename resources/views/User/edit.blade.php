
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
					<h1 class="panel-title text-center" style="font-size:25px"><b>UBAH DATA PENGGUNA</b></h1>
				</div>
					<div class="panel-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success" role="alert">
                         {{Session('sukses') }}
                        </div>
                    @endif
                    <form action = "/User/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
                       @csrf
            <div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Peran</label>
                <select name="role" class="form-control" id="role" required>
                    <option placeholder>Pilih...</option>
                    <option value="Administrator" {{($user->role === 'Administrator') ? 'selected' : '' }}>Administrator</option>
                    <option value="Dokter" {{($user->role === 'Dokter') ? 'selected' : '' }}>Dokter</option>
                </select>
                @if($errors->has('role'))
                  <span class="help-block">{{$errors->first('role')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Nama Pengguna</label>
                <input type="text" class="form-control" name="name"  placeholder="Masukkan Nama Pengguna" value="{{old('name', $user->name)}}" required>
                @if($errors->has('name'))
                  <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" name="email"  placeholder="Masukkan Email" value="{{old('email', $user->email)}}" required>
                @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" name="password"  placeholder="Kosongkan Jika Tidak Ingin Mengubah Password">
                <p class="form-text">Kosongkan jika tidak ingin mengubah password.</p>
                @if($errors->has('password'))
                  <span class="help-block">{{$errors->first('password')}}</span>
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

