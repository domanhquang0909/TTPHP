<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Models\Classrooms;


class UserController extends Controller
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;

    }

    function addUsers(){
        $select = Classrooms::all();
     return view('admin.addUsers',['title'=>'Thêm người dùng','select'=>$select]);
    }

    function post_addUsers(CreateUserRequest $req){
        $this->user->checkRegister($req);
        return redirect('list');
    }


}
