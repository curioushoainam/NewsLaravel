<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TheLoai;

class PagesController extends Controller
{
    
	function __construct(){
		$theloai = TheLoai::all();
		view()->share('theloai',$theloai);
	}

    public function getTrangchu(){    	    	
    	return view('pages.trangchu');
    }

    public function getLienhe(){    	
    	return view('pages.lienhe');
    }
}
