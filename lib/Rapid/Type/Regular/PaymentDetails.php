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
use Rapid\Validation\ArgumentValidator;

class PaymentDetails extends RapidModel {

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * @param mixed $total_amount
     * @return $this
     */
    public function setTotalAmount($total_amount)
    {
        ArgumentValidator::validate($total_amount, 'Total Amount');
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * @param mixed $invoice_number
     * @return $this
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->invoice_number = $invoice_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceDescription()
    {
        return $this->invoice_description;
    }

    /**
     * @param mixed $invoice_description
     * @return $this
     */
    public function setInvoiceDescription($invoice_description)
    {
        $this->invoice_description = $invoice_description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceReference()
    {
        return $this->invoice_reference;
    }

    /**
     * @param mixed $invoice_reference
     * @return $this
     */
    public function setInvoiceReference($invoice_reference)
    {
        $this->invoice_reference = $invoice_reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currency_code;
    }

    /**
     * @param mixed $currency_code
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->currency_code = $currency_code;
        return $this;
    }
}