<?php

use ABGEO\NBG\Currency;
use ABGEO\NBG\Exception\InvalidCurrencyException;
use PHPUnit\Framework\TestCase;

final class CurrencyTest extends TestCase
{
    public function testCurrencyConstants(): void
    {
        $this->assertEquals(Currency::CURRENCY_USD, 'USD');
        $this->assertEquals(Currency::CURRENCY_CHF, 'CHF');
        $this->assertEquals(Currency::CURRENCY_IRR, strtoupper('irr'));
    }

    public function testInvalidCurrencyException(): void
    {
        $this->expectException(InvalidCurrencyException::class);

        new Currency('iAmInvalidCurrencyCode');
    }

    public function testDataTypes(): void
    {
        $currency = new Currency(Currency::CURRENCY_USD);

        $this->assertIsFloat($currency->getCurrency());
        $this->assertIsFloat($currency->getChange());
        $this->assertIsString($currency->getDescription());
        $this->assertIsInt($currency->getRate());
        $this->assertTrue(in_array($currency->getRate(), [-1, 0, 1]));
        $this->assertInstanceOf(DateTime::class, $currency->getDate());
    }

    public function testCompareToRealApiData()
    {
        $currency = new Currency(Currency::CURRENCY_USD);
        $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');

        $this->assertEquals($currency->getCurrency(), $client->GetCurrency('USD'));
        $this->assertEquals($currency->getDescription(), $client->GetCurrencyDescription('USD'));
        $this->assertEquals($currency->getChange(), $client->GetCurrencyChange('USD'));
        $this->assertEquals($currency->getRate(), $client->GetCurrencyRate('USD'));
        $this->assertEquals($currency->getDate()->format('Y-m-d'), $client->GetDate('USD'));
    }
}
