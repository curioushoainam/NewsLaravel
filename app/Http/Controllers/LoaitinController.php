<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\LoaiTin;

class LoaitinController extends Controller
{
    //
    public function getDanhsach(){
    	return view('admin.loaitin.danhsach');
    }

    public function excThem(){
    	return view('admin.loaitin.them');
    }

    public function excSua(){
    	return view('admin.loaitin.sua');
    }
}

