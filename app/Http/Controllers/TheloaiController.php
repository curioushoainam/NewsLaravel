<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TheLoai;

class TheloaiController extends Controller
{
    //
    public function getDanhsach(){
    	$theloai = TheLoai::all();    	
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(Request $req){
    	$this->validate($req,					// [] : error; [] : error message
    		[
    			'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
    		],
    		[
    			'Ten.required' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'Ten.unique'=>'Tên thể loại đã được dùng'
    		]
    	);		// a variable 'errors' is sent along with to the page respectively

    	$theloai = new TheLoai();
    	$theloai->Ten = $req->Ten;
    	$theloai->TenKhongDau = changeTitle($req->Ten);
    	$theloai->save();

    	return redirect('admin/theloai/them')->with('msg','Thêm thành công');	// a session('msg') is sent along with to the page respectively
    }

    public function getSua($id){
    	$theloai = TheLoai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postSua( Request $req, $id){
    	$this->validate($req,                  // [] : error; [] : error message
            [
                'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
            ],
            [
                'Ten.required' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.unique'=>'Tên thể loại đã được dùng'
            ]
        );      // a variable 'errors' is sent along with to the page respectively

        $theloai = TheLoai::find($id);
        $theloai->Ten = $req->Ten;
        $theloai->TenKhongDau = changeTitle($req->Ten);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('msg','Cập nhật #id '.$id.' thành công');    	
    }

    public function postXoa(Request $req){
        // echo $req->delID;
        $theloai = TheLoai::find($req->delID);
        $theloai->delete();

        return redirect('admin/theloai/danhsach')->with('msg','Xóa #id '.$req->delID.' thành công');
    }
}

