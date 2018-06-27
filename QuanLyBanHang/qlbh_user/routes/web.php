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
Route::get('gioithieu', function () {
    return view('page.gioithieu');
});
Route::get('lienhe', function () {
    return view('page.lienhe');
});

//Route::get('index','PageController@getIn');
Route::get('index',[
    'as'=>'trangchu',
    'uses'=>'PageController@getIn'
]);

//Route::get('loaisp','PageController@getLoaiSP');

//Route::get('chitietsp','PageController@getChitietSP');

Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitietSP'
]);
//Route::get('lienhe','PageController@getLienHe');
Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienHe'
]);

//Route::get('gioithieu','PageController@getGioithieu');
Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaiSP'
]);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getGioithieu'
]);

Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtocart'
]);

Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDelItemcart'
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

Route::get('dang-xuat',[
    'as'=>'logout',
    'uses'=>'PageController@getLogout'
]);

Route::get('dang-ky',[
    'as'=>'signin',
    'uses'=>'PageController@getSignin'
]);
Route::post('dang-ky',[
    'as'=>'signin',
    'uses'=>'PageController@postSignin'
]);

Route::get('tim-kiem',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

