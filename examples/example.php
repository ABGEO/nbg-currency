<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ABGEO\NBG\Currency;

$USD = new Currency(Currency::CURRENCY_USD);
$RUB = new Currency(Currency::CURRENCY_RUB);

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
