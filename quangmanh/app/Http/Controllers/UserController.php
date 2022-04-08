<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;


class UserController extends Controller
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;

    }

    function addUsers(){

     return view('admin.addUsers',['title'=>'Thêm người dùng'],);
    }

    function post_addUsers(CreateUserRequest $req){
        $this->user->checkRegister($req);
        return redirect('list');
    }

}
