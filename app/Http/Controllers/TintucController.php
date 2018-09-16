<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TinTuc;

class TintucController extends Controller
{
    //
    public function getDanhsach(){
    	return view('admin.tintuc.danhsach');
    }

    public function excThem(){
    	return view('admin.tintuc.them');
    }

    public function excSua(){
    	return view('admin.tintuc.sua');
    }

}
