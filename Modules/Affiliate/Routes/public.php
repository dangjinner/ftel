<?php

use Illuminate\Support\Facades\Route;
use Modules\Affiliate\Http\Controllers\AffiliateLinkController;
use Modules\Affiliate\Http\Controllers\AffiliateProductController;
use Modules\Affiliate\Http\Controllers\AffiliateAccountController;

Route::get('ctv/{code}', [AffiliateLinkController::class, 'generateAffiliateLink'])
    ->name('affiliate.ctv.link');

Route::prefix('affiliate')
    ->middleware(['auth'])
    ->name('affiliate.')
    ->group(function () {
        Route::middleware('affiliate.verified')->group(function () {
            Route::get('products', [AffiliateProductController::class, 'products'])->name('products');
            Route::get('products/{id}', [AffiliateProductController::class, 'getSingleProduct'])->name('single_product');
            Route::post('products/{id}/create-link', [AffiliateProductController::class, 'createAffiliateLink'])->name('products.create_link');
            Route::get('links/{code}', [AffiliateLinkController::class, 'getSingleLink'])->name('single_link');
        });

        Route::middleware('affiliate.not_pending')->group(function () {
            Route::get('register', [AffiliateAccountController::class, 'getRegister'])->name('register.get');
            Route::post('register', [AffiliateAccountController::class, 'postRegister'])->name('register.post');
        });

        Route::get('pending', [AffiliateAccountController::class, 'pending'])->name('register.pending');
    });

