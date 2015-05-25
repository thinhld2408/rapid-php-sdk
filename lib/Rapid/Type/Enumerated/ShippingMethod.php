<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description Defines the possible types of shiping used for a transaction
 */

namespace Rapid\Type\Enumerated;


class ShippingMethod
{
    const UNKNOWN = 'Unknown';
    const LOW_COST = 'LowCost';
    const DESIGNATED_BY_CUSTOMER = 'DesignatedByCustomer';
    const INTERNATIONAL = 'International';
    const MILITARY = 'Military';
    const NEXT_DAY = 'NextDay';
    const STORE_PICKUP = 'StorePickup';
    const TWO_DAY_SERVICE = 'TwoDayService';
    const THREE_DAY_SERVICE = 'ThreeDayService';
    const OTHER = 'Other';
}