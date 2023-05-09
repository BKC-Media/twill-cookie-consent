# Cookie consent for Twill
[![Latest Stable Version](http://poser.pugx.org/bkc-media/twill-cookie-consent/v)](https://packagist.org/packages/bkc-media/twill-cookie-consent) [![Total Downloads](http://poser.pugx.org/bkc-media/twill-cookie-consent/downloads)](https://packagist.org/packages/bkc-media/twill-cookie-consent) [![Latest Unstable Version](http://poser.pugx.org/bkc-media/twill-cookie-consent/v/unstable)](https://packagist.org/packages/bkc-media/twill-cookie-consent) [![License](http://poser.pugx.org/bkc-media/twill-cookie-consent/license)](https://packagist.org/packages/bkc-media/twill-cookie-consent)

This package provides a simple way to add cookie consent to your Twill 3x project by adding cookie scripts based on user preferences using the CMS.

## Requirements

-  PHP: ^8.0
-  area17/twill: ^3.0
-  Laravel: ^8|^9

## Installation

You can install the package via composer:

```bash \
composer require bkc-media/twill-cookie-consent 
```

Publish the assets to include necessary javascript and css files:

```bash \
php artisan vendor:publish --provider="BKCmedia\TwillCookieConsent\TwillCookieConsentServiceProvider" --tag="twill-cookie-consent-assets" --force 
```

Optionally publish the config file:

```bash \ 
php artisan vendor:publish --provider="BKCmedia\TwillCookieConsent\TwillCookieConsentServiceProvider" --tag="twill-cookie-consent-config"
```

Optionally publish the lang files:

```bash \ 
php artisan vendor:publish --provider="BKCmedia\TwillCookieConsent\TwillCookieConsentServiceProvider" --tag="twill-cookie-consent-translations"
```

The contents of the published config file will look like this:

```php
return [
    /*
     * The cookie name in which we store which cookie id's the user has consented to.
     */
    'cookie_name' => 'tcc_cookie_consent',

    /*
     * Set the cookie duration in minutes.  Default is 60 * 24 * 365.
     */
    'cookie_lifetime' => 60 * 24 * 365,

    /*
     * Set primary color for cookie consent accept all buttons, default is green.
     */
    'primary_color' => '#65A30D',
];
```

Run migration to add the twill cookie singleton:

```bash 
php artisan migrate 
```

## Usage
After migration you can add the cookie consent content by going to the cookie module in the CMS. Add the cookie consent banner description and intro settings content. Use the block editor to add cookie categories and the repeater inside the block to add cookie information and necessary scripts per location: head, body or footer.

Add the cookie consent banner to your app.blade.php file or any other layout file:

```php
@include('twill-cookie-consent::components.cookie-consent')
```

Based on provider scripts add one or all of the following in the right location in your app.blade.php file or any other layout file:

```php 
@include('twill-cookie-consent::components.head-scripts')

@include('twill-cookie-consent::components.body-scripts')

@include('twill-cookie-consent::components.footer-scripts')
```

Based on the user preferences the scripts will be added to the page in the right location.
