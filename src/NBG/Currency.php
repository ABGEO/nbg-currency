<?php

namespace ABGEO\NBG;

use ABGEO\NBG\Exception\InvalidCurrencyException;
use DateTime;
use SoapClient;

/**
 * Class Currency
 *
 * @category Library
 * @package  ABGEO\NBG
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @link     https://github.com/ABGEO07/nbg-currency
 */
class Currency
{
    use CurrencyDataTrait;

    /**
     * NBG API url.
     *
     * @var string
     */
    private $_API = 'http://nbg.gov.ge/currency.wsdl';

    /**
     * SoapClient object.
     *
     * @var \SoapClient
     */
    private $_client;

    /**
     * Currency code.
     *
     * @var string
     */
    private $_currency;

    // Define Currency codes.
    const CURRENCY_AED = 'AED';
    const CURRENCY_AMD = 'AMD';
    const CURRENCY_AUD = 'AUD';
    const CURRENCY_AZN = 'AZN';
    const CURRENCY_BGN = 'BGN';
    const CURRENCY_BYR = 'BYR';
    const CURRENCY_CAD = 'CAD';
    const CURRENCY_CHF = 'CHF';
    const CURRENCY_CNY = 'CNY';
    const CURRENCY_CZK = 'CZK';
    const CURRENCY_DKK = 'DKK';
    const CURRENCY_EEK = 'EEK';
    const CURRENCY_EGP = 'EGP';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_GBP = 'GBP';
    const CURRENCY_HKD = 'HKD';
    const CURRENCY_HUF = 'HUF';
    const CURRENCY_ILS = 'ILS';
    const CURRENCY_INR = 'INR';
    const CURRENCY_IRR = 'IRR';
    const CURRENCY_ISK = 'ISK';
    const CURRENCY_JPY = 'JPY';
    const CURRENCY_KGS = 'KGS';
    const CURRENCY_KWD = 'KWD';
    const CURRENCY_KZT = 'KZT';
    const CURRENCY_LTL = 'LTL';
    const CURRENCY_LVL = 'LVL';
    const CURRENCY_MDL = 'MDL';
    const CURRENCY_NOK = 'NOK';
    const CURRENCY_NZD = 'NZD';
    const CURRENCY_PLN = 'PLN';
    const CURRENCY_RON = 'RON';
    const CURRENCY_RSD = 'RSD';
    const CURRENCY_RUB = 'RUB';
    const CURRENCY_SEK = 'SEK';
    const CURRENCY_SGD = 'SGD';
    const CURRENCY_TJS = 'TJS';
    const CURRENCY_TMT = 'TMT';
    const CURRENCY_TRY = 'TRY';
    const CURRENCY_UAH = 'UAH';
    const CURRENCY_USD = 'USD';
    const CURRENCY_UZS = 'UZS';

    /**
     * Currency constructor.
     *
     * @param string $currency Currency code.
     *
     * @throws \SoapFault
     * @throws \ABGEO\NBG\Exception\InvalidCurrencyException
     */
    public function __construct(string $currency)
    {
        // Check if given $currency exists.
        if (!defined('self::CURRENCY_' . strtoupper($currency))) {
            throw new InvalidCurrencyException($currency);
        }

        // Create Soap Client instance for $_API url.
        $this->_client = new SoapClient($this->_API);

        $this->_currency = $currency;

        // Get initial data from API.
        $this->_init();
    }

    /**
     * Get data from API and fill CurrencyData object.
     *
     * @return void
     */
    private function _init()
    {
        $currency = $this->_currency;
        $client = $this->_client;

        // Create \DateTime object from date string.
        $currencyDate = DateTime::createFromFormat(
            'Y-m-d',
            $client->GetDate($currency)
        );

        // Fill object with data from API.
        $this->setCurrency((float)$client->GetCurrency($currency))
            ->setDescription($client->GetCurrencyDescription($currency))
            ->setChange((float)$client->GetCurrencyChange($currency))
            ->setRate((int)$client->GetCurrencyRate($currency))
            ->setDate($currencyDate);
    }
}
