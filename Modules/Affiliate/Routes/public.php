<?php

use Illuminate\Support\Facades\Route;
use Modules\Affiliate\Http\Controllers\AffiliateLinkController;
use Modules\Affiliate\Http\Controllers\AffiliateProductController;
use Modules\Affiliate\Http\Controllers\AffiliateAccountController;
use Modules\Affiliate\Http\Controllers\AffiliateAgencyController;

Route::get('ctv/{code}', [AffiliateLinkController::class, 'generateAffiliateLink'])
    ->name('affiliate.ctv.link');

Route::prefix('affiliate')
    ->name('affiliate.')
    ->group(function () {
        Route::middleware('auth')->group(function() {
            Route::get('products', [AffiliateProductController::class, 'products'])->name('products');

            Route::middleware('affiliate.verified')->group(function () {
                Route::get('products/{id}', [AffiliateProductController::class, 'getSingleProduct'])->name('single_product');
                Route::post('products/{id}/create-link', [AffiliateProductController::class, 'createAffiliateLink'])->name('products.create_link');
                Route::get('links/{code}', [AffiliateLinkController::class, 'getSingleLink'])->name('single_link');
                Route::prefix('agency')->name('agency.')->group(function () {
                    Route::get('customers', [AffiliateAgencyController::class, 'registeredCustomers'])->name('registered_customers');
                    Route::get('account-info', [AffiliateAgencyController::class, 'accountInfo'])->name('account_info');
                    Route::post('account-info', [AffiliateAgencyController::class, 'updateAccountInfo'])->name('account_info.update');
                });
            });

            Route::middleware('affiliate.not_pending')->group(function () {
                Route::get('register', [AffiliateAccountController::class, 'getRegister'])->name('register.get');
                Route::post('register', [AffiliateAccountController::class, 'postRegister'])->name('register.post');
            });

            Route::get('pending', [AffiliateAccountController::class, 'pending'])->name('register.pending');
        });
    });

