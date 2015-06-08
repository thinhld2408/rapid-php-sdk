<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Type\Regular;

use Rapid\Common\RapidModel;

class CardDetails extends RapidModel
{

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiryMonth()
    {
        return $this->expiry_month;
    }

    /**
     * @param string $expiry_month
     * @return $this
     */
    public function setExpiryMonth($expiry_month)
    {
        $this->expiry_month = $expiry_month;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiryYear()
    {
        return $this->expiry_year;
    }

    /**
     * @param string $expiry_year
     * @return $this
     */
    public function setExpiryYear($expiry_year)
    {
        $this->expiry_year = $expiry_year;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartMonth()
    {
        return $this->start_month;
    }

    /**
     * @param string $start_month
     * @return $this
     */
    public function setStartMonth($start_month)
    {
        $this->start_month = $start_month;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartYear()
    {
        return $this->start_year;
    }

    /**
     * @param string $start_year
     * @return $this
     */
    public function setStartYear($start_year)
    {
        $this->start_year = $start_year;
        return $this;
    }

    /**
     * @return string
     */
    public function getIssueNumber()
    {
        return $this->issue_number;
    }

    /**
     * @param string $issue_number
     * @return $this
     */
    public function setIssueNumber($issue_number)
    {
        $this->issue_number = $issue_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getCvn()
    {
        return $this->cvn;
    }

    /**
     * @param string $cvn
     * @return $this
     */
    public function setCvn($cvn)
    {
        $this->cvn = $cvn;
        return $this;
    }
}