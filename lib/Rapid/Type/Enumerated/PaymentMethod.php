<?php

/**
 * PHP version 5
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description This defines what method will be used by the transaction to determine the credit card used to process the transaction.
 */

namespace Rapid\Type\Enumerated;


class PaymentMethod {
    const DIRECT = 'direct';
    const RESPONSIVE_SHARE = 'responsive-shared';
    const TRANSPARENT_REDIRECT = 'transparent-redirect';
    const WALLET = 'WALLET';
    const AUTHORISATION = 'authorisation';
}