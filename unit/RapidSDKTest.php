<?php

namespace Testing;

use PHPUnit_Framework_TestCase;
use Rapid\RapidSDK;

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */
class RapidSDKTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param $api_key
     * @param $api_password
     * @dataProvider additionProvider
     */
    public function testCreateClient($api_key, $api_password)
    {
        $rapidSDK = new RapidSDK();
        $client = $rapidSDK->createSDKClient($api_key, $api_password);
        $this->assertInstanceOf('Rapid\RapidSDKClient', $client);
    }

    /**
     * @return array
     */
    function additionProvider()
    {
        return array(
            array('', ''),
            array('abc', 'xyz'),
            array(true, true),
            array(null, null),
            array('F9802Cv/5v0y/KmyxJR5ND7ujpSGeM9b3pytdI2UhI+sJzxcxxj0pPRjCpIixTc/IW2mw2', 'Dung1234$'),
        );
    }

    
}