<?php

use Illuminate\Support\Facades\Route;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateProductController;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateAccountController;

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

    Route::prefix('accounts')->name('accounts.')->group(function() {
        Route::get('/', [AffiliateAccountController::class, 'index'])
            ->name('index')
            ->middleware('can:admin.affiliate.accounts.index');
        Route::get('/create', [AffiliateAccountController::class, 'create'])
            ->name('create')
            ->middleware('can:admin.affiliate.accounts.create');
        Route::post('/store', [AffiliateAccountController::class, 'store'])
            ->name('store')
            ->middleware('can:admin.affiliate.accounts.edit');
        Route::get('/{id}/edit', [AffiliateAccountController::class, 'edit'])
            ->name('edit')
            ->middleware('can:admin.affiliate.accounts.edit');
        Route::put('/{id}/update', [AffiliateAccountController::class, 'update'])
            ->name('update')
            ->middleware('can:admin.affiliate.accounts.edit');
        Route::delete('/{ids}', [AffiliateAccountController::class, 'destroy'])
            ->name('destroy')
            ->middleware('can:admin.affiliate.accounts.destroy');
    });
});


