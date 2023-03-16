<?php

namespace BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Database\Seeds;

use Illuminate\Database\Seeder;
use BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Repositories\CookieRepository;
use BKCmedia\TwillCookieConsent\Twill\Capsules\Cookies\Models\Cookie;

class CookieSeeder extends Seeder
{
    /**
     * Create the database record for this singleton module.
     *
     * @return void
     */
    public function run()
    {
        if (Cookie::count() > 0) {
            return;
        }

        app(CookieRepository::class)->create([
            'title' => 'Cookie consent',
            'published' => true,
        ]);
    }
}
