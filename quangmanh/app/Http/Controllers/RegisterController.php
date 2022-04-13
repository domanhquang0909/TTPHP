<?php

namespace App\Http\Controllers;

use App\Events\RegisteredUser;
use App\Http\Requests\CreateUserRequest;


use App\Models\Classrooms;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    protected $user;


    public function __construct(User $user){
        $this->user = $user;

    }
    public function index(){
            dd(request()->key);
    }
    public function register()
    {
        $select = Classrooms::all();
        return view('register',['title'=> 'Thêm Users','select'=>$select]);
    }

    public function post_register(CreateUserRequest $req){
        $req['role'] = "1";
        $request['classroom_id'] = "2";
       $user= $this->user->checkRegister($req);

       //new SendMailJod($request)
    //    $data=[
    //        'name'=>$req->name,
    //    ];
    //    Mail::send('mail.success',$data, function($email) use($req){
    //     $email-> from('manhquang2201@gmail.com','ADMIN');
    //     $email-> to($req->input('mail_address'));
    //   });
    if($user=true){
        event(new RegisteredUser($req));
           $req->session()->flash('success','Đăng ký tài khoản thành công');
           return redirect('login');
    }
    }
        public function list(){
            $item= User::select('id','mail_address','name','address','phone','classroom_id')->orderBy('mail_address','asc')->search()->ClassSearch()->paginate(20);
            $select = Classrooms::all();
            return view('list',['title'=>'Danh sách user'],compact('item','select'));

        }






}
