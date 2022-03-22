<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\Requests\CreateUserRequest;


class RegisterController extends Controller
{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    public function register()
    {
        return view('register');
    }

    public function post_register(CreateUserRequest $req){
        $this->user->checkRegister($req);
        return redirect('list');
    }
    public function list(){

    $item= User::select('id','mail_address','name','address','phone')->orderBy('mail_address','asc')->paginate(20);

     return view('list',compact('item'));
    }
}
