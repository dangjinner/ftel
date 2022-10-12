<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Shortcode;
use Modules\Core\Shortcodes\BoxAlertShortcode;
use Modules\Core\Shortcodes\ToggleShortcode;
use Modules\Core\Shortcodes\ButtonShortcode;
use Modules\Core\Shortcodes\GoPricingShortcode;
use Modules\Core\Shortcodes\ContactFormShortcode;
use Modules\Core\Shortcodes\CaptionShortcode;
use Modules\Core\Shortcodes\ContactFormCustomShortcode;
use Modules\Core\Shortcodes\ViewMoreShortcode;
use Modules\Core\Shortcodes\InternetFPTShortcode;
use Modules\Core\Shortcodes\PriceComboShortcode;
use Modules\Core\Shortcodes\ContactFormRegisterShortcode;
use Modules\Core\Shortcodes\FPTPlayShortcode;
use Modules\Core\Shortcodes\GoPricingCustomShortcode;
use Modules\Core\Shortcodes\CameraPricesCustomShortcode;
use Modules\Core\Shortcodes\CameraPricesShortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('box', BoxAlertShortcode::class);
        Shortcode::register('toggle', ToggleShortcode::class);
        Shortcode::register('button', ButtonShortcode::class);
        Shortcode::register('go_pricing', GoPricingShortcode::class);
        Shortcode::register('go_pricing_custom', GoPricingCustomShortcode::class);
        Shortcode::register('contact-form-7', ContactFormShortcode::class);
        Shortcode::register('form-lien-he', ContactFormRegisterShortcode::class);
        Shortcode::register('caption', CaptionShortcode::class);
        Shortcode::register('view_more', ViewMoreShortcode::class);
        Shortcode::register('baogiatoanquocfpt', InternetFPTShortcode::class);
        Shortcode::register('price_combo', PriceComboShortcode::class);
        Shortcode::register('fpt_play', FPTPlayShortcode::class);
        Shortcode::register('camera_prices', CameraPricesShortcode::class);
        Shortcode::register('contact_form_custom', ContactFormCustomShortcode::class);
        Shortcode::register('camera_prices_custom', CameraPricesCustomShortCode::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
