<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillsModel extends Model
{
    protected $table = 'bills';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id', 'id_customer', 'date_order', 'total', 'payment', 'note', 'status'
    ];
}
