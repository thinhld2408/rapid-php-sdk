<?php

namespace Rapid\Handler;

/**
 * Interface IHandler
 *
 * @package Rapid\Handler
 */
interface IHandler
{
    /**
     *
     * @param \Rapid\Core\HttpConfig $httpConfig
     * @param string $request
     * @param mixed $options
     * @return mixed
     */
    public function handle($httpConfig, $request, $options);
}
