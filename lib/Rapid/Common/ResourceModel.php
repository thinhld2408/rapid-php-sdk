<?php

namespace Rapid\Common;

use Rapid\Rest\ApiContext;
use Rapid\Rest\IResource;
use Rapid\Transport\RestCall;


/**
 * Class ResourceModel
 * An Executable RapidModel Class
 *
 * @property \Rapid\Api\Links[] links
 * @package Rapid\Common
 */
class ResourceModel extends RapidModel implements IResource
{

    /**
     * Sets Links
     *
     * @param \Rapid\Api\Links[] $links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Gets Links
     *
     * @return \Rapid\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    public function getLink($rel)
    {
        foreach ($this->links as $link) {
            if ($link->getRel() == $rel) {
                return $link->getHref();
            }
        }
        return null;
    }

    /**
     * Append Links to the list.
     *
     * @param \Rapid\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \Rapid\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }


    /**
     * Execute SDK Call to Rapid services
     *
     * @param string $url
     * @param string $method
     * @param string $payLoad
     * @param array $headers
     * @param ApiContext $apiContext
     * @param RestCall $restCall
     * @param array $handlers
     * @return string json response of the object
     */
    protected static function executeCall($url, $method, $payLoad, $headers = array(), $apiContext = null, $restCall = null, $handlers = array('Rapid\Handler\RestHandler'))
    {
        //Initialize the context and rest call object if not provided explicitly
        $apiContext = $apiContext ? $apiContext : new ApiContext(self::$credential);
        $restCall = $restCall ? $restCall : new RestCall($apiContext);

        //Make the execution call
        $json = $restCall->execute($handlers, $url, $method, $payLoad, $headers);
        return $json;
    }
}
