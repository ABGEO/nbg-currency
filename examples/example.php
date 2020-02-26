<?php

// Include Composer Autoloader.
require_once __DIR__.'/../vendor/autoload.php';

// Import namespace.
use ABGEO\NBG\Currency;
use ABGEO\NBG\Exporter;
use ABGEO\NBG\Helper\CurrencyCodes;

// Create new Currency class object for USD and EUR Currencies.
$USD = new Currency(CurrencyCodes::USD);
$EUR = new Currency(CurrencyCodes::EUR);

// Print results.

echo "USD: \n\n";
echo "Currency: \t{$USD->getCurrency()}\n";
echo "Description: \t{$USD->getDescription()}\n";
echo "Change: \t{$USD->getChange()}\n";
echo "Change Rate: \t{$USD->getRate()}\n";
echo "Date: \t\t{$USD->getDate()->format('m/d/Y')}\n";

echo "\n------------------------------------------\n\n";

echo "EUR: \n\n";
echo "Currency: \t{$EUR->getCurrency()}\n";
echo "Description: \t{$EUR->getDescription()}\n";
echo "Change: \t{$EUR->getChange()}\n";
echo "Change Rate: \t{$EUR->getRate()}\n";
echo "Date: \t\t{$EUR->getDate()->format('m/d/Y')}\n";

// Export Single Currency.
Exporter::export(CurrencyCodes::USD, Exporter::EXPORT_2_FILE, 'single.csv');

// Export Many Currencies.

// NOTE: Don't print anything before exporting to stream
// coz we use header() function.
Exporter::export(
    [
        CurrencyCodes::USD,
        CurrencyCodes::EUR,
        CurrencyCodes::BGN,
        CurrencyCodes::AMD,
    ],
    Exporter::EXPORT_2_STREAM
);
