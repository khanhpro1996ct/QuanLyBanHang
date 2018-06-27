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
    return redirect('/home');
});
Route::get('admin', function () {
    return redirect('/home');
});
Route::get('user', function () {
    return view('page.trangchu');
});
Route::get('store', function () {
    return view('store.index');
});
Route::get('trang-chu-chi-tiet', function () {
    return view('index.IndexMain');
});
Route::get('hoadon', function () {
    return view('bill.ChiTietDonHang');
});


Route::group(['prefix' => 'type'], function () {
// route loai san pham
    //danh sach
    Route::get('index', 'typeController@index')->name('type.index');
    Route::get('create', 'typeController@create')->name('type.create');
    // them
    Route::post('store', 'typeController@store')->name('type.store');
    //xoa
    Route::get('destroy/{id}', 'typeController@destroy')->name('type.destroy');
    // sua
    Route::get('edit/{id}', 'typeController@edit')->name('type.edit');
    Route::post('update/{id}', 'typeController@update')->name('type.update');
});

Route::group(['prefix' => 'store'], function () {
// route cua hang
    //danh sach
    Route::get('index', 'storeController@index')->name('store.index');
    Route::get('create', 'storeController@create')->name('store.create');
    // them
    Route::post('store', 'storeController@store')->name('store.store');
    //xoa
    Route::get('destroy/{id}', 'storeController@destroy')->name('store.destroy');
    // sua
    Route::get('edit/{id}', 'storeController@edit')->name('store.edit');
    Route::post('update/{id}', 'storeController@update')->name('store.update');
});

Route::group(['prefix' => 'user'], function () {
// route cua hang
    //danh sach
    Route::get('index', 'userController@index')->name('user.index');
    Route::get('create', 'userController@create')->name('user.create');
    // them
    Route::post('store', 'userController@store')->name('user.store');
    //xoa
    Route::get('destroy/{id}', 'userController@destroy')->name('user.destroy');
    // sua
    Route::get('edit/{id}', 'userController@edit')->name('user.edit');
    Route::post('update/{id}', 'userController@update')->name('user.update');
});

Route::group(['prefix' => 'product'], function () {
// route cua hang
    //danh sach
    Route::get('index', 'productController@index')->name('product.index');
    Route::get('create', 'productController@create')->name('product.create');
    // them
    Route::post('store', 'productController@store')->name('product.store');
    //xoa
    Route::get('destroy/{id}', 'productController@destroy')->name('product.destroy');
    // sua
    Route::get('edit/{id}', 'productController@edit')->name('product.edit');
    Route::post('update/{id}', 'productController@update')->name('product.update');
});

Route::group(['prefix' => 'slide'], function () {
// route cua hang
    //danh sach
    Route::get('index', 'SlideController@index')->name('slide.index');
    Route::get('create', 'SlideController@create')->name('slide.create');
    // them
    Route::post('store', 'SlideController@store')->name('slide.store');
    //xoa
    Route::get('destroy/{id}', 'SlideController@destroy')->name('slide.destroy');
    // sua
    Route::get('edit/{id}', 'SlideController@edit')->name('slide.edit');
    Route::post('update/{id}', 'SlideController@update')->name('slide.update');
});

Route::group(['prefix' => 'don-hang'], function () {
// route cua hang
    //danh sach
    Route::get('index', 'DonHangController@index')->name('donhang.index');
    Route::get('show/{id}', 'DonHangController@show')->name('donhang.show');
    Route::get('delete/{id}', 'DonHangController@delete')->name('donhang.delete');
    Route::get('destroy/{id}', 'DonHangController@destroy')->name('donhang.destroy');
    Route::get('donhang', 'DonHangController@danhsachduyetdonhang')->name('donhang.duyetdonhang');
    Route::get('duyetdh/{id}', 'DonHangController@duyetdh')->name('donhang.duyetdh');

});



Route::group(['prefix' => 'kho-hang'], function () {
// route cua hang
    //danh sach
    Route::get('index', 'KhoController@index')->name('kho.index');
    Route::get('edit/{id}', 'KhoController@edit')->name('kho.edit');
    Route::post('update/{id}', 'KhoController@update')->name('kho.update');

});





Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('login');
});
Route::get('/home', 'HomeController@index')->name('home');


