<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id',
        'name',
        'id_type',
        'description',
        'description_detail',
        'image',
        'giagoc',
        'unit_price',
        'promotion_price',
        'unit',
        'status1',
        'soluong'
    ];
}
