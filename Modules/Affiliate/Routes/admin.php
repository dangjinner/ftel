<?php

use Illuminate\Support\Facades\Route;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateProductController;

Route::prefix('affiliate')->name('admin.affiliate_')->group(function() {
    Route::prefix('products')->name('products.')->group(function() {
        Route::get('/', [AffiliateProductController::class, 'index'])
            ->name('index')
            ->middleware('can:admin.affiliate.products.index');
        Route::get('/create', [AffiliateProductController::class, 'create'])
            ->name('create')
            ->middleware('can:admin.affiliate.products.create');
        Route::post('/store', [AffiliateProductController::class, 'store'])
            ->name('store')
            ->middleware('can:admin.affiliate.products.edit');
        Route::get('/{id}/edit', [AffiliateProductController::class, 'edit'])
            ->name('edit')
            ->middleware('can:admin.affiliate.products.edit');
        Route::put('/{id}/update', [AffiliateProductController::class, 'update'])
            ->name('update')
            ->middleware('can:admin.affiliate.products.edit');
        Route::delete('/{ids}', [AffiliateProductController::class, 'destroy'])
            ->name('destroy')
            ->middleware('can:admin.affiliate.products.destroy');
    });
});


