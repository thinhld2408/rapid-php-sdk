<?php
/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Type\Response;

use Rapid\Type\Regular\Customer;

class QueryCustomerResponse extends AbstractResponse
{
    /**
     * @return mixed
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param mixed $customers
     * @return $this
     */
    public function setCustomers($customers)
    {
        $tmp = array();
        $this->customers = array();
        $class = 'Rapid\Type\Regular\Customer';
        if (count($customers) > 0) {
            foreach ($customers as $item) {
                if ($item instanceof $class) {
                    $tmp[] = $item;
                } else {
                    $tmp[] = new Customer($item);
                }
            }
        }
        $this->customers = array_merge($this->customers, $tmp);
        return $this;
    }
}