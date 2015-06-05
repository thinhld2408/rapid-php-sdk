<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Type\Regular;

use Rapid\Common\RapidModel;

class Refund extends RapidModel
{
    protected $line_items = array();

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        if ($customer instanceof Customer) {
            $this->customer = $customer;
        } else {
            $this->customer = new Customer($customer);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress()
    {
        return $this->shipping_details;
    }

    /**
     * @param mixed $shipping_details
     * @return $this
     */
    public function setShippingAddress($shipping_details)
    {
        if ($shipping_details instanceof ShippingDetails) {
            $this->shipping_details = $shipping_details;
        } else {
            $this->shipping_details = new ShippingDetails($shipping_details);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @param mixed $refund_details
     * @return $this
     */
    public function setRefund($refund_details)
    {
        if ($refund_details instanceof RefundDetails) {
            $this->refund = $refund_details;
        } else {
            $this->refund = new RefundDetails($refund_details);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->line_items;
    }

    /**
     * @param array $line_items
     * @return $this
     */
    public function setItems($line_items)
    {
        if (count($line_items) > 0) {
            foreach ($line_items as $item) {
                $this->line_items[] = new LineItem($item);
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeviceID()
    {
        return $this->device_ID;
    }

    /**
     * @param mixed $device_ID
     * @return $this
     */
    public function setDeviceID($device_ID)
    {
        $this->device_ID = $device_ID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartnerID()
    {
        return $this->partner_ID;
    }

    /**
     * @param mixed $partner_ID
     * @return $this
     */
    public function setPartnerID($partner_ID)
    {
        $this->partner_ID = $partner_ID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerIP()
    {
        return $this->customer_iP;
    }

    /**
     * @param mixed $customer_iP
     */
    public function setCustomerIP($customer_iP)
    {
        $this->customer_iP = $customer_iP;
    }

}