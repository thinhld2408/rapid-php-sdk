<?php
namespace Rapid;

use Rapid\Core\Constants;

class RapidSDK
{

    protected $configs = array();

    public function __construct($configs = array())
    {
        $this->configs = $configs;
    }

    /**
     * @param $api_key
     * @param $api_password
     * @return RapidSDKClient
     */
    public function createSDKClient($api_key, $api_password)
    {
        $configs = $this->configs;
        $mode = Constants::MODE_SANDBOX;

        if (isset($configs['mode'])) {
            $mode = $configs['mode'];
        }

        return new RapidSDKClient($api_key, $api_password, $mode, $configs);
    }

}