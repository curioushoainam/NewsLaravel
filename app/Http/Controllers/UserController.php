<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    //
    public function getDanhsach(){
        $user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem(){
    	return view('admin.user.them');
    }

    public function postThem(Request $req){
    	$this->validate($req, [
                'name'=>'required|min:3|max:255',
                'email'=>'required|unique:users,email',
                'password'=>'required|min:6|max:25',
                'repassword'=>'required|same:password',
                'level'=>'required|max:1'
            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>'Tên phải có từ 3 đến 255 ký tự',
                'name.max'=>'Tên phải có từ 3 đến 255 ký tự',

                'email.required'=>'Bạn chưa nhập email',
                'email.unique'=>'email đã được sử dụng',

                'password.required'=>'Bạn chưa nhập passowrd',
                'password.min'=>'Password phải có từ 6 đến 25 ký tự',
                'password.max'=>'Password phải có từ 6 đến 25 ký tự',

                'repassword.required'=>'Bạn chưa nhập lại passowrd',
                'repassword.same'=>'Bạn nhập lại password không khớp'
            ]
        );
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->level = $req->level;
        $user->save();

        return redirect('admin/user/them')->with('msg','Thêm user thành công');
    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $req, $id){
        $this->validate($req, [
                'name'=>'required|min:3|max:255',                
            ],[
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>'Tên phải có từ 3 đến 255 ký tự',
                'name.max'=>'Tên phải có từ 3 đến 255 ký tự'
            ]
        );
        $user = User::find($id);
        $user->name = $req->name;
        $user->level = $req->level;

        if($req->changePassword == 'on'){
            $this->validate($req, [                    
                    'password'=>'required|min:6|max:25',
                    'repassword'=>'required|same:password'                    
                ],[                    
                    'password.required'=>'Bạn chưa nhập passowrd',
                    'password.min'=>'Password phải có từ 6 đến 25 ký tự',
                    'password.max'=>'Password phải có từ 6 đến 25 ký tự',

                    'repassword.required'=>'Bạn chưa nhập lại passowrd',
                    'repassword.same'=>'Bạn nhập lại password không khớp'
                ]
            );            
            $user->password = bcrypt($req->password);
        }

        $user->save();

        return redirect('admin/user/sua/'.$id)->with('msg','Cập nhật user '.$id.' thành công');
    }

}
