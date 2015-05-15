<?php

/**
 * PHP version 5
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description Defines the possible types of shiping used for a transaction
 */

namespace Rapid\Type\Enumerated;


class ShippingMethod
{
    const UNKNOWN = 'unknown';
    const LOW_COST = 'low-cost';
    const DESIGNATED_BY_CUSTOMER = 'designated-by-customer';
    const INTERNATIONAL = 'international';
    const MILITARY = 'military';
    const NEXT_DAY = 'next-day';
    const STORE_PICKUP = 'store-pickup';
    const TWO_DAY_SERVICE = 'two-day-service';
    const THREE_DAY_SERVICE = 'three-day-service';
    const OTHER = 'other';
}