<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TinTuc;
use \App\TheLoai;
use \App\LoaiTin;

class TintucController extends Controller
{
    //
    public function getDanhsach(){ 
        $tintuc = TinTuc::orderBy('id','DESC')->get();
        
        return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

    public function getThem(){       
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::where('idTheLoai',1)->get();
        
        return view('admin.tintuc.them',['loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }

    public function postThem(Request $req){

    }

    public function getSua($id){
        
    }

    public function postSua( Request $req, $id){

    }

    public function postXoa(Request $req){
        viewArr($req->toArray());
    }

}
