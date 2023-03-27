<?php

namespace BKCmedia\TwillCookieConsent\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use A17\Twill\Models\Block;

class CookieConsentController extends Controller
{
    /**
     * Run user cookie preferences.
     *
     */
    public function handleCookies(Request $request)
    {
        $cookiePreferences = $request->input('cookie_preferences');

        // Setup array to save block ids which we later query to set scripts in <head>.
        $blockIds = [];

        if ($request->input('submit-action') === 'acceptSelectedCookies') {
            $blockIds[] = $cookiePreferences;
            $cookie = Cookie::make('cookie_consent', json_encode($blockIds), 60 * 24 * 365);

        } elseif ($request->input('submit-action') === 'acceptAllCookies') {
            // Get all cookie blocks and add to array.
            $cookiesBlocks = Block::where('type', 'cookie-block')->get();
            foreach ($cookiesBlocks as $cookieBlock) {
                $blockIds[] = $cookieBlock->id;
            }

            $cookie = Cookie::make('cookie_consent', json_encode($blockIds), 60 * 24 * 365);
        }

        return redirect()->back()->withCookie($cookie);
    }
}