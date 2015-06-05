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

class RefundDetails extends RapidModel
{

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

    /**
     * @return mixed
     */
    public function getOriginalTransactionID()
    {
        return $this->original_transaction_iD;
    }

    /**
     * @param mixed $original_transaction_iD
     */
    public function setOriginalTransactionID($original_transaction_iD)
    {
        $this->original_transaction_iD = $original_transaction_iD;
    }

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->transaction_iD;
    }

    /**
     * @param mixed $transaction_iD
     */
    public function setTransactionID($transaction_iD)
    {
        $this->transaction_iD = $transaction_iD;
    }
}