<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description 
 */

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Rapid\Auth\BasicAuthCredential;
use Rapid\Core\Constants;
use Rapid\Core\LoggingLevel;
use Rapid\Rest\ApiContext;

$api_context = new ApiContext(new BasicAuthCredential(
    'F9802Cv/5v0y/KmyxJR5ND7ujpSGeM9b3pytdI2UhI+sJzxcxxj0pPRjCpIixTc/IW2mw2',
    'Dung1234$'
));

$api_context->setConfig(
    array(
        'mode'             => Constants::MODE_SANDBOX,
        'log.LogEnabled'   => true,
        'log.FileName'     => '../rapid.log',
        'log.LogLevel'     => LoggingLevel::DEBUG,
        'validation.level' => 'log',
        // 'http.CURLOPT_CONNECTTIMEOUT' => 30
    )
);

return $api_context;