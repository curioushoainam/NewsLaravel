<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TheLoai;
use \App\Slide;
use \App\TinTuc;
use \App\LoaiTin;
use \App\Comment;

use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    
	function __construct(){
		$theloai = TheLoai::all();
		$slide = Slide::all();		
		view()->share('theloai',$theloai);
		view()->share('slide',$slide);

		// This method uses for Laravel 5.2 and earlier
		// if(Auth::check()){		
		// 	view()->share('user', Auth::user(););			
		// }
	}

    function getTrangchu(){    	    	
    	return view('pages.trangchu');
    }

    function getLienhe(){    	
    	return view('pages.lienhe');
    }

    function getTintuc($id){
    	$tintuc = TinTuc::find($id);
    	$tinnoibat = TinTuc::where('NoiBat',1)->orderByDesc('id')->take(4)->get();
    	$tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->orderByDesc('id')->take(4)->get();
    	return view('pages.tintuc',['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }

    function getLogin(){
    	return view('pages.login');
    }

    function postLogin(Request $req){
    	$this->validate($req, [
                'email'=>'required',
                'password'=>'required|min:6|max:25'
            ],[
                'email.required'=>'Bạn chưa nhập email',
                'password.required|min:6|max:25'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu có tối thiểu là 6 ký tự',
                'password.max'=>'Mật khẩu có tối đa là 25 ký tự'
            ]
        );

        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password])){
        	return redirect('trangchu'); 
        }
        else
        	return redirect('login')->with('error','Thông tin đăng nhập không đúng');
    }	

    function getLogout(){
    	Auth::logout();
    	return redirect('trangchu');
    }

    function postComment(Request $req, $idTinTuc){
    	$this->validate($req,[
    			'NoiDung'=>'required|min:3'
    		],[
    			'NoiDung.required'=>'Bạn chưa nhập nội dung bình luận',
    			'NoiDung.min'=>'Nội dung phải có tối thiểu 3 ký tự'
    		]
    	);

    	$comment = new Comment();
    	$comment->idUser = Auth::user()->id;
    	$comment->idTinTuc = $idTinTuc;
    	$comment->NoiDung = $req->NoiDung;
    	$comment->save();
    	$tintuc = TinTuc::find($idTinTuc);
    	return redirect('tintuc/'.$idTinTuc.'/'.$tintuc->TieuDeKhongDau.'.html')->with('msg','Bạn đã gửi bình luận thành công');
    }
}
