<?php

/**
 * PHP version 5
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description 
 */

namespace Rapid\Type\Regular;

use Rapid\Common\RapidModel;

class TransactionStatus extends RapidModel {

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->transaction_ID;
    }

    /**
     * @param mixed $transaction_ID
     */
    public function setTransactionID($transaction_ID)
    {
        $this->transaction_ID = $transaction_ID;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCaptured()
    {
        return $this->captured;
    }

    /**
     * @param mixed $captured
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;
    }

    /**
     * @return mixed
     */
    public function getBeagleScore()
    {
        return $this->beagle_score;
    }

    /**
     * @param mixed $beagle_score
     */
    public function setBeagleScore($beagle_score)
    {
        $this->beagle_score = $beagle_score;
    }

    /**
     * @return mixed
     */
    public function getFraudAction()
    {
        return $this->fraud_action;
    }

    /**
     * @param mixed $fraud_action
     */
    public function setFraudAction($fraud_action)
    {
        $this->fraud_action = $fraud_action;
    }

    /**
     * @return mixed
     */
    public function getVerificationResult()
    {
        return $this->verification_result;
    }

    /**
     * @param mixed $verification_result
     */
    public function setVerificationResult($verification_result)
    {
        if($verification_result instanceof VerificationResult){
            $this->verification_result = $verification_result;
        }else{
            $this->verification_result = new VerificationResult($verification_result);
        }
    }

    /**
     * @return mixed
     */
    public function getProcessingDetails()
    {
        return $this->processing_details;
    }

    /**
     * @param mixed $processing_details
     */
    public function setProcessingDetails($processing_details)
    {
        if($processing_details instanceof ProcessingDetails){
            $this->processing_details = $processing_details;
        }else{
            $this->processing_details = new ProcessingDetails($processing_details);
        }
    }
}