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
Route::group(['prefix'=>'admin'], function(){
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
		Route::get('them', 'TintucController@excThem');
		Route::get('sua', 'TintucController@excSua');
	});

	Route::group(['prefix'=>'slide'], function(){
		// admin/slide/danhsach
		Route::get('danhsach', 'SlideController@getDanhsach');
		Route::get('them', 'SlideController@excThem');
		Route::get('sua', 'SlideController@excSua');
	});

	Route::group(['prefix'=>'user'], function(){
		// admin/user/danhsach
		Route::get('danhsach', 'UserController@getDanhsach');
		Route::get('them', 'UserController@excThem');
		Route::get('sua', 'UserController@excSua');
	});

});
