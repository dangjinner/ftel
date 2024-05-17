<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::post('customer/register-service', 'HomeController@customerRegister')->name('home.kh.dangkydichvu');

Route::get('dang-ky-truc-tuyen', 'HomeController@registerOnline')->name('customer.register.online');

Route::get('dang-ky-online/cam-on', 'HomeController@customerRegisterThank')->name('home.kh.dangkydichvu.thank');
Route::get('{slug}/thank-you', 'HomeController@customThanksRegister')->name('home.custom.dangkydichvu.thank');


Route::post('cam-on-dang-ky', 'HomeController@postContactForm')->name('shortcode.dangkydichvu');

Route::get('dang-nhap', 'AuthController@getLogin')->name('auth.login.get');
Route::post('dang-nhap', 'AuthController@postLogin')->name('auth.login.post');
Route::get('dang-ky', 'AuthController@getRegister')->name('auth.register.get');
Route::post('dang-ky', 'AuthController@postRegister')->name('auth.register.post');
Route::get('logout', 'AuthController@logout')->name('auth.logout')->middleware('auth');

Route::get('tai-khoan/xac-thuc', 'AuthController@getVerifyAccount')
    ->name('auth.verify.get');
Route::get('tai-khoan/hoan-tat-xac-thuc', 'AuthController@completeVerifyAccount')
    ->name('auth.verify.link');
Route::post('tai-khoan/xac-thuc', 'AuthController@postVerifyAccount')
    ->name('auth.verify.post');

Route::prefix('tai-khoan')->name('account.')->middleware('auth')->group(function() {
    Route::get('thong-tin', 'UserController@getAccountInfo')->name('info');
});

Route::get('{slug}', '\Modules\Page\Http\Controllers\PageController@show')->name('pages.news.show');
Route::get('/{slug2}', '\Modules\Page\Http\Controllers\PageController@redirect')->name('pages.redirect')->where('slug2','^[a-zA-Z0-9-_\/]+$');

