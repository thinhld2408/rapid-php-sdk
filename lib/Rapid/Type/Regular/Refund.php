<?php

/**
 * PHP version 5
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description 
 */

namespace Rapid\Type\Regular;

use Rapid\Common\RapidModel;

class Refund extends RapidModel {

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getShippingDetails()
    {
        return $this->shipping_details;
    }

    /**
     * @param mixed $shipping_details
     */
    public function setShippingDetails($shipping_details)
    {
        if($shipping_details instanceof ShippingDetails){
            $this->shipping_details = $shipping_details;
        }else{
            $this->shipping_details = new ShippingDetails($shipping_details);
        }
    }

    /**
     * @return mixed
     */
    public function getRefundDetails()
    {
        return $this->refund_details;
    }

    /**
     * @param mixed $refund_details
     */
    public function setRefundDetails(RefundDetails $refund_details)
    {
        if($refund_details instanceof RefundDetails){
            $this->refund_details = $refund_details;
        }else{
            $this->refund_details = new RefundDetails($refund_details);
        }
    }

    /**
     * @return array
     */
    public function getLineItems()
    {
        return $this->line_items;
    }

    /**
     * @param array $line_items
     */
    public function setLineItems($line_items)
    {
        $this->line_items = $line_items;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
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
     */
    public function setDeviceID($device_ID)
    {
        $this->device_ID = $device_ID;
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
     */
    public function setPartnerID($partner_ID)
    {
        $this->partner_ID = $partner_ID;
    }

}