<?php

use Illuminate\Support\Facades\Route;

Route::get('store-branches', [
    'as' => 'admin.store_branches.index',
    'uses' => 'StoreBranchController@index',
    'middleware' => 'can:admin.store_branches.index',
]);

Route::get('store-branches/create', [
    'as' => 'admin.store_branches.create',
    'uses' => 'StoreBranchController@create',
    'middleware' => 'can:admin.store_branches.create',
]);

Route::post('store-branches', [
    'as' => 'admin.store_branches.store',
    'uses' => 'StoreBranchController@store',
    'middleware' => 'can:admin.store_branches.create',
]);

Route::get('store-branches/{id}/edit', [
    'as' => 'admin.store_branches.edit',
    'uses' => 'StoreBranchController@edit',
    'middleware' => 'can:admin.store_branches.edit',
]);

Route::put('store-branches/{id}', [
    'as' => 'admin.store_branches.update',
    'uses' => 'StoreBranchController@update',
    'middleware' => 'can:admin.store_branches.edit',
]);

Route::delete('store-branches/{ids?}', [
    'as' => 'admin.store_branches.destroy',
    'uses' => 'StoreBranchController@destroy',
    'middleware' => 'can:admin.store_branches.destroy',
]);

// append

