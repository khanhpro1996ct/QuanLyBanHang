<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billDetailModel extends Model
{
    protected $table = 'bill_detail';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id', 'id_bill', 'id_product', 'quantity', 'unit_price'
    ];
}
