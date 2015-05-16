<?php
/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description 
 */

namespace Rapid\Type\Response;

use Rapid\Common\RapidModel;
use Rapid\Type\Regular\Refund;
use Rapid\Type\Regular\TransactionStatus;

class RefundResponse extends RapidModel {

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     * @return $this
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param mixed $refund
     * @return $this
     */
    public function setRefund($refund)
    {
        if ($refund instanceof Refund) {
            $this->refund = $refund;
        } else {
            $this->refund = new Refund($refund);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionStatus()
    {
        return $this->transaction_status;
    }

    /**
     * @param mixed $transaction_status
     * @return $this
     */
    public function setTransactionStatus($transaction_status)
    {
        if ($transaction_status instanceof TransactionStatus) {
            $this->transaction_status = $transaction_status;
        } else {
            $this->transaction_status = new TransactionStatus($transaction_status);
        }
        return $this;
    }

}