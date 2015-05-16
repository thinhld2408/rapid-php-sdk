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

class Transaction extends RapidModel {

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
     * @return bool
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * @param bool $capture
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
    }

    /**
     * @return Customer
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
     * @return ShippingDetails
     */
    public function getShippingDetails()
    {
        return $this->shipping_details;
    }

    /**
     * @param mixed $shipping_details
     * @return $this
     */
    public function setShippingDetails($shipping_details)
    {
        if ($shipping_details instanceof ShippingDetails) {
            $this->shipping_details = $shipping_details;
        } else {
            $this->shipping_details = new ShippingDetails($shipping_details);
        }
        return $this;
    }

    /**
     * @return PaymentDetails
     */
    public function getPaymentDetails()
    {
        return $this->payment_details;
    }

    /**
     * @param array $payment_details
     * @return $this
     */
    public function setPaymentDetails($payment_details)
    {
        if ($payment_details instanceof PaymentDetails) {
            $this->payment_details = $payment_details;
        } else {
            $this->payment_details = new PaymentDetails($payment_details);
        }
        return $this;
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
     * @return $this
     */
    public function setLineItems($line_items)
    {
        if(count($line_items) > 0){
            foreach($line_items as $item){
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
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getDeviceID()
    {
        return $this->device_ID;
    }

    /**
     * @param string $device_ID
     */
    public function setDeviceID($device_ID)
    {
        $this->device_ID = $device_ID;
    }

    /**
     * @return string
     */
    public function getPartnerID()
    {
        return $this->partner_ID;
    }

    /**
     * @param string $partner_ID
     */
    public function setPartnerID($partner_ID)
    {
        $this->partner_ID = $partner_ID;
    }

    /**
     * @return string
     */
    public function getThirdPartyWalletID()
    {
        return $this->third_party_wallet_ID;
    }

    /**
     * @param string $third_party_wallet_ID
     */
    public function setThirdPartyWalletID($third_party_wallet_ID)
    {
        $this->third_party_wallet_ID = $third_party_wallet_ID;
    }

    /**
     * @return string
     */
    public function getAuthTransactionID()
    {
        return $this->auth_transaction_ID;
    }

    /**
     * @param string $auth_transaction_ID
     */
    public function setAuthTransactionID($auth_transaction_ID)
    {
        $this->auth_transaction_ID = $auth_transaction_ID;
    }

    /**
     * @return string
     */
    public function getRedirectURL()
    {
        return $this->redirect_URL;
    }

    /**
     * @param string $redirect_URL
     */
    public function setRedirectURL($redirect_URL)
    {
        $this->redirect_URL = $redirect_URL;
    }

    /**
     * @return string
     */
    public function getCancelURL()
    {
        return $this->cancel_URL;
    }

    /**
     * @param string $cancel_URL
     */
    public function setCancelURL($cancel_URL)
    {
        $this->cancel_URL = $cancel_URL;
    }

    /**
     * @return string
     */
    public function getCheckoutURL()
    {
        return $this->checkout_URL;
    }

    /**
     * @param string $checkout_URL
     */
    public function setCheckoutURL($checkout_URL)
    {
        $this->checkout_URL = $checkout_URL;
    }

    /**
     * @return bool
     */
    public function getCheckoutPayment()
    {
        return $this->checkout_payment;
    }

    /**
     * @param bool $checkout_payment
     */
    public function setCheckoutPayment($checkout_payment)
    {
        $this->checkout_payment = $checkout_payment;
    }
}