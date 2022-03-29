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
    function index(){
            dd(request()->key);

    }
    public function register()
    {
        return view('register',['title'=>'Thêm User']);
    }

    public function post_register(CreateUserRequest $req){
        $this->user->checkRegister($req);
        return redirect('list');
    }
    public function list(){

    $item= User::select('id','mail_address','name','address','phone')->orderBy('mail_address','asc')->search()->paginate(20);

     return view('list',['title'=>'Danh sách user'],compact('item'));
    }


}
