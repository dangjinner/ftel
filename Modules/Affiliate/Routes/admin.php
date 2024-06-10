<?php

use Illuminate\Support\Facades\Route;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateProductController;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateAccountController;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateLinkController;
use Modules\Affiliate\Http\Controllers\Admin\AffiliateCustomerController;

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

    Route::prefix('links')->name('links.')->group(function() {
        Route::get('/', [AffiliateLinkController::class, 'index'])
            ->name('index')
            ->middleware('can:admin.affiliate.links.index');
        Route::get('/create', [AffiliateLinkController::class, 'create'])
            ->name('create')
            ->middleware('can:admin.affiliate.links.create');
        Route::post('/store', [AffiliateLinkController::class, 'store'])
            ->name('store')
            ->middleware('can:admin.affiliate.links.edit');
        Route::get('/{id}/edit', [AffiliateLinkController::class, 'edit'])
            ->name('edit')
            ->middleware('can:admin.affiliate.links.edit');
        Route::put('/{id}/update', [AffiliateLinkController::class, 'update'])
            ->name('update')
            ->middleware('can:admin.affiliate.links.edit');
        Route::delete('/{ids}', [AffiliateLinkController::class, 'destroy'])
            ->name('destroy')
            ->middleware('can:admin.affiliate.links.destroy');
    });

    Route::prefix('customers')->name('customers.')->group(function() {
        Route::get('/', [AffiliateCustomerController::class, 'index'])
            ->name('index')
            ->middleware('can:admin.affiliate.customers.index');
        Route::get('/create', [AffiliateCustomerController::class, 'create'])
            ->name('create')
            ->middleware('can:admin.affiliate.customers.create');
        Route::post('/store', [AffiliateCustomerController::class, 'store'])
            ->name('store')
            ->middleware('can:admin.affiliate.customers.edit');
        Route::get('/{id}/edit', [AffiliateCustomerController::class, 'edit'])
            ->name('edit')
            ->middleware('can:admin.affiliate.customers.edit');
        Route::put('/{id}/update', [AffiliateCustomerController::class, 'update'])
            ->name('update')
            ->middleware('can:admin.affiliate.customers.edit');
        Route::delete('/{ids}', [AffiliateCustomerController::class, 'destroy'])
            ->name('destroy')
            ->middleware('can:admin.affiliate.customers.destroy');
    });
});


