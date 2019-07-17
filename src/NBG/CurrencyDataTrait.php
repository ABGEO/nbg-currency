<?php
/**
 * Trait CurrencyDataTrait | src/NBG/CurrencyDataTrait.php
 *
 * PHP version 5
 *
 * @category Library
 * @package  ABGEO\NBG
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @version  GIT: $Id$.
 * @link     https://github.com/ABGEO07/nbg-currency
 */

namespace ABGEO\NBG;

/**
 * Trait CurrencyDataTrait
 *
 * @category Library
 * @package  ABGEO\NBG
 * @author   Temuri Takalandze <takalandzet@gmail.com>
 * @license  MIT https://github.com/ABGEO07/nbg-currency/blob/master/LICENSE
 * @link     https://github.com/ABGEO07/nbg-currency
 */
trait CurrencyDataTrait
{
    /**
     * Currency value from API.
     *
     * @var float
     */
    private $_currency;

    /**
     * Currency description from API.
     *
     * @var string
     */
    private $_description;

    /**
     * Currency change value from API.
     *
     * @var double
     */
    private $_change;

    /**
     * Currency change rate from API.
     *
     * Values:
     *      -1 - decreased
     *      0 - unchanged
     *      1 - increased
     *
     * @var int
     */
    private $_rate;

    /**
     * Currency date from API.
     *
     * @var \DateTime
     */
    private $_date;

    /**
     * Set Currency value.
     *
     * @param float $currency Currency value from API.
     *
     * @return \ABGEO\NBG\CurrencyDataTrait
     */
    protected function setCurrency(float $currency): self
    {
        $this->_currency = $currency;

        return $this;
    }

    /**
     * Get Currency value.
     *
     * @return float
     */
    public function getCurrency(): float
    {
        return $this->_currency;
    }

    /**
     * Set Currency description.
     *
     * @param string $description Currency description from API.
     *
     * @return \ABGEO\NBG\CurrencyDataTrait
     */
    protected function setDescription(string $description): self
    {
        $this->_description = $description;

        return $this;
    }

    /**
     * Get Currency description.
     *
     * @return string Currency description.
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * Set Currency change rate.
     *
     * @param float $change Currency change rate.
     *
     * @return \ABGEO\NBG\CurrencyDataTrait
     */
    protected function setChange(float $change): self
    {
        $this->_change = $change;

        return $this;
    }

    /**
     * Get Currency change rate.
     *
     * @return float Currency change rate.
     */
    public function getChange(): float
    {
        return $this->_change;
    }

    /**
     * Set Currency change rate.
     *
     * @param int $rate Currency change rate.
     *
     * @return \ABGEO\NBG\CurrencyDataTrait
     */
    protected function setRate(int $rate): self
    {
        $this->_rate = $rate;

        return $this;
    }

    /**
     * Get Currency change rate.
     *
     * @return int Currency change rate.
     */
    public function getRate(): int
    {
        return $this->_rate;
    }

    /**
     * Set Currency date.
     *
     * @param \DateTime $date Currency date.
     *
     * @return \ABGEO\NBG\CurrencyDataTrait
     */
    protected function setDate(\DateTime $date): self
    {
        $this->_date = $date;

        return $this;
    }

    /**
     * Get Currency date.
     *
     * @return \DateTime Currency date.
     */
    public function getDate(): \DateTime
    {
        return $this->_date;
    }
}
