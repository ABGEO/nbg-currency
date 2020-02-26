<?php
/**
 * Class CurrencyCodes | src/Helper/CurrencyCodes.php
 *
 * @category Helper
 * @package  ABGEO\NBG\Helper
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @link     https://github.com/ABGEO07/nbg-currency
 */

namespace ABGEO\NBG\Helper;

use Exception;

/**
 * Class CurrencyCodes.
 * @package ABGEO\NBG\Helper
 */
final class CurrencyCodes
{
    const AED = 'AED';
    const AMD = 'AMD';
    const AUD = 'AUD';
    const AZN = 'AZN';
    const BGN = 'BGN';
    const BYR = 'BYR';
    const CAD = 'CAD';
    const CHF = 'CHF';
    const CNY = 'CNY';
    const CZK = 'CZK';
    const DKK = 'DKK';
    const EEK = 'EEK';
    const EGP = 'EGP';
    const EUR = 'EUR';
    const GBP = 'GBP';
    const HKD = 'HKD';
    const HUF = 'HUF';
    const ILS = 'ILS';
    const INR = 'INR';
    const IRR = 'IRR';
    const ISK = 'ISK';
    const JPY = 'JPY';
    const KGS = 'KGS';
    const KWD = 'KWD';
    const KZT = 'KZT';
    const LTL = 'LTL';
    const LVL = 'LVL';
    const MDL = 'MDL';
    const NOK = 'NOK';
    const NZD = 'NZD';
    const PLN = 'PLN';
    const RON = 'RON';
    const RSD = 'RSD';
    const RUB = 'RUB';
    const SEK = 'SEK';
    const SGD = 'SGD';
    const TJS = 'TJS';
    const TMT = 'TMT';
    const TRY = 'TRY';
    const UAH = 'UAH';
    const USD = 'USD';
    const UZS = 'UZS';

    /**
     * CurrencyCodes constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        throw new Exception("Can't get an instance of CurrencyCodes");
    }
}
