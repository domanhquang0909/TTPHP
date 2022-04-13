<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     use ThrottlesLogins;
    protected $maxAttempts=1; // so lan user co the dang nhap sai
    protected $decayMinutes = 60; // Thoi gian nguoi dung chan tinh bang giay


    public function index(){
        return view('auth.login',['title'=>'Đăng nhập']);
    }

    public function post_login(Request $req){


           $this -> validate($req,[
                            'mail_address'=>'required|email:filter',
                            'password'=>'required',
           ]);
           if(Auth::attempt(['mail_address'=> $req->input('mail_address'),'password'=>$req->input('password')],$req->input('remember')))
        {
            return redirect()-> route('list');

        }else{
            $req->session()->flash('error','Email mật khẩu không chính xác');
        return redirect()->back();
   }
}
}

