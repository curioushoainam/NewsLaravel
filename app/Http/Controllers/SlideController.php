<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhsach(){
        $slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem(){
    	return view('admin.slide.them');
    }

    public function postThem(Request $req){
    	$this->validate($req, [
                'Ten'=>'required|min:3|max:255|unique:Slide,Ten',
                'link'=>'required'
            ],[
                'Ten.required'=>'Bạn chưa nhập tên',
                'Ten.min'=>'Tên phải có độ dài từ 3 đến 255 ký tự',
                'Ten.max'=>'Tên phải có độ dài từ 3 đến 255 ký tự',
                'Ten.unique'=>'Tên đã được sử dụng',
                'link.required'=>'Bạn chưa nhập link'
            ]
        );

        $slide = new Slide();

        if($req->hasFile('Hinh')){
            $file = $req->file('Hinh');
            $ext = $file->getClientOriginalExtension();
            if(!in_array($ext, ['jpg','png','jpeg']))
                return redirect('admin/slide/them')->with('error','Kiểu file hình không hợp lệ');
             $Hinh = time(). '_' .$file->getClientOriginalName();
             $file->move('public/upload/slide', $Hinh);
             $slide->Hinh = $Hinh;
        } else {
            return redirect('admin/slide/them')->with('error','Bạn chưa up hình');
        }

        $slide->Ten = $req->Ten;
        $slide->link = $req->link;
        $slide->save();
        return redirect('admin/slide/them')->with('msg','Đã thêm slide thành công');
    }

    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin/slide/sua',['slide'=>$slide]);
    }

    public function postSua(Request $req, $id){
       $this->validate($req, [
                'Ten'=>'required|min:3|max:255',
                'link'=>'required'
            ],[                
                'Ten.min'=>'Tên phải có độ dài từ 3 đến 255 ký tự',
                'Ten.max'=>'Tên phải có độ dài từ 3 đến 255 ký tự',
                'Ten.unique'=>'Tên đã được sử dụng',
                'link.required'=>'Bạn chưa nhập link'
            ]
        );

        $slide =Slide::find($id);

        if($req->hasFile('Hinh')){
            $file = $req->file('Hinh');
            $ext = $file->getClientOriginalExtension();
            if(!in_array($ext, ['jpg','png','jpeg']))
                return redirect('admin/slide/sua/'.$id)->with('error','Kiểu file hình không hợp lệ');
             $Hinh = time(). '_' .$file->getClientOriginalName();
             $file->move('public/upload/slide', $Hinh);
             $slide->Hinh = $Hinh;
        } 

        $slide->Ten = $req->Ten;
        $slide->link = $req->link;
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('msg','Cập nhật #id '.$id.' thành công');
    }

    public function postXoa($delID){

    }
}
