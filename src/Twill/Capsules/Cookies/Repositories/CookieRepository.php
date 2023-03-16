<?php

namespace BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\ModuleRepository;
use BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Models\Cookie;

class CookieRepository extends ModuleRepository
{
    use HandleBlocks;

    public function __construct(Cookie $model)
    {
        $this->model = $model;
    }
}
