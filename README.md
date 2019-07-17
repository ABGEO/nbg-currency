# nbg-currency
PHP Library for getting data from [National Bank of Georgia (NBG)'s API](http://nbg.ge/api.html).

* Library maintainer [ABGEO](jhttps://abgeo.dev)
* Library on [GitHub](https://github.com/ABGEO07/nbg-currency)
* Library on [Packagist](https://packagist.org/packages/abgeo/nbg-currency)

[![GitHub license](https://img.shields.io/github/license/ABGEO07/nbg-currency.svg)](https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE)

[![GitHub release](https://img.shields.io/github/release/ABGEO07/nbg-currency.svg)](https://github.com/ABGEO07/nbg-currency/releases)

[![Packagist Version](https://img.shields.io/packagist/v/abgeo/nbg-currency.svg "Packagist Version")](https://packagist.org/packages/abgeo/nbg-currency "Packagist Version")

---

**See documentation generated by [phpDocumentor](https://www.phpdoc.org/) in [docs/](docs) folder.**

## Installation

You can install this library with [Composer](https://getcomposer.org/):

- `composer require abgeo/nbg-currency`
    
## Usage

Include composer autoloader in your main file (Ex.: index.php)

- `require_once __DIR__ . '/../vendor/autoload.php';`

Import `ABGEO\NBG\Currency` Namespace:

- `use ABGEO\NBG\Currency;`

Now you can create new `Currency` Class object ex. for `USD` currency:

- `$USD = new Currency(Currency::CURRENCY_USD);`

The `Currency` class constructor has a single argument, the Currency Code. You can pass it manually or using class constants:

```text
CURRENCY_AED, CURRENCY_AMD, CURRENCY_AUD, CURRENCY_AZN, CURRENCY_BGN, CURRENCY_BYR, CURRENCY_CAD, 
CURRENCY_CHF, CURRENCY_CNY, CURRENCY_CZK, CURRENCY_DKK, CURRENCY_EEK, CURRENCY_EGP, CURRENCY_EUR, 
CURRENCY_GBP, CURRENCY_HKD, CURRENCY_HUF, CURRENCY_ILS, CURRENCY_INR, CURRENCY_IRR, CURRENCY_ISK, 
CURRENCY_JPY, CURRENCY_KGS, CURRENCY_KWD, CURRENCY_KZT, CURRENCY_LTL, CURRENCY_LVL, CURRENCY_MDL, 
CURRENCY_NOK, CURRENCY_NZD, CURRENCY_PLN, CURRENCY_RON, CURRENCY_RSD, CURRENCY_RUB, CURRENCY_SEK, 
CURRENCY_SGD, CURRENCY_TJS, CURRENCY_TMT, CURRENCY_TRY, CURRENCY_UAH, CURRENCY_USD, CURRENCY_UZS.
```

After creating a class object, we can get currency data.  
The API gives us:

- Currency Amount;
- Currency Description;
- Currency Change value;
- Currency Change rate (-1 - decreased; 0 - unchanged; 1 - increased);
- Currency Date;

### Public methods

- `getCurrency()` - Get Currency Amount;
- `getDescription()` - Get Currency Description;
- `getChange()` - Currency Change value;
- `getRate()` - Get Currency Change rate;
- `getDate()` - Get Currency Date;

### Example for USD

```php
...
echo "Currency: \t{$USD->getCurrency()}\n";
echo "Description: \t{$USD->getDescription()}\n";
echo "Change: \t{$USD->getChange()}\n";
echo "Change Rate: \t{$USD->getRate()}\n";
echo "Date: \t\t{$USD->getDate()->format('m/d/Y')}\n";
...
```

### Full example with USD and RUB

```php
<?php

// Include Composer Autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

// Import namespace.
use ABGEO\NBG\Currency;

// Create new Currency class object for USD Currency.
$USD = new Currency(Currency::CURRENCY_USD);
// Create new Currency class object for RUB Currency.
$RUB = new Currency(Currency::CURRENCY_RUB);

// Print results.

echo "UDS: \n\n";
echo "Currency: \t{$USD->getCurrency()}\n";
echo "Description: \t{$USD->getDescription()}\n";
echo "Change: \t{$USD->getChange()}\n";
echo "Change Rate: \t{$USD->getRate()}\n";
echo "Date: \t\t{$USD->getDate()->format('m/d/Y')}\n";

echo "\n------------------------------------------\n\n";

echo "RUB: \n\n";
echo "Currency: \t{$RUB->getCurrency()}\n";
echo "Description: \t{$RUB->getDescription()}\n";
echo "Change: \t{$RUB->getChange()}\n";
echo "Change Rate: \t{$RUB->getRate()}\n";
echo "Date: \t\t{$RUB->getDate()->format('m/d/Y')}\n";
```

## Authors

* **Temuri Takalandze** - *Initial work* - [ABGEO](https://abgeo.dev)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details