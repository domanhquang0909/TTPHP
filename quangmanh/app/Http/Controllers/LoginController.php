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
    protected $maxAttempts=5; 
    protected $decayMinutes = 60; 


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

