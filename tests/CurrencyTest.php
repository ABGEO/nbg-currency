<?php

use ABGEO\NBG\Currency;
use ABGEO\NBG\Exception\InvalidCurrencyException;
use ABGEO\NBG\Helper\CurrencyCodes;
use PHPUnit\Framework\TestCase;

final class CurrencyTest extends TestCase
{
    public function testCurrencyConstants()
    {
        $this->assertEquals(CurrencyCodes::USD, 'USD');
        $this->assertEquals(CurrencyCodes::CHF, 'CHF');
        $this->assertEquals(CurrencyCodes::IRR, strtoupper('irr'));
    }

    public function testInvalidCurrencyException()
    {
        $this->expectException(InvalidCurrencyException::class);

        new Currency('iAmInvalidCurrencyCode');
    }

    public function testCompareToRealApiData()
    {
        $currency = new Currency(CurrencyCodes::USD);
        $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');

        $this->assertEquals($currency->getCurrency(), $client->GetCurrency('USD'));
        $this->assertEquals($currency->getDescription(), $client->GetCurrencyDescription('USD'));
        $this->assertEquals($currency->getChange(), $client->GetCurrencyChange('USD'));
        $this->assertEquals($currency->getRate(), $client->GetCurrencyRate('USD'));
        $this->assertEquals($currency->getDate()->format('Y-m-d'), $client->GetDate('USD'));
    }
}
