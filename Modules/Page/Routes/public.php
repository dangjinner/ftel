<?php

use Illuminate\Support\Facades\Route;

Route::get('khuyen-mai/internet-fpt/lap-mang-fpt-ha-noi', 'PageController@lapmangfpthanoi')->name('pages.lapmangfpthanoi');

Route::get('getStoreBrach', [
    'as' => 'pages.getStoreBrach',
    'uses' => 'PageController@getStoreBrach'
]);
// Route::get('/', 'HomeController@index')->name('home');

// Route::get('about', 'PageController@show')->name('about.show');
// Route::get('oauth', 'PageController@oauth')->name('oauth');
// Route::get('test-sheet', 'PageController@test')->name('test');
Route::get('dang-ky-thong-tin', 'PageController@register')->name('pages.register');
Route::get('dang-ky-thong-tin/{id}','PageController@getJson')->name('pages.getJson');
Route::post('dang-ky-thong-tin','PageController@sendMail')->name('pages.sendMail');
Route::get('thank-you', 'PageController@thankyou')->name('pages.thankyou');

Route::post('lien-he', 'PageController@postContact')->name('pages.post.contact');
Route::post('/contact', 'PageController@storedContact')->name('pages.contact.store');

Route::get('provinces', 'PageController@getProvinces')->name('pages.provinces');

Route::get('tin-tuc','PageController@news')->name('pages.news');
Route::get('tin-tuc/tin-fpt','PageController@newsFPT')->name('pages.newsFPT');

Route::get('tin-tuc/tin-bao-chi','PageController@newsPress')->name('pages.newsPress');
Route::get('tin-tuc/tin-emagazine','PageController@newsEmagazine')->name('pages.newsEmagazine');

Route::get('dang-ky-online', 'PageController@registerOnl')->name('pages.regisOnl');

Route::get('khuyen-mai', 'PageController@sale')->name('pages.sale');
Route::get('khuyen-mai/{slug?}', 'PageController@salePageCustom')->name('pages.sale.custom');
Route::get('khuyen-mai/{slug?}/{area?}', 'PageController@salePageCustomArea')->name('pages.sale.custom.area');
// Route::get('khuyen-mai/{slug}', 'PageController@saleCategories')->name('pages.sale.categories');


Route::get('khuyen-mai/internet-fpt', 'PageController@saleInternet')->name('pages.saleInternet');
Route::get('khuyen-mai/truyen-hinh-fpt', 'PageController@saleNetTv')->name('pages.saleNetTv');
Route::get('khuyen-mai/combo-internet-truyen-hinh-fpt', 'PageController@comboInternet')->name('pages.comboInternet');
Route::get('khuyen-mai/camera-fpt', 'PageController@cameraFpt')->name('pages.cameraFpt');
Route::get('khuyen-mai/truyen-hinh-fpt-playbox', 'PageController@playBoxx')->name('pages.playBoxx');
Route::get('khuyen-mai/fpt-ihome', 'PageController@iHome')->name('pages.iHome');


Route::get('san-pham-dich-vu', function(){
    return redirect()->route('pages.individualFiber'); 
})->name('pages.individualFiber1');

Route::get('san-pham-dich-vu/internet-fpt', function(){
    return redirect()->route('pages.individualFiber'); 
})->name('pages.internetFpt');

// Route::get('san-pham-dich-vu', 'PageController@individualFiber')->name('pages.individualFiber1');
// Route::get('san-pham-dich-vu/internet-fpt', 'PageController@internetFpt')->name('pages.internetFpt');
// Route::get('san-pham-dich-vu/internet-fpt', 'PageController@individualFiber')->name('pages.internetFpt');
Route::get('san-pham-dich-vu/internet-fpt/cap-quang-ca-nhan', 'PageController@individualFiber')->name('pages.individualFiber');
Route::get('san-pham-dich-vu/internet-fpt/cap-quang-doanh-nghiep', 'PageController@enterpriseFiber')->name('pages.enterpriseFiber');
Route::get('san-pham-dich-vu/internet-fpt/net-truyen-hinh-fpt', 'PageController@netTv')->name('pages.netTv');
Route::get('san-pham-dich-vu/internet-fpt/lux', 'PageController@internetLux')->name('pages.lux');

// Route::get('san-pham-dich-vu/truyen-hinh-fpt', 'PageController@maxyTv')->name('pages.maxyTv');
Route::get('san-pham-dich-vu/truyen-hinh-fpt', 'PageController@maxy')->name('pages.maxyTv');

