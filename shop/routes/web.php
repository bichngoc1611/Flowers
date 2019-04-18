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

Route::get('lienhe','PageController@getLienHe');

// Route::get('lienhe','ContactController@index');
Route::post('lienhe','ContactController@store');

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

// Route::post('dat-hang',[
// 	'as'=>'dathang',
// 	'uses'=>'PageController@postCheckout'
// ]);

Route::post('dathang','PageController@postCheckout');

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

//admin


Route::get('dangki','UserController@getsignup');
Route::post('dangki','UserController@postsignup');

Route::get('dangnhap','UserController@getlogin');
Route::post('dangnhap','UserController@postlogin');
Route::get('dangxuat','UserController@logout');	


Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'],function(){
	Route::get('home','PageController@getIndexadmin');
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
	Route::group(['prefix'=>'user'],function(){
		Route::get('index','UserController@index');

		Route::get('edit/{id}','UserController@edit');
		Route::put('edit/{id}','UserController@update');
		
		Route::get('add','UserController@create');
		Route::post('add','UserController@store');

		Route::get('delete/{id}','UserController@destroy');
	});
	
	// //admin/slide
	Route::group(['prefix'=>'slide'],function(){
		Route::get('index','SlideController@index');

		Route::get('edit/{id}','SlideController@edit');
		Route::put('edit/{id}','SlideController@update');

		Route::get('add','SlideController@create');
		Route::post('add','SlideController@store');

		Route::get('delete/{id}','SlideController@destroy');
	});
	//admin/news
	Route::group(['prefix'=>'news'],function(){
		Route::get('index','NewsController@index');

		Route::get('edit/{id}','NewsController@edit');
		Route::put('edit/{id}','NewsController@update');

		Route::get('add','NewsController@create');
		Route::post('add','NewsController@store');

		Route::get('delete/{id}','NewsController@destroy');
	});
	//admin/bill
	Route::group(['prefix'=>'bill'],function(){
		Route::get('index','BillController@index');
		Route::get('chitietbill/{id}','BillController@show');

		Route::post('chitietbill/{id}','BillController@update');
		
	});

	Route::group(['prefix'=>'contact'],function(){
		Route::get('index','ContactController@index');
		
		Route::get('delete/{id}','ContactController@destroy');
		
	});
});
