<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class storeModel extends Model
{
    protected $table = 'store';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id', 'name', 'address', 'phone', 'email'
    ];
}
