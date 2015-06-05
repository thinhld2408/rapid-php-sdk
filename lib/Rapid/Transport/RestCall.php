<?php
namespace Rapid\Transport;

use Rapid\Auth\ICredential;
use Rapid\Core\LoggingManager;
use Rapid\Core\HttpConfig;
use Rapid\Core\HttpConnection;
use Rapid\Rest\ApiContext;

/**
 * Class RestCall
 *
 * @package Rapid\Transport
 */
class RestCall
{


    /**
     * Rapid Logger
     *
     * @var LoggingManager logger interface
     */
    private $logger;

    /**
     * API Context
     *
     * @var ApiContext
     */
    private $apiContext;


    /**
     * Default Constructor
     *
     * @param ApiContext $apiContext
     */
    public function __construct(ApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
        $this->logger = LoggingManager::getInstance(__CLASS__);
    }

    /**
     * @param array  $handlers Array of handlers
     * @param string $path     Resource path relative to base service endpoint
     * @param string $method   HTTP method - one of GET, POST, PUT, DELETE, PATCH etc
     * @param string $data     Request payload
     * @param array  $headers  HTTP headers
     * @return mixed
     * @throws \Rapid\Exception\ConnectionException
     */
    public function execute($handlers = array(), $path, $method, $data = '', $headers = array())
    {

        $config = $this->apiContext->getConfig();
        $credential = $this->apiContext->getCredential();

        $httpConfig = new HttpConfig(null, $method, $config);
        $headers = $headers ? $headers : array();

        if($credential instanceof ICredential){
            if(!in_array($credential->getAuthHandler(), $handlers)){
                array_unshift($handlers, $credential->getAuthHandler());
            }
        }

        /** @var \Rapid\Handler\IHandler $handler */
        foreach ($handlers as $handler) {
            if (!is_object($handler)) {
                $fullHandler = "\\" . (string)$handler;
                $handler = new $fullHandler($this->apiContext);
            }
            $handler->handle($httpConfig, $data, array('path' => $path, 'apiContext' => $this->apiContext));
        }

        $httpConfig->addHeader('Content-Type', 'application/json');
        if(count($headers) > 0){
            foreach($headers as $k => $header){
                $httpConfig->addHeader($k, $header, false);
            }
        }

        $connection = new HttpConnection($httpConfig, $config);
        $response = $connection->execute($data);

        return $response;
    }

}
