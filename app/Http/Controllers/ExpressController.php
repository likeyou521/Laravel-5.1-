<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExpressController extends Controller
{
    //
    public function show()
    {
       return view('kuaidi');
    }

    public function api(Request $request)
    {
        // var_dump($_POST);
        $type = $request->type ;
		$postid = $request->postid;

		$url_info = "http://www.kuaidi100.com/query?type=$type&postid=$postid&id=1&valicode=&temp=0.19689508604579842";

		echo $url_info;
		
		// $url=file_get_contents($url_info);

		// echo $url;

    }
}
