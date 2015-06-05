<?php

/**
 * PHP version 5
 *
 * @author     Dzung Tran <dzung.tt@outlook.com>
 * @license    http://www.opensource.org/licenses/bsd-license.php BSD License
 * @version    1.0.0
 * @description
 */

namespace Rapid\Api;

use Rapid\Common\ResourceModel;
use Rapid\Type\Regular\Customer;
use Rapid\Type\Regular\LineItem;
use Rapid\Type\Regular\PaymentDetails;
use Rapid\Type\Regular\ShippingDetails;
use Rapid\Validation\ArgumentValidator;

class AccessCode extends ResourceModel
{
    /**
     * @return array
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        if ($payment instanceof PaymentDetails) {
            $this->payment = $payment;
        } else {
            $this->payment = new PaymentDetails($payment);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }

    /**
     * @param mixed $redirect_url
     */
    public function setRedirectUrl($redirect_url)
    {
        $this->redirect_url = $redirect_url;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * @param mixed $transaction_type
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = $transaction_type;
    }

    /**
     * @return mixed
     */
    public function getAccessCode()
    {
        return $this->access_code;
    }

    /**
     * @param mixed $access_code
     */
    public function setAccessCode($access_code)
    {
        $this->access_code = $access_code;
    }

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
        return $this->shipping_address;
    }

    /**
     * @param mixed $shipping_address
     * @return $this
     */
    public function setShippingAddress($shipping_address)
    {
        if ($shipping_address instanceof ShippingDetails) {
            $this->shipping_address = $shipping_address;
        } else {
            $this->shipping_address = new ShippingDetails($shipping_address);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return $this
     */
    public function setItems($items)
    {
        $tmp = array();
        $this->items = array();
        $class = 'Rapid\Type\Regular\LineItem';
        if (count($items) > 0) {
            foreach ($items as $item) {
                if ($item instanceof $class) {
                    $tmp[] = $item;
                } else {
                    $tmp[] = new LineItem($item);
                }
            }
        }
        $this->items = array_merge($this->items, $tmp);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartnerID()
    {
        return $this->partner_iD;
    }

    /**
     * @param mixed $partner_iD
     */
    public function setPartnerID($partner_iD)
    {
        $this->partner_iD = $partner_iD;
    }

    /**
     * @return mixed
     */
    public function getDeviceID()
    {
        return $this->device_iD;
    }

    /**
     * @param mixed $device_iD
     */
    public function setDeviceID($device_iD)
    {
        $this->device_iD = $device_iD;
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

    /**
     * @return mixed
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * @param boolean $capture
     * @return $this
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
        if ($capture) {
            $this->setMethod(PaymentMethod::PROCESS_PAYMENT);
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
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

}