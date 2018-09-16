<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TheLoai;
use \App\LoaiTin;
use \App\TinTuc;
use \App\Comment;
use \App\User;

class myController extends Controller
{
    //
    public function demolink($id){
    	// the function demo models' link
		$theloai = TheLoai::find($id);
		$this->viewArr($theloai->loaitin->toArray());

		// $loaitin = LoaiTin::find($id);
		// $this->viewArr($loaitin->theloai->toArray());
		// $this->viewArr($loaitin->tintuc->toArray());

		// $tintuc = TinTuc::find($id);
		// $this->viewArr($tintuc->comment->toArray());
		// $this->viewArr($tintuc->loaitin->toArray());

		// $comment = Comment::find($id);
		// $this->viewArr($comment->tintuc->toArray());
		// $this->viewArr($comment->user->toArray());

		// $user = User::find($id);
		// $this->viewArr($user->comment->toArray());
	}

	public function demopage(){
		return view('admin.theloai.sua');
	}

}
