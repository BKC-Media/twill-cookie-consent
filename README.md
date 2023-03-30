# Cookie consent for Twill ( not done yet )

This package provides a simple way to add cookie consent to your Twill 3x project by adding cookie scripts using the CMS.

## Requirements

-  PHP: ^8.0
-  area17/twill: ^3.0
-  Laravel: ^8|^9

## Installation

You can install the package via composer:

```bash \
composer require bkc-media/twill-cookie-consent 
```

Publish the assets:

```bash \
php artisan vendor:publish --provider="BKCmedia\TwillCookieConsent\TwillCookieConsentServiceProvider" --tag="twill-cookie-consent-assets" --force 
```

Optionally publish the config file:

```bash \ 
php artisan vendor:publish --provider="BKCmedia\TwillCookieConsent\TwillCookieConsentServiceProvider" --tag="twill-cookie-consent-config"
```

Run migration to add the cookie table:

```bash 
php artisan migrate 
```

## Usage