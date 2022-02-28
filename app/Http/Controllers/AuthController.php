<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function showForm()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $user = $request->only('name','email','phone','password');
        $user["password"] = Hash::make($user["password"]);
        DB::table("users")->insert($user);
        return redirect()->route('login');
    }

    public function showFormLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        //laravel ho tro dang nhap
        //Minh duoc phep biet password cua nguoi dung => Mã hoá 1 chiều (MD5)
        $user = $request->only('email', 'password');
        //dung attemp de check user co hay k
        if(Auth::attempt($user)){
//            dd("Dang nhap thanh cong");
            return redirect()->route('book.index');
        }else{
            Session::flash('msg','Tai khoan khong dung');
//            dd("Dang nhap that bai");
            return redirect()->back();
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
