<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    protected $primaryKey = 'id';
    protected $keyType = 'varchar';

    public function bill_detail()
    {
        return $this->hasMany('App/BillDetail', 'id_bill', 'id');
    }

    public function bill()
    {
        return $this->belongsTo('App/Customer', 'id_customer', 'id');
    }
}
