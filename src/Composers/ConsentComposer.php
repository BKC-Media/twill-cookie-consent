<?php

namespace BKCmedia\TwillCookieConsent\Composers;

use A17\Twill\Models\Block;
use BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Models\Cookie;
use Illuminate\View\View;

class ConsentComposer
{
    /**
     * The cookie model implementation.
     *  @var Cookie
     */
    protected $cookie;

    /**
     * Create a new cookie consent composer.
     *
     * @param  Cookie $cookie
     * @return void
     */
    public function __construct(Cookie $cookie)
    {
        $this->cookie = $cookie->first();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $cookiesData = $this->cookie;
        $cookiesBlocks = Block::where('type', 'cookie-block')->get();

        $view->with(compact('cookiesData', 'cookiesBlocks'));
    }
}
