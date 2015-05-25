<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description These types are used inside requests, responses and complex types
 */

namespace Rapid\Type\Enumerated;


class BeagleVerifyStatus
{
    const NOT_VERIFIED = 'NotVerified';
    const ATTEMPTED = 'Attempted';
    const VERIFIED = 'Verified';
    const FAILED = 'Failed';
}