<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stu;
use App\Test;
use App\Http\Requests;
use Captcha;
use Snoopy;

use App\User;
use App\Phone;

use Gregwar\Captcha\CaptchaBuilder;
use Session;
use PHPExcel;
use M3Result;
use Express;
use Illuminate\Support\Facades\Input;   //input必备
// use Request;    //Non-static method Illuminate\Http\Request::all() 换这个

class StuController extends Controller
{
 

/*
*@brief 搜索 分页 
*/



private $current_page;  //私有属性 当前页 
private $page_size = 5; //私有属性 每页条数

public function __construct(Request $request) {
  $this->current_page = $request->input('current_page', 1);
}


public function orm(Request $request)
{
   $search_text = $request->input('search_text','');
   $pay_type = intval($request->input('pay_type',6));
   if($search_text == '')
   {
    $count = User::join('phone','phone.user_id','=','user.user_id','left')->count();
    $page_count = ceil($count/$this->page_size);
    // dd($page_count);
    $data = User::join('phone','phone.user_id','=','user.user_id','left')->get();
   }else{
    // 关联
    $count = User::join('phone','phone.user_id','=','user.user_id','left')->with('phone')->where('username','like','%'.$search_text.'%')->count();
    $page_count = ceil($count/$this->page_size);
    $data = User::join('phone','phone.user_id','=','user.user_id','left')->with('phone')->where('username','like','%'.$search_text.'%')->get();
   }

   if($pay_type !== 6 )
   {
    $data = collect($data) -> where('pay_type',$pay_type);
   }

    $count = $data->count(); //多少数据
    $page_count = ceil($count/$this->page_size);  //多少页


    //collect和slice切片选择页数内容
    $data = collect($data)->slice(($this->current_page -1)*$this->page_size,$this->page_size);

   return view('phone',compact('data','search_text','pay_type'))
    ->with('current_page', $this->current_page)
    ->with('page_count', $page_count);
}


}
