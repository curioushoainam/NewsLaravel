<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhsach(){
    	return view('admin.slide.danhsach');
    }

    public function excThem(){
    	return view('admin.slide.them');
    }

    public function excSua(){
    	return view('admin.slide.sua');
    }
}
