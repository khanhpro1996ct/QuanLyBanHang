<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeModel extends Model
{
    protected $table = 'type_products';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id', 'name', 'description'
    ];
}
