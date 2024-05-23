<?php

use Illuminate\Support\Facades\Route;
use Modules\Affiliate\Http\Controllers\AffiliateLinkController;

Route::get('ctv/{code}', [AffiliateLinkController::class, 'generateAffiliateLink'])
    ->name('affiliate.ctv.link');

