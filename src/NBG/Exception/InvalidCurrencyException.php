<?php

namespace ABGEO\NBG\Exception;

use Exception;

/**
 * Class InvalidCurrencyException
 *
 * @package ABGEO\NBG\Exception
 */
class InvalidCurrencyException extends \Exception
{
    public function __construct($currency, $code = 0, Exception $previous = null)
    {
        $message = 'Currency "' . $currency . '" does not exists!';

        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}