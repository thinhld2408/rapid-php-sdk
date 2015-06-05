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

use Rapid\Common\ResourceModel;
use Rapid\Type\Regular\TransactionStatus;
use Rapid\Type\Regular\VerificationResult;

abstract class AbstractResponse extends ResourceModel
{
    private $_str_errors = '';
    private $errors = array();

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
        //$this->_str_errors = $errors;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorisationCode()
    {
        return $this->authorisation_code;
    }

    /**
     * @param mixed $authorisation_code
     */
    public function setAuthorisationCode($authorisation_code)
    {
        $this->authorisation_code = $authorisation_code;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->response_code;
    }

    /**
     * @param mixed $response_code
     * @return $this
     */
    public function setResponseCode($response_code)
    {
        $this->response_code = $response_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseMessage()
    {
        return $this->response_message;
    }

    /**
     * @param mixed $response_message
     * @return $this
     */
    public function setResponseMessage($response_message)
    {
        $this->response_message = $response_message;
        return $this;
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
     * @return $this
     */
    public function setTransactionID($transaction_iD)
    {
        $this->transaction_iD = $transaction_iD;
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

    /**
     * @return mixed
     */
    public function getVerification()
    {
        return $this->verification;
    }

    /**
     * @param mixed $verification
     * @return $this
     */
    public function setVerification($verification)
    {
        if ($verification instanceof VerificationResult) {
            $this->verification = $verification;
        } else {
            $this->verification = new VerificationResult($verification);
        }
        return $this;
    }

    /**
     * @param $api_context
     * @param array $codes
     * @param string $lang
     * @return string
     */
    private function getMessages($api_context, $codes = array(), $lang = 'EN')
    {
        $data = array(
            "Language"   => $lang,
            "ErrorCodes" => $codes,
        );

        $payLoad = json_encode($data);

        $json = self::executeCall(
            "/staging-au/CodeLookup",
            "POST",
            $payLoad,
            null,
            $api_context,
            null
        );

        return json_decode($json, true);
    }

    /**
     * @param $api_context
     * @param $lang
     * @return $this
     */
    public function prepareMessages($api_context, $lang)
    {
        $codes = array_filter(explode(',', $this->_str_errors));

        if (count($codes) > 0) {
            $data = $this->getMessages($api_context, $codes, $lang);
            if (isset($data['CodeDetails']) && count($data['CodeDetails']) > 0) {
                foreach ($data['CodeDetails'] as $code) {
                    $this->errors[$code['ErrorCode']] = $code['DisplayMessage'];
                }
            }
        }
        return $this;
    }

}