<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\LoaiTin;
use \App\TheLoai;

class LoaitinController extends Controller
{
    //
    public function getDanhsach(){
        $loaitin = LoaiTin::all();      
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem(){
        $theloai = TheLoai::all(); 
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $req){
        $this->validate($req,                   // [] : error; [] : error message
            [
                'Ten'=>'required|min:3|max:100|unique:Loaitin,Ten'
            ],
            [
                'Ten.required' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.unique'=>'Tên đã được dùng'
            ]
        );      // a variable 'errors' is sent along with to the page respectively

        $loaitin = new Loaitin();
        $loaitin->Ten = $req->Ten;
        $loaitin->TenKhongDau = changeTitle($req->Ten);
        $loaitin->idTheLoai = $req->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('msg','Thêm thành công');   // a session('msg') is sent along with to the page respectively
    }

    public function getSua($id){
        $loaitin = Loaitin::find($id); 
        $theloai = TheLoai::all();    
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua( Request $req, $id){
        $this->validate($req,                  // [] : error; [] : error message
            [
                'Ten'=>'required|min:3|max:100|unique:Loaitin,Ten'
            ],
            [
                'Ten.required' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
                'Ten.unique'=>'Tên đã được dùng'
            ]
        );      // a variable 'errors' is sent along with to the page respectively

        $loaitin = Loaitin::find($id);
        $loaitin->Ten = $req->Ten;
        $loaitin->TenKhongDau = changeTitle($req->Ten);
        $loaitin->idTheLoai = $req->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$id)->with('msg','Cập nhật #id '.$id.' thành công');       
    }

    public function postXoa(Request $req){
        // echo $req->delID;
        $loaitin = Loaitin::find($req->delID);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('msg','Xóa #id '.$req->delID.' thành công');
    }
}

