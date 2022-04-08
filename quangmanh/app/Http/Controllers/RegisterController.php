<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Jobs\SendMailjob;
use App\Jobs\UserMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    protected $user;
    protected $mail;
    public function __construct(User $user){
        $this->user = $user;
    }
    public function index(){
            dd(request()->key);
    }
    public function register()
    {
        return view('register',['title'=> 'Thêm Users']);
    }

    public function post_register(CreateUserRequest $req){
        $req['role'] = "1";

        $this->user->checkRegister($req);

       //new SendMailJod($request)
       $data=[
           'name'=>$req->name,
       ];
       Mail::send('mail.success',$data, function($email) use($req){
        $email-> from('manhquang2201@gmail.com','ADMIN');
        $email-> to($req->input('mail_address'));
      });
           $req->session()->flash('success','Đăng ký tài khoản thành công');
           return redirect('login');





        }
     public function list(){
            $item= User::select('id','mail_address','name','address','phone')->orderBy('mail_address','asc')->search()->paginate(20);
             return view('list',['title'=>'Danh sách user'],compact('item'));

        }





}
