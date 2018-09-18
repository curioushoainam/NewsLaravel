<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TheLoai;
use \App\Slide;

class PagesController extends Controller
{
    
	function __construct(){
		$theloai = TheLoai::all();
		$slide = Slide::all();		
		view()->share('theloai',$theloai);
		view()->share('slide',$slide);
	}

    public function getTrangchu(){    	    	
    	return view('pages.trangchu');
    }

    public function getLienhe(){    	
    	return view('pages.lienhe');
    }
}
