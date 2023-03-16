<?php

namespace BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Model;

class Cookie extends Model 
{
    use HasBlocks;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];
    
}