Route::get('san-pham-dich-vu/truyen-hinh-fpt/goi-kenh-maxy', function(){
    return redirect()->route('pages.maxyTv');
})->name('pages.maxy');

// Route::get('san-pham-dich-vu/truyen-hinh-fpt/goi-kenh-maxy', 'PageController@maxy')->name('pages.maxy');

// Route::get('san-pham-dich-vu/dich-vu-online', 'PageController@onlineService')->name('pages.onlineService');
// Route::get('san-pham-dich-vu/dich-vu-online', 'PageController@playBox')->name('pages.onlineService');

Route::get('san-pham-dich-vu/dich-vu-online', function(){
    return redirect()->route('pages.playBox');
})->name('pages.onlineService');

Route::get('san-pham-dich-vu/dich-vu-online/fpt-play-box', function() {
    return redirect()->route('pages.playBox');
});
Route::get('san-pham-dich-vu/dich-vu-online/fpt-play', function() {
    return redirect()->route('pages.play');
});

/**
 * Routes customize
 */

 Route::get('san-pham-dich-vu/truyen-hinh-fpt/fpt-play-box', 'PageController@playBox')->name('pages.playBox');
 Route::get('/san-pham-dich-vu/truyen-hinh-fpt/fpt-play', 'PageController@play')->name('pages.play');

// Route::get('san-pham-dich-vu/smart-home', 'PageController@smartHome')->name('pages.smartHome');
// Route::get('san-pham-dich-vu/smart-home', 'PageController@fptCamera')->name('pages.smartHome');

Route::get('san-pham-dich-vu/smart-home', function(){
    return redirect()->route('pages.fptCamera');
})->name('pages.smartHome');
Route::get('san-pham-dich-vu/smart-home/fpt-camera', 'PageController@fptCamera')->name('pages.fptCamera');
Route::get('san-pham-dich-vu/smart-home/fpt-ihome', 'PageController@fptIhome')->name('pages.fptIhome');

Route::get('ho-tro/ho-tro-thong-tin/huong-dan-su-dung', 'PageController@fptTelevision')->name('pages.userManual');
Route::get('ho-tro/ho-tro-thong-tin/huong-dan-su-dung/truyen-hinh-fpt', 'PageController@fptTelevision')->name('pages.support.fptTelevision');
Route::get('ho-tro/ho-tro-thong-tin/huong-dan-su-dung/camera', 'PageController@camera')->name('pages.support.camera');
Route::get('ho-tro/ho-tro-thong-tin/huong-dan-su-dung/fpt-play-box', 'PageController@fptPlaybox')->name('pages.support.fptPlaybox');
Route::get('ho-tro/ho-tro-thong-tin/huong-dan-su-dung/hi-fpt', 'PageController@hiFpt')->name('pages.support.hiFpt');
Route::get('ho-tro/ho-tro-thong-tin/huong-dan-thu-tuc', 'PageController@procedureGuide')->name('pages.support.procedureGuide');
Route::get('ho-tro/ho-tro-thong-tin/dieu-khoan-bao-mat', 'PageController@privacyPolicy')->name('pages.support.privacyPolicy');
// Route::get('ho-tro/ho-tro-thong-tin/cau-hoi-thuong-gap', 'PageController@faq')->name('pages.support.faq');

Route::get('ho-tro/ho-tro-thong-tin/cau-hoi-thuong-gap/{slug?}', 'PageController@faq')->name('pages.support.faq');

Route::get('ho-tro/ho-tro-ky-thuat/huong-dan-cai-dat/{slug?}', 'PageController@installationInstructions')->name('pages.support.installationInstructions');
Route::get('ho-tro/ho-tro-ky-thuat/xu-ly-su-co/{slug?}', 'PageController@resovleProblem')->name('pages.support.resovleProblem');

Route::get('ho-tro/lien-he-24-7/diem-giao-dich', 'PageController@contact')->name('pages.support.contact');

Route::get('ho-tro/ho-tro-thong-tin/huong-dan-su-dung/{slug}', 'PageController@userManualCat')->name('pages.support.userManualCat');


// Route::get('/{slug2}', 'PageController@redirect')->name('pages.redirect')->where('slug2','^[a-zA-Z0-9-_\/]+$');

// Route::get('{slug1}/{slug2}', 'PageController@subLinkLevel2')->name('pages.subLinkLevel2');
// Route::get('{slug1}/{slug2}/{slug3}', 'PageController@subLinkLevel3')->name('pages.subLinkLevel3');
