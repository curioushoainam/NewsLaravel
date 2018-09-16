<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    //
    public function getDanhsach(){
    	return view('admin.user.danhsach');
    }

    public function excThem(){
    	return view('admin.user.them');
    }

    public function excSua(){
    	return view('admin.user.sua');
    }

}
