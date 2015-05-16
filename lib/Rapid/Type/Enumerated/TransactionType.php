<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description This defines the type of the transaction, it is a very close mapping to the bank accepted types, note the types Refund and Auth are missing as they are handled using dedicated requests.
 */

namespace Rapid\Type\Enumerated;


class TransactionType {
    const PURCHASE = 'purchase';
    const RECURRING = 'recurring';
    const MOTO = 'moto';
}