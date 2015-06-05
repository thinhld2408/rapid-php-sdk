<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Handler;


use Rapid\Common\UserAgent;
use Rapid\Core\Constants;

class BasicAuthHandler implements IHandler
{
    protected $api_key;
    protected $api_password;

    /**
     * Private Variable
     *
     * @var \Rapid\Rest\ApiContext $apiContext
     */
    private $apiContext;

    /**
     * Construct
     *
     * @param \Rapid\Rest\ApiContext $apiContext
     */
    public function __construct($apiContext)
    {
        $this->apiContext = $apiContext;
    }

    /**
     * @param HttpConfig $httpConfig
     * @param string $request
     * @param mixed $options
     * @return mixed|void
     * @throws ConfigurationException
     * @throws InvalidCredentialException
     * @throws MissingCredentialException
     */
    public function handle($httpConfig, $request, $options)
    {
        $config = $this->apiContext->getConfig();
        $credential = $this->apiContext->getCredential();


        $headers = array(
            "User-Agent"    => UserAgent::getValue(Constants::SDK_NAME, Constants::SDK_VERSION),
            "Authorization" => "Basic " . base64_encode($credential->getApiKey() . ":" . $credential->getApiPassword()),
            "Accept"        => "*/*"
        );
        $httpConfig->setHeaders($headers);

        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();
        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
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
}