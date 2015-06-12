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
    const MSG_DIR = 'Messages';
    private $_messages = array();

    /**
     * @return mixed
     */
    public function getErrors()
    {
        $errors = array();
        if(count($this->errors) > 0) {
            foreach ($this->errors as $code) {
                if (isset($this->_messages[$code])) {
                    $errors[$code] = $this->_messages[$code];
                }
            }
        }
        return $errors;
    }

    /**
     * @param string $errors
     * @return $this
     */
    public function setErrors($errors)
    {
        $tmp = array();
        $this->errors = array();
        $errors = array_filter(array_map('trim', explode(',', $errors)));

        if(count($errors) > 0){
            foreach ($errors as $code) {
                $tmp[$code] = $code;
            }
        }

        $this->errors = array_merge($this->errors, $tmp);
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
     * @param string $response_code
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
        return isset($this->_messages[$this->response_message])
            ? $this->_messages[$this->response_message]
            : $this->response_message;
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
     * @param string $lang
     * @return string
     */
    private function getMessages($lang = 'EN')
    {
        $ds = DIRECTORY_SEPARATOR;
        $lang = trim(strtolower($lang));
        $path = str_replace('Type' . $ds . 'Response', self::MSG_DIR, __DIR__) . $ds;
        $file_path = $path . $lang . '.ini';

        if (file_exists($file_path)) {
            $messages = parse_ini_file($file_path);
        } else {
            $messages = parse_ini_file($path . 'en.ini');
        }
        return $messages;
    }

    /**
     * @param $lang
     * @return $this
     */
    public function prepareMessages($lang)
    {
        $this->_messages = $this->getMessages($lang);
        return $this;
    }

}