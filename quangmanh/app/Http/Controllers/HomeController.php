<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Classrooms;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $item= User::select('id','mail_address','name','address','phone','classroom_id')->orderBy('mail_address','asc')->search()->ClassSearch()->paginate(20);
        $select = Classrooms::all();
        return view('list',['title'=>'Danh sách user','select'=>$select],compact('item'));

    }
    public function logout(){

        Auth::logout();

        return view('auth.login');
    }

}
