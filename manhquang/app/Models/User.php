<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
protected $table = [
        'mail_address',
        'password',
        'name',
        'address',
        'phone'
    ];
}
