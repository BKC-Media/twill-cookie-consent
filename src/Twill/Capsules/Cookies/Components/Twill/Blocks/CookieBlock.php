<?php

namespace BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Components\Twill\Blocks;

use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\View\Components\Blocks\TwillBlockComponent;
use Illuminate\Contracts\View\View;

class CookieBlock extends TwillBlockComponent
{
    public function render(): View
    {
        return view('twill-cookie-consent::blocks.cookie-block');
    }
}