<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;



class RegisterController extends Controller
{
    protected $user;
    public function register()
    {
        return view('register');
    }

    public function post_register(Request $req){

        $message=[
            'mail_address.required'=>'Bạn chưa nhập email',
            'mail_address.email'=>'Bạn chưa nhập đúng định dạng email',
            'mail_address.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu có tối đa 30 ký tự',
            'password_confirm.same'=>'Mật khẩu nhập lại không khớp',
        ];
        $this->validate($req,[

            'mail_address' => 'required|max:100',
            'password'=>'required|min:6|max:20',
            'password_confirm'=>'required|same:password',
            'name'=>'required|min:3|max:255',
            'address'=>'max:255',
            'phone'=>'max:15'
        ],$message);
             $user =new User;
            $user-> mail_address = $req ->mail_address;
            $user-> password = bcrypt($req->password);
            $user-> name = $req ->name;
            $user-> address = $req ->address;
            $user-> phone = $req ->phone;
            $user->save();

            return redirect('list')->with('message','Thêm mới user thành công');
    }
    public function list(){

    $item= User::select('id','mail_address','name','address','phone')->orderBy('id','asc')->paginate(20);

     return view('list',compact('item'));
    }
}
