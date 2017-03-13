<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
     //
     protected $table = 'phone'; //设置表
     protected $primaryKey = 'phone_id';

    public function user()
    {
        return $this->belongsTo('App\User','phone_id');
    }
}
