<?php

use ABGEO\NBG\Currency;
use ABGEO\NBG\Exception\InvalidCurrencyException;
use ABGEO\NBG\Helper\CurrencyCodes;
use PHPUnit\Framework\TestCase;

final class CurrencyTest extends TestCase
{
    public function testInvalidCurrencyException()
    {
        $this->expectException(InvalidCurrencyException::class);

        new Currency('iAmInvalidCurrencyCode');
    }

    public function testCurrencyConstants()
    {
        $this->assertEquals(CurrencyCodes::USD, 'USD');
        $this->assertEquals(CurrencyCodes::CHF, 'CHF');
        $this->assertEquals(CurrencyCodes::IRR, strtoupper('irr'));
    }

    public function testCurrencyModelGettersAndSetters()
    {
        $currencyAmount = 1.1;
        $currencyDescription = 'Description';
        $currencyChange = 1.1;
        $currencyRate = -1;
        $currencyDate = new DateTime();

        $currency = (new \ABGEO\NBG\Model\Currency())
            ->setCurrency($currencyAmount)
            ->setDescription($currencyDescription)
            ->setChange($currencyChange)
            ->setRate($currencyRate)
            ->setDate($currencyDate);

        $this->assertEquals($currencyAmount, $currency->getCurrency());
        $this->assertEquals($currencyDescription, $currency->getDescription());
        $this->assertEquals($currencyChange, $currency->getChange());
        $this->assertEquals($currencyRate, $currency->getRate());
        $this->assertEquals($currencyDate, $currency->getDate());
    }
}
