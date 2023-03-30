<?php

namespace BKCmedia\TwillCookieConsent\Helpers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
use A17\Twill\Models\Block;

class CookieHelper
{
    public static function registerDirectives()
    {
        self::registerCookieNotConsentedDirective();
    }
    /**
     * Register the @cookieNotConsented Blade directive.
     *
     * @return void
     */
    public static function registerCookieNotConsentedDirective()
    {
        Blade::if('cookieNotConsented', function () {
            return !Cookie::has(config('twill-cookie-consent.cookie_name'));
        });
    }
}