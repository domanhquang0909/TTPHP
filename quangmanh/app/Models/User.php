<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
protected $fillable = [
        'mail_address',
        'password',
        'name',
        'address',
        'phone',
        'role',
        'classroom_id'
    ];
    public function classrooms()
    {
        return $this->belongsTo('App\Models\Classrooms','classroom_id','id');
    }
    public function checkRegister($req)
    {
      User::create([
      'mail_address'=> $req->input('mail_address'),
      'password'=> bcrypt( $req->input('password')),
      'name'=>$req->input('name'),
      'address'=> $req->input('address'),
      'phone'=> $req->input('phone'),
      'role'=> $req->input('role'),
      'classroom_id'=> $req->input('classroom_id')

      ]);
      $req->session()->flash('success','Thêm mới người dùng thành công');

    }
    public function scopeSearch($sea){
        if( $item = request()->key){
            $sea= $sea->where('name','like','%'.$item.'%')->orWhere('mail_address','like','%'.$item.'%')->orWhere('address','like','%'.$item.'%')->orWhere('phone',$item)->orWhere('classroom_id',$item);
               }
               return $sea;
    }
    public function scopeClassSearch($sea)
    {
       if( $search = request()->class)
       {
          $sea = $sea->orwhere('classroom_id',$search);
        }
        return $sea;
    }
}
