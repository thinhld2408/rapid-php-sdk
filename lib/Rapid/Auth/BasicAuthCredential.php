<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Auth;


use Rapid\Common\ResourceModel;
use Rapid\Core\LoggingManager;

class BasicAuthCredential extends ResourceModel implements ICredential
{
    private $api_key;
    private $api_password;

    public static $AUTH_HANDLER = 'Rapid\Handler\BasicAuthHandler';

    /**
     * @param $api_key
     * @param $api_password
     */
    public function __construct($api_key, $api_password)
    {
        $this->api_key = $api_key;
        $this->api_password = $api_password;
        $this->logger = LoggingManager::getInstance(__CLASS__);
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param mixed $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @return mixed
     */
    public function getApiPassword()
    {
        return $this->api_password;
    }

    /**
     * @param mixed $api_password
     */
    public function setApiPassword($api_password)
    {
        $this->api_password = $api_password;
    }

    function getAuthHandler()
    {
        // TODO: Implement getAuthHandler() method.
        return self::$AUTH_HANDLER;
    }
}