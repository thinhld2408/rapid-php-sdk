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
use Rapid\Type\Regular\Transaction;
use Rapid\Type\Regular\TransactionStatus;

class QueryTransactionResponse extends RapidModel {

    /**
     * @return mixed
     */
    public function getAccessCode()
    {
        return $this->access_code;
    }

    /**
     * @param mixed $access_code
     * @return $this
     */
    public function setAccessCode($access_code)
    {
        $this->access_code = $access_code;
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
        $this->transaction_status = $transaction_status;
        if ($transaction_status instanceof TransactionStatus) {
            $this->transaction_status = $transaction_status;
        } else {
            $this->transaction_status = new TransactionStatus($transaction_status);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param mixed $transaction
     * @return $this
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
        if ($transaction instanceof Transaction) {
            $this->transaction = $transaction;
        } else {
            $this->transaction = new Transaction($transaction);
        }
        return $this;
    }

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
}