<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TinTuc;
use \App\TheLoai;
use \App\LoaiTin;
use Storage;

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
        // viewArr($req->toArray());
        $this->validate($req,[
                'LoaiTin'=>'required',
                'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
                'TomTat'=>'required|unique:TinTuc,TomTat',
                'NoiDung'=>'required|unique:TinTuc,NoiDung',
                'NoiBat'=>'required'
            ],[
                'LoaiTin.required'=>'Bạn chưa chọn loại tin',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'TieuDe.min'=>'Nội dung phải có từ 3 ký tự trở lên',
                'TieuDe.unique'=>'Tiêu đề đã được sử dụng',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'TomTat.unique'=>'Tóm tắt đã được sử dụng',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                'NoiDung.unquire'=>'Nội dung đã được sử dụng',
                'NoiBat.required'=>'Bạn chưa chọn trạng thái nổi bật'
            ]
        );

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $req->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($req->TieuDe);
        $tintuc->TomTat = $req->TomTat;
        $tintuc->NoiDung = $req->NoiDung;
        $tintuc->NoiBat = $req->NoiBat;
        $tintuc->SoLuotXem = 0;
        $tintuc->idLoaiTin = $req->LoaiTin;

        if($req->hasFile('Hinh')){
            $file = $req->file('Hinh');
            $ext = $file->getClientOriginalExtension();
            if(!in_array($ext, ['jpg','png','jpeg'])){
                return redirect('admin/tintuc/them')->with('error','Kiểu file hình không hợp lệ');
            }        
            $Hinh = time()."_". $file->getClientOriginalName();
            $file->move('public/upload/tintuc', $Hinh);
            $tintuc->Hinh = $Hinh;

        } else {
            $tintuc->Hinh = "";
        }

        $tintuc->save();
        return redirect('admin/tintuc/them')->with('msg','Đã thêm tin tức thành công');
    }

    public function getSua($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }

    public function postSua( Request $req, $id){
        // viewArr($req->toArray());
        $this->validate($req,[
                'LoaiTin'=>'required',
                'TieuDe'=>'required|min:3',
                'TomTat'=>'required',
                'NoiDung'=>'required',
                'NoiBat'=>'required'
            ],[
                'LoaiTin.required'=>'Bạn chưa chọn loại tin',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'TieuDe.min'=>'Nội dung phải có từ 3 ký tự trở lên',
                'TieuDe.unique'=>'Tiêu đề đã được sử dụng',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'TomTat.unique'=>'Tóm tắt đã được sử dụng',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                'NoiDung.unquire'=>'Nội dung đã được sử dụng',
                'NoiBat.required'=>'Bạn chưa chọn trạng thái nổi bật'
            ]
        );

        $tintuc = TinTuc::find($id);
        $tintuc->TieuDe = $req->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($req->TieuDe);
        $tintuc->TomTat = $req->TomTat;
        $tintuc->NoiDung = $req->NoiDung;
        $tintuc->NoiBat = $req->NoiBat;
        $tintuc->SoLuotXem = 0;
        $tintuc->idLoaiTin = $req->LoaiTin;

        if($req->hasFile('Hinh')){
            $file = $req->file('Hinh');
            $ext = $file->getClientOriginalExtension();
            if(!in_array($ext, ['jpg','png','jpeg'])){
                return redirect('admin/tintuc/sua/'.$id)->with('error','Kiểu file hình không hợp lệ');
            }        
            $Hinh = time()."_". $file->getClientOriginalName();
           
            // $_file = 'public/upload/tintuc/'.$tintuc->Hinh;
            // if (file_exists($_file)) {
            //     unlink($_file);
            // }
            
            $file->move('public/upload/tintuc', $Hinh);
            $tintuc->Hinh = $Hinh;           
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('msg','Cập nhật #id '.$id.' thành công');
    }

    public function postXoa(Request $req){
        $tintuc = TinTuc::find($req->delID); 
        // $file = 'public/upload/tintuc/'.$tintuc->Hinh;
        // if (file_exists($file)) {
        //     unlink($file);
        // } 
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('msg','Xoa #id '.$req->delID.' thành công');       
    }

}
