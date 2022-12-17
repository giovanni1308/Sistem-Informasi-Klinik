<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   
    public function login()
    {
        return view('Auths.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/Pasien');
        }
        return redirect('/login')->with('message','Email atau Password salah');
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
