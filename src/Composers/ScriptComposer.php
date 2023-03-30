<?php

namespace BKCmedia\TwillCookieConsent\Composers;

use A17\Twill\Models\Block;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class ScriptComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $consentCookie = config('twill-cookie-consent.cookie_name');
        $hasCookie = Cookie::has($consentCookie);

        // Return empty string if the cookie is not set.
        if (!$hasCookie) {
            $scriptBlocks = null;
        } else {
            $acceptedBlocks = json_decode(Cookie::get($consentCookie), true) ?: [];
            $scriptBlocks = Block::whereIn('id', $acceptedBlocks)->get();
        }


        $view->with(compact( 'scriptBlocks'));
    }
}