<?php
/**
 * API handler for all REST API calls
 */

namespace Rapid\Handler;

use Rapid\Auth\OAuthTokenCredential;
use Rapid\Common\UserAgent;
use Rapid\Core\Constants;
use Rapid\Core\CredentialManager;
use Rapid\Core\HttpConfig;
use Rapid\Exception\ConfigurationException;
use Rapid\Exception\InvalidCredentialException;
use Rapid\Exception\MissingCredentialException;

/**
 * Class RestHandler
 */
class RestHandler implements IHandler
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

        $credential = $this->apiContext->getCredential();
        $config = $this->apiContext->getConfig();

        if ($credential == null) {
            // Try picking credentials from the config file
            $credMgr = CredentialManager::getInstance($config);
            $credValues = $credMgr->getCredentialObject();

            if (!is_array($credValues)) {
                throw new MissingCredentialException("Empty or invalid credentials passed");
            }

            $credential = new OAuthTokenCredential($credValues['clientId'], $credValues['clientSecret']);
        }

        if ($credential == null || !($credential instanceof OAuthTokenCredential)) {
            throw new InvalidCredentialException("Invalid credentials passed");
        }

        $httpConfig->setUrl(
            rtrim(trim($this->_getEndpoint($config)), '/') .
            (isset($options['path']) ? $options['path'] : '')
        );

        if (!array_key_exists("User-Agent", $httpConfig->getHeaders())) {
            $httpConfig->addHeader("User-Agent", UserAgent::getValue(Constants::SDK_NAME, Constants::SDK_VERSION));
        }

        if (!is_null($credential) && $credential instanceof OAuthTokenCredential && is_null($httpConfig->getHeader('Authorization'))) {
            $httpConfig->addHeader('Authorization', "Bearer " . $credential->getAccessToken($config), false);
        }

        if ($httpConfig->getMethod() == 'POST' || $httpConfig->getMethod() == 'PUT') {
            $httpConfig->addHeader('Rapid-Request-Id', $this->apiContext->getRequestId());
        }
        // Add any additional Headers that they may have provided
        $headers = $this->apiContext->getRequestHeaders();
        foreach ($headers as $key => $value) {
            $httpConfig->addHeader($key, $value);
        }
    }

    /**
     * End Point
     *
     * @param array $config
     *
     * @return string
     * @throws \Rapid\Exception\ConfigurationException
     */
    private function _getEndpoint($config)
    {
        if (isset($config['service.EndPoint'])) {
            return $config['service.EndPoint'];
        } else if (isset($config['mode'])) {
            switch (strtoupper($config['mode'])) {
                case 'SANDBOX':
                    return Constants::REST_SANDBOX_ENDPOINT;
                    break;
                case 'LIVE':
                    return Constants::REST_LIVE_ENDPOINT;
                    break;
                default:
                    throw new ConfigurationException('The mode config parameter must be set to either sandbox/live');
                    break;
            }
        } else {
            // Defaulting to Sandbox
            return Constants::REST_SANDBOX_ENDPOINT;
        }
    }
}
