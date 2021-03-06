<?php
/**
 * Class InvalidCurrencyException | src/Exception/InvalidCurrencyException.php
 *
 * @category Exception
 * @package  ABGEO\NBG\Exception
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @link     https://github.com/ABGEO07/nbg-currency
 */

namespace ABGEO\NBG\Exception;

use Exception;

/**
 * Class InvalidCurrencyException
 * @package ABGEO\NBG\Exception
 */
class InvalidCurrencyException extends Exception
{
    /**
     * InvalidCurrencyException constructor.
     *
     * @param string     $currency Invalid currency code.
     * @param int        $code     [optional] The Exception code.
     * @param Exception $previous [optional] The previous throwable
     *                             used for the exception chaining.
     */
    public function __construct($currency, $code = 0, Exception $previous = null)
    {
        $message = 'Currency "' . $currency . '" does not exists!';

        parent::__construct($message, $code, $previous);
    }

    /**
     * Convert exception to string.
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
