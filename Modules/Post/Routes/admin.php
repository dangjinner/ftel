<?php

use Illuminate\Support\Facades\Route;

Route::get('posts', [
    'as' => 'admin.posts.index',
    'uses' => 'PostController@index',
    'middleware' => 'can:admin.posts.index',
]);


Route::get('posts/create', [
    'as' => 'admin.posts.create',
    'uses' => 'PostController@create',
    'middleware' => 'can:admin.posts.create',

]);

Route::post('posts', [
    'as' => 'admin.posts.store',
    'uses' => 'PostController@store',
    'middleware' => 'can:admin.posts.create',

]);

Route::get('posts/{id}/edit', [
    'as' => 'admin.posts.edit',
    'uses' => 'PostController@edit',
    'middleware' => 'can:admin.posts.edit',
]);

Route::put('posts/{id}', [
    'as' => 'admin.posts.update',
    'uses' => 'PostController@update',
    'middleware' => 'can:admin.posts.edit',
]);

Route::delete('posts/{ids?}', [
    'as' => 'admin.posts.destroy',
    'uses' => 'PostController@destroy',
    'middleware' => 'can:admin.posts.destroy',
]);

Route::get('updateDate', [
    'as' => 'admin.posts.updateDate',
    'uses' => 'PostController@updateDate',
    'middleware' => 'can:admin.posts.edit',
]);

Route::post('ajax-slug', [
    'as' => 'admin.posts.ajax.slug',
    'uses' => 'PostController@ajaxSlug',
    'middleware' => 'can:admin.posts.edit',
]);

// append
