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

class ProcessingDetails extends RapidModel {

    /**
     * @return string
     */
    public function getAuthorisationCode()
    {
        return $this->authorisation_code;
    }

    /**
     * @param string $authorisation_code
     * @return $this
     */
    public function setAuthorisationCode($authorisation_code)
    {
        $this->authorisation_code = $authorisation_code;
        return $this;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getResponseMessage()
    {
        return $this->response_message;
    }

    /**
     * @param string $response_message
     * @return $this
     */
    public function setResponseMessage($response_message)
    {
        $this->response_message = $response_message;
        return $this;
    }
}