<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthSocialController;

Route::get('/auth/facebook', [AuthSocialController::class, 'redirectToFacebook'])
    ->name('auth.facebook.redirect');
Route::get('/auth/facebook/callback', [AuthSocialController::class, 'handleFacebookCallback'])
    ->name('auth.facebook.callback');

Route::get('/auth/google', [AuthSocialController::class, 'redirectToGoogle'])
    ->name('auth.google.redirect');
Route::get('/auth/google/callback', [AuthSocialController::class, 'handleGoogleCallback'])
    ->name('auth.google.callback');

Route::get('login', 'AuthController@getLogin')->name('login');
Route::post('login', 'AuthController@postLogin')->name('login.post');

Route::get('login/{provider}', 'AuthController@redirectToProvider')->name('login.redirect');
Route::get('login/{provider}/callback', 'AuthController@handleProviderCallback')->name('login.callback');

Route::get('logout', 'AuthController@getLogout')->name('logout');

Route::get('register', 'AuthController@getRegister')->name('register');
Route::post('register', 'AuthController@postRegister')->name('register.post');

Route::get('password/reset', 'AuthController@getReset')->name('reset');
Route::post('password/reset', 'AuthController@postReset')->name('reset.post');
Route::get('password/reset/{email}/{code}', 'AuthController@getResetComplete')->name('reset.complete');
Route::post('password/reset/{email}/{code}', 'AuthController@postResetComplete')->name('reset.complete.post');
