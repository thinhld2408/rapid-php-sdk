<?php
namespace Rapid;

use Rapid\Core\Constants;

class RapidApi {

    public function __construct($api_key, $api_password, $params = array())
    {

        if (strlen($api_key) === 0 || strlen($api_password) === 0) {
            die("Username and Password are required");
        }

        $this->api_key = $api_key;
        $this->api_password = $api_password;
        $this->url = Constants::REST_LIVE_ENDPOINT;
        $this->sandbox = false;

        if (count($params)) {
            if (isset($params['sandbox']) && $params['sandbox']) {
                $this->url = Constants::REST_SANDBOX_ENDPOINT;
                $this->sandbox = true;
            }
            if (isset($params['disable_ssl_verification'])
                && $params['disable_ssl_verification']
                && $this->sandbox == true
            ) {
                $this->disable_ssl_verify = true;
            }
        }
    }

    public function createSDKClient(){
        return new RapidSDKClient($this->api_key, $this->api_password, $this->url);
    }

}