<?php
/**
 * API handler for OAuth Token Request REST API calls
 */

namespace Rapid\Handler;

use Rapid\Common\UserAgent;
use Rapid\Core\Constants;
use Rapid\Core\HttpConfig;
use Rapid\Exception\ConfigurationException;
use Rapid\Exception\InvalidCredentialException;
use Rapid\Exception\MissingCredentialException;

/**
 * Class OauthHandler
 */
class OauthHandler implements IHandler
{
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
     * @param string                    $request
     * @param mixed                     $options
     * @return mixed|void
     * @throws ConfigurationException
     * @throws InvalidCredentialException
     * @throws MissingCredentialException
     */
    public function handle($httpConfig, $request, $options)
    {
        $config = $this->apiContext->getConfig();

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );

        $headers = array(
            "User-Agent"    => UserAgent::getValue(Constants::SDK_NAME, Constants::SDK_VERSION),
            "Authorization" => "Basic " . base64_encode($options['clientId'] . ":" . $options['clientSecret']),
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
     * Get HttpConfiguration object for OAuth API
     *
     * @param array $config
     *
     * @return HttpConfig
     * @throws \Rapid\Exception\ConfigurationException
     */
    private static function _getEndpoint($config)
    {
        if (isset($config['oauth.EndPoint'])) {
            $baseEndpoint = $config['oauth.EndPoint'];
        } else if (isset($config['service.EndPoint'])) {
            $baseEndpoint = $config['service.EndPoint'];
        } else if (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    $baseEndpoint = Constants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    $baseEndpoint = Constants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new ConfigurationException('The mode config parameter must be set to either sandbox/live');
            }
        } else {
            // Defaulting to Sandbox
            $baseEndpoint = Constants::REST_SANDBOX_ENDPOINT;
        }

        $baseEndpoint = rtrim(trim($baseEndpoint), '/') . "/v1/oauth2/token";

        return $baseEndpoint;
    }
}
