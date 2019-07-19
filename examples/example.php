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

// Export to CSV.

// Export Single Currency.
Currency::export(Currency::CURRENCY_USD, Currency::EXPORT_2_FILE, 'single.csv');

// Export Many Currencies.

// NOTE: Don't print anything before exporting to stream
// coz we use header() function.
Currency::export(
    [
        Currency::CURRENCY_USD,
        Currency::CURRENCY_EUR,
        Currency::CURRENCY_BGN,
        Currency::CURRENCY_AMD
    ],
    Currency::EXPORT_2_STREAM
);
