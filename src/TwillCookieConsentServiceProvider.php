<?php

namespace BKCmedia\TwillCookieConsent;

use BKCmedia\TwillCookieConsent\Http\Controllers\CookieConsentController;
use BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Models\Cookie;
use BKCmedia\TwillCookieConsent\Composers\ConsentComposer;
use Illuminate\Support\Facades\View;
use A17\Twill\TwillPackageServiceProvider;
use A17\Twill\Facades\TwillBlocks;

class TwillCookieConsentServiceProvider extends TwillPackageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/twill-cookie-consent.php', 'twill-cookie-consent'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        // Register the blocks and repeaters directory
        parent::registerBlocksDirectory(__DIR__.'/../resources/views/twill/blocks');
        parent::registerRepeatersDirectory(__DIR__.'/../resources/views/twill/repeaters');

        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/cookie-consent.php');

        // Load the package config file
        $this->mergeConfigFrom(__DIR__.'/../config/twill-cookie-consent.php', 'twill-cookie-consent');

        // Load package views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'twill-cookie-consent');

        // Share cookie model data with view using class method
        View::composer('twill-cookie-consent::components.cookie-consent', ConsentComposer::class);

        $this->publishes([
            __DIR__.'/../build' => public_path('vendor/twill-cookie-consent'),
        ], 'twill-cookie-consent');
    }
}
