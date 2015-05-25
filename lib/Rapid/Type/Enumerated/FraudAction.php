<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description Defines the possible actions that may have been taken when/if an anti­fraud rule on the account has been triggered.
 */

namespace Rapid\Type\Enumerated;


class FraudAction
{
    const NOT_CHALLENGED    = 'NotChallenged';
    const ALLOW             = 'Allow';
    const REVIEW            = 'Review';
    const PRE_AUTH          = 'PreAuth';
    const PROCESSED         = 'Processed';
    const APPROVED          = 'Approved';
    const BLOCK             = 'Block';
}