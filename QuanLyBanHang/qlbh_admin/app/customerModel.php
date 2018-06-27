<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    protected $table = 'customer';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id', 'name', 'gender', 'email', 'address', 'phone_number', 'note',
    ];
}
