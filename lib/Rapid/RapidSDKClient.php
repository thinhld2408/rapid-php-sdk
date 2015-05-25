<?php
/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid;


use Rapid\Common\ResourceModel;

class RapidSDKClient extends ResourceModel{

    protected $api_context;
    protected $is_valid;
    protected $error_codes;
    protected $rapid_endpoint;

    /**
     * @param $api_key
     * @param $api_password
     */
    public function setCredentials($api_key, $api_password)
    {

    }

    /**
     * @return mixed
     */
    public function getApiContext()
    {
        return $this->api_context;
    }

    /**
     * @param mixed $api_context
     */
    public function setApiContext($api_context)
    {
        $this->api_context = $api_context;
    }

    /**
     * @return mixed
     */
    public function getIsValid()
    {
        return $this->is_valid;
    }

    /**
     * @param mixed $is_valid
     */
    public function setIsValid($is_valid)
    {
        $this->is_valid = $is_valid;
    }

    /**
     * @return mixed
     */
    public function getErrorCodes()
    {
        return $this->error_codes;
    }

    /**
     * @param mixed $error_codes
     */
    public function setErrorCodes($error_codes)
    {
        $this->error_codes = $error_codes;
    }

    /**
     * @return mixed
     */
    public function getRapidEndpoint()
    {
        return $this->rapid_endpoint;
    }

    /**
     * @param mixed $rapid_endpoint
     */
    public function setRapidEndpoint($rapid_endpoint)
    {
        $this->rapid_endpoint = $rapid_endpoint;
    }

}