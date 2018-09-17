<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TinTuc;
use \App\TheLoai;
use \App\LoaiTin;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idTheLoai){ 
        $loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();
        // viewArr($loaitin->toArray());
        foreach ($loaitin as $lt)
            echo "<option value='". $lt->id ."'>". $lt->Ten ."</option>";        
    }

     public function getXoaTinTuc($delID){ 
     	if(isset($delID) && $delID) {
     		$tintuc = TinTuc::find($delID); 
	        // $file = 'public/upload/tintuc/'.$tintuc->Hinh;
	        // if (file_exists($file)) {
	        //     unlink($file);
	        // } 
	        // $tintuc->delete();        
	        echo json_encode(array('result'=>'done'));
     	} else {
     		echo json_encode(array('result'=>'failed'));
     	}
                
    }

    
}
