<?php

namespace BKCmedia\TwillCookieConsent;

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

        // Register the blocks directory
        parent::registerBlocksDirectory(__DIR__.'/../resources/views/twill/blocks');

        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/cookie-consent.php');

        // Load the package config file
        $this->mergeConfigFrom(__DIR__.'/../config/twill-cookie-consent.php', 'twill-cookie-consent');


    }
}
