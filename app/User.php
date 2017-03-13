<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
     protected $table = 'user'; //设置表
     protected $primaryKey = 'user_id';
     public $timestamps = false;


    public function phone()
    {
        return $this->hasOne('App\Phone', 'user_id');
    }

    public function userRead()  //查
    {
    	return $this-> get();
    }
 

}
