<?php

namespace BKCmedia\TwillCookieConsent;

use A17\Twill\TwillPackageServiceProvider;

class TwillCookieConsentServiceProvider extends TwillPackageServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__.'/routes/cookie-consent.php');
    }
}
