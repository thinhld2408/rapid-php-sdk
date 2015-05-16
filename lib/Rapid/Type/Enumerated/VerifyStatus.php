<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description Possible values returned from the payment providers with regards to verification of card/user details
 */

namespace Rapid\Type\Enumerated;


class VerifyStatus
{
    const UNCHECKED = 'unchecked';
    const VALID = 'valid';
    const INVALID = 'invalid';
}