<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'password',
        'phone',
        'address',
    ];
}
