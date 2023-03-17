<?php

namespace BKCmedia\TwillCookieConsent;

use Illuminate\Support\Facades\Config;
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

        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/cookie-consent.php');

        // Register the views for the Cookie Capsule with Twill's view finder
        Config::set('view.paths', array_merge(
            Config::get('view.paths'),
            [__DIR__.'/../resources/views/twill/blocks']
        ));

        Config::set('view.paths', array_merge(
            Config::get('view.paths'),
            [__DIR__.'/../resources/views/twill/repeaters']
        ));

        View::addNamespace('twill-cookie-consent', __DIR__.'/../resources/views/twill');
    }
}
