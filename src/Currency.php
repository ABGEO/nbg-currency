<?php
/**
 * Class Currency | src/Currency.php
 *
 * @category Library
 * @package  ABGEO\NBG
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @link     https://github.com/ABGEO07/nbg-currency
 */

namespace ABGEO\NBG;

use ABGEO\NBG\Exception\InvalidCurrencyException;
use DateTime;
use SoapClient;
use SoapFault;

/**
 * Class Currency
 * @package ABGEO\NBG
 */
class Currency
{
    /**
     * Current Currency object.
     *
     * @var Model\Currency
     */
    private $currency;

    const API_URL = 'http://nbg.gov.ge/currency.wsdl';

    /**
     * Currency constructor.
     *
     * @param string $currencyCode Currency code.
     *
     * @throws SoapFault
     * @throws InvalidCurrencyException
     */
    public function __construct(string $currencyCode)
    {
        if (!defined('\ABGEO\NBG\Helper\CurrencyCodes::'.strtoupper($currencyCode))) {
            throw new InvalidCurrencyException($currencyCode);
        }

        $this->init($currencyCode);
    }

    /**
     * Get data from API and fill Currency model for given Currency Code.
     *
     * @param string $currencyCode Currency code.
     *
     * @return void
     *
     * @throws SoapFault
     */
    private function init(string $currencyCode)
    {
        $client = new SoapClient(self::API_URL);

        $currencyDate = DateTime::createFromFormat(
            'Y-m-d',
            $client->GetDate($currencyCode)
        );

        $this->currency = (new Model\Currency())
            ->setCurrency((float)$client->GetCurrency($currencyCode))
            ->setDescription($client->GetCurrencyDescription($currencyCode))
            ->setChange((float)$client->GetCurrencyChange($currencyCode))
            ->setRate((int)$client->GetCurrencyRate($currencyCode))
            ->setDate($currencyDate);
    }

    /**
     * Get Currency Value.
     *
     * @return float
     */
    public function getCurrency(): float
    {
        return $this->currency
            ->getCurrency();
    }

    /**
     * Get Currency Description.
     *
     * @return string Currency Description.
     */
    public function getDescription(): string
    {
        return $this->currency
            ->getDescription();
    }

    /**
     * Get Currency Change Value.
     *
     * @return float Currency Change Value.
     */
    public function getChange(): float
    {
        return $this->currency
            ->getChange();
    }

    /**
     * Get Currency change rate.
     *
     * @return int Currency change rate.
     */
    public function getRate(): int
    {
        return $this->currency
            ->getRate();
    }

    /**
     * Get Currency date.
     *
     * @return DateTime Currency date.
     */
    public function getDate(): DateTime
    {
        return $this->currency
            ->getDate();
    }
}
