<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // hnhd code
    public function viewArr($arr){
		// this function displays $arr's content on the browser
		echo '<pre>';
    	print_r ($arr);
    	echo '</pre>';
	}

	// user for Laravel 5.3 and earlier.
	// function __construct(){
	// 	$this->Dangnhap();
	// }

	// function Dangnhap(){
	// 	if(Auth::check()){
	// 		view()->share('user_login',Auth::user());
	// 	}
	// }
}
