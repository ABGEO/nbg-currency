<?php

namespace ABGEO\NBG;

/**
 * Trait CurrencyDataTrait
 *
 * @package ABGEO\NBG
 */
trait CurrencyDataTrait
{
    private $_currency;

    private $_description;

    private $_change;

    private $_rate;

    private $_date;

    protected function setCurrency($currency): self
    {
        $this->_currency = $currency;

        return $this;
    }

    public function getCurrency()
    {
        return $this->_currency;
    }

    protected function setDescription($description): self
    {
        $this->_description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    protected function setChange($change): self
    {
        $this->_change = $change;

        return $this;
    }

    public function getChange()
    {
        return $this->_change;
    }

    protected function setRate($rate): self
    {
        $this->_rate = $rate;

        return $this;
    }

    public function getRate()
    {
        return $this->_rate;
    }

    protected function setDate(\DateTime $date): self
    {
        $this->_date = $date;

        return $this;
    }

    public function getDate(): \DateTime
    {
        return $this->_date;
    }
}
