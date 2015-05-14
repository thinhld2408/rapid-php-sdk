<?php

namespace Rapid\Exception;

/**
 * Class ConfigurationException
 *
 * @package Rapid\Exception
 */
class ConfigurationException extends \Exception
{

    /**
     * Default Constructor
     *
     * @param string|null $message
     * @param int  $code
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
