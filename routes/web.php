<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// demo models' link
Route::get('link/{id}', 'myController@demolink');
// demo created pages
Route::get('page', 'myController@demopage');

// =========================================================
// routes for admin
Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/dangxuat','UserController@getDangxuatAdmin');

Route::group(['prefix'=>'admin', 'middleware'=>'AdminLogin'], function(){
	Route::group(['prefix'=>'theloai'], function(){
		// admin/theloai/danhsach
		Route::get('danhsach', 'TheloaiController@getDanhsach');

		Route::get('them', 'TheloaiController@getThem');
		Route::post('them', 'TheloaiController@postThem');

		Route::get('sua/{id}', 'TheloaiController@getSua');
		Route::post('sua/{id}', 'TheloaiController@postSua');

		Route::post('xoa', 'TheloaiController@postXoa');		
	});

	Route::group(['prefix'=>'loaitin'], function(){
		// admin/loaitin/danhsach
		Route::get('danhsach', 'LoaitinController@getDanhsach');

		Route::get('them', 'LoaitinController@getThem');
		Route::post('them', 'LoaitinController@postThem');

		Route::get('sua/{id}', 'LoaitinController@getSua');
		Route::post('sua/{id}', 'LoaitinController@postSua');

		Route::post('xoa', 'LoaitinController@postXoa');		
	});	

	Route::group(['prefix'=>'tintuc'], function(){
		// admin/tintuc/danhsach
		Route::get('danhsach', 'TintucController@getDanhsach');

		Route::get('them', 'TintucController@getThem');
		Route::post('them', 'TintucController@postThem');

		Route::get('sua/{id}', 'TintucController@getSua');
		Route::post('sua/{id}', 'TintucController@postSua');

		Route::post('xoa', 'TintucController@postXoa');
	});

	Route::group(['prefix'=>'slide'], function(){
		// admin/slide/danhsach
		Route::get('danhsach', 'SlideController@getDanhsach');

		Route::get('them', 'SlideController@getThem');
		Route::post('them', 'SlideController@postThem');

		Route::get('sua/{id}', 'SlideController@getSua');
		Route::post('sua/{id}', 'SlideController@postSua');

		Route::post('xoa', 'SlideController@postXoa');
	});

	Route::group(['prefix'=>'user'], function(){
		// admin/user/danhsach
		Route::get('danhsach', 'UserController@getDanhsach');

		Route::get('them', 'UserController@getThem');
		Route::post('them', 'UserController@postThem');

		Route::get('sua/{id}', 'UserController@getSua');
		Route::post('sua/{id}', 'UserController@postSua');

		Route::post('xoa', 'UserController@postXoa');
	});	

	Route::group(['prefix'=>'ajax'], function(){
		// admin/ajax/...
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');

		Route::get('xoatintuc/{delID}', 'AjaxController@getXoaTinTuc');

		Route::get('comment/{delID}', 'AjaxController@getXoaComment');

		Route::get('xoaslide/{delID}', 'AjaxController@getXoaSlide');
		
		Route::get('xoauser/{delID}', 'AjaxController@getXoaUser');
	});

});


// ==================================================================
// user pages
Route::get('trangchu', 'PagesController@getTrangchu');
Route::get('lienhe', 'PagesController@getLienhe');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@getTintuc');

Route::get('login', 'PagesController@getLogin');
Route::post('login', 'PagesController@postLogin');

Route::get('logout', 'PagesController@getLogout');

Route::post('tintuc/comment/{idTinTuc}', 'PagesController@postComment');

Route::get('nguoidung','PagesController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoidung');

Route::get('register','PagesController@getDangky');
Route::post('register','PagesController@postDangky');

Route::get('search','PagesController@postSearch');

Route::get('loaitin/{unsigned_name}','PagesController@getLoaitin');