<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Route;

class UserController extends Controller
{
    public function index(Request $request)
    {
        
            $data_user = User::paginate(10);
        
        return view('User.index',['data_user' => $data_user]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'role'=>'required',
            'name'=>'required|min:5',
            'email'=>'required|unique:user,email',
            'password'=>'required'
        ]);
        

        //insert->pasien_table
        $user = new user();
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/User')->with('sukses','Data Berhasil diinput');
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $user = user::find($id);
        return view('User.edit',['user' => $user]);   
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'role'=>'required',
            'name'=>'required|min:5',
            'email'=>'required'
        ]);

        $user = user::find($id);
        $user -> update($request->all());
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect('/User')->with('sukses','Data berhasil diubah');
      
    }

    public function delete($id){
        $user = user::find($id);
        $user -> delete($user);

        return redirect('/User')->with('sukses','Data Berhasil Dihapus');
    
    }
}
