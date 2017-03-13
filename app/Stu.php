<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stu extends Model
{
    //
     protected $table = 'stu'; //设置表
     protected $primaryKey = 'id';

     protected $fillable = ['time_id']; //关联表的id

     public function time()
     {
     	return $this->hasOne('App\Test','time_id','time_id');  //关联表
     }


     public function stuRead()
     {
     	return $this->get();
     }
}


