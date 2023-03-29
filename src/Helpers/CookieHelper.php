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

    /**
     * Get the cookie script for the given location.
     *
     * @param string $scriptLocation
     * @return string
     */
    public static function getCookieScripts(string $scriptLocation): string
    {
        $consentCookie = config('twill-cookie-consent.cookie_name');
        $hasCookie = Cookie::has($consentCookie);

        // Return empty string if the cookie is not set.
        if (!$hasCookie) {
            return '';
        }

        $acceptedBlocks = json_decode(Cookie::get($consentCookie), true) ?: [];

//        // Get the block data for the accepted blocks
//        $blocks = Block::whereIn('id', $acceptedBlocks)->get();
//
//        // Render the content using the blocks
//        $content = '';
//        foreach ($blocks as $block) {
//            foreach ($block->children->where('type', 'cookie') as $child) {
//                $content .= $child->input($scriptLocation);
//            }
//        }

        return $acceptedBlocks;
    }
}