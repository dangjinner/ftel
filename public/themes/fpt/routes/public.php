<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::post('customer/register-service', 'HomeController@customerRegister')->name('home.kh.dangkydichvu');

Route::get('dang-ky-truc-tuyen', 'HomeController@registerOnline')->name('customer.register.online');

Route::get('dang-ky-online/cam-on', 'HomeController@customerRegisterThank')->name('home.kh.dangkydichvu.thank');
Route::get('{slug}/thank-you', 'HomeController@customThanksRegister')->name('home.custom.dangkydichvu.thank');


Route::post('cam-on-dang-ky', 'HomeController@postContactForm')->name('shortcode.dangkydichvu');

Route::get('{slug}', '\Modules\Page\Http\Controllers\PageController@show')->name('pages.news.show');
Route::get('/{slug2}', '\Modules\Page\Http\Controllers\PageController@redirect')->name('pages.redirect')->where('slug2','^[a-zA-Z0-9-_\/]+$');
// Route::get('test', function ()
// {
//     if (sha1($_SERVER['HTTP_HOST']) != '6615216f8b0ced03eba63080989c41652bfd774d') {
//         dd("Website không hợp lệ !");
//     }
//     dd($_SERVER);
//     return;
// });

// Route::get('dang-ky','SendMailController@register')->name('pages.register');
// Route::get('dang-ky/{id}','SendMailController@getJson')->name('pages.getJson');
// Route::post('dang-ky','SendMailController@sendMail')->name('pages.sendMail');

// Route::get('fpt/featured-categories/{categoryNumber}/products', 'FeaturedCategoryProductController@index')->name('fpt.featured_category_products.index');
// Route::get('fpt/tab-products/sections/{sectionNumber}/tabs/{tabNumber}', 'TabProductController@index')->name('fpt.tab_products.index');
// Route::get('fpt/product-grid/tabs/{tabNumber}', 'ProductGridController@index')->name('fpt.product_grid.index');
// Route::get('fpt/flash-sale-products', 'FlashSaleProductController@index')->name('fpt.flash_sale_products.index');
// Route::get('fpt/vertical-products/{columnNumber}', 'VerticalProductController@index')->name('fpt.vertical_products.index');

// Route::post('fpt/newsletter-popup', 'NewsletterPopup@store')->name('fpt.newsletter_popup.store');
// Route::delete('fpt/newsletter-popup', 'NewsletterPopup@destroy')->name('fpt.newsletter_popup.destroy');

// Route::delete('fpt/cookie-bar', 'CookieBarController@destroy')->name('fpt.cookie_bar.destroy');
