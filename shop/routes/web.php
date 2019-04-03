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

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type?}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);
Route::get('san-pham',[
	'as'=>'sanpham',
	'uses'=>'PageController@getSanPham'
]);
//theem route sanpham do du lieu ra trang loaisanpham

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('tin-tuc',[
	'as'=>'tintuc',
	'uses'=>'PageController@getTinTuc'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signup',
	'uses'=>'PageController@getSignup'
]);

Route::post('dang-ki',[
	'as'=>'signup',
	'uses'=>'PageController@postSignup'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

//admin
Route::get('
	admin',[
	'as'=>'admin',
	'uses'=>'PageController@getIndexadmin'
]);

Route::group(['prefix'=>'admin'],function(){
	//admin/productType
	Route::group(['prefix'=>'productType'],function(){
		Route::get('index','ProductTypeController@index');

		Route::get('edit/{id}','ProductTypeController@edit');
		Route::post('edit/{id}','ProductTypeController@update');

		Route::get('add','ProductTypeController@create');
		Route::post('add','ProductTypeController@store');

		Route::get('delete/{id}','ProductTypeController@destroy');
	});
	//admin/product
	Route::group(['prefix'=>'product'],function(){
		Route::get('index','ProductController@index');

		Route::get('edit/{id}','ProductController@edit');
		Route::post('edit/{id}','ProductController@update');

		Route::get('add','ProductController@create');
		Route::post('add','ProductController@store');

		Route::get('delete/{id}','ProductController@destroy');
	});
	// //admin/user
	// Route::group(['prefix'=>'user'],function(){
	// 	Route::get('list','ProductController@getList');

	// 	Route::get('edit','ProductController@getList');

	// 	Route::get('add','ProductController@getList');
	// });
	// //admin/new
	// Route::group(['prefix'=>'new'],function(){
	// 	Route::get('list','ProductController@getList');

	// 	Route::get('edit','ProductController@getList');

	// 	Route::get('add','ProductController@getList');
	// });
	// //admin/slide
	Route::group(['prefix'=>'slide'],function(){
		Route::get('index','SlideController@index');

		Route::get('edit/{id}','SlideController@edit');
		Route::post('edit/{id}','SlideController@update');

		Route::get('add','SlideController@create');
		Route::post('add','SlideController@store');

		Route::get('delete/{id}','SlideController@destroy');
	});
	//
	Route::group(['prefix'=>'news'],function(){
		Route::get('index','NewsController@index');

		Route::get('edit/{id}','NewsController@edit');
		Route::post('edit/{id}','NewsController@update');

		Route::get('add','NewsController@create');
		Route::post('add','NewsController@store');

		Route::get('delete/{id}','NewsController@destroy');
	});
});
