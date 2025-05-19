<?php

namespace Themes\Fpt\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Ui\Facades\TabManager;
use Themes\Fpt\Admin\FptTabs;
use Modules\Support\Traits\AddsAsset;
use Themes\Fpt\Http\ViewComposer\LayoutComposer;
use Illuminate\Support\Facades\View;


class ThemeServiceProvider extends ServiceProvider
{
    use AddsAsset;

    public function boot()
    {
        TabManager::register('fpt', FptTabs::class);
        View::composer('public.*', LayoutComposer::class);
        $this->addAdminAssets('admin.fpt.settings.edit', [
            'admin.fpt.css', 'admin.media.css', 'admin.fpt.js', 'admin.media.js'
        ]);
    }

}
