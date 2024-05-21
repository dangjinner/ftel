<?php

namespace Modules\Affiliate\Providers;

use Modules\Admin\Ui\Facades\TabManager;
use Modules\Affiliate\Admin\AffiliateProductTabs;
use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;

class AffiliateServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('affiliate_products', AffiliateProductTabs::class);

        $this->addAdminAssets('admin.affiliate.products.(create|edit)', [
            'admin.media.css', 'admin.media.js', 'admin.product.css', 'admin.product.js',
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
