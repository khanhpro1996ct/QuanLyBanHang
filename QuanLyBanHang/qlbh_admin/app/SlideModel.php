<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlideModel extends Model
{
    protected $table = 'slide';
    protected $primarykey = 'id';
    protected $keyType = 'varchar';
    protected $fillable = [
        'id', 'link', 'image'
    ];
}
