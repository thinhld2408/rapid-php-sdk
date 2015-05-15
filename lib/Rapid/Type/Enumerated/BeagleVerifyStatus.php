<?php

/**
 * PHP version 5
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description These types are used inside requests, responses and complex types
 */

namespace Rapid\Type\Enumerated;


class BeagleVerifyStatus
{
    const NOT_VERIFIED = 'not-verified';
    const ATTEMPTED = 'attempted';
    const VERIFIED = 'verified';
    const FAILED = 'failed';
}