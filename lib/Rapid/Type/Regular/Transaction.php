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
use Rapid\Type\Enumerated\PaymentMethod;

class Transaction extends RapidModel
{

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
            $this->shipping_address = $shipping_details;
        } else {
            $this->shipping_address = new ShippingDetails($shipping_details);
        }
        return $this;
    }

    /**
     * @return PaymentDetails
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param array $payment_details
     * @return $this
     */
    public function setPayment($payment_details)
    {
        if ($payment_details instanceof PaymentDetails) {
            $this->payment = $payment_details;
        } else {
            $this->payment = new PaymentDetails($payment_details);
        }
        return $this;
    }

    /**
     * @return array
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
    public function getCustomerIP()
    {
        return $this->customer_ip;
    }

    /**
     * @param mixed $customer_ip
     */
    public function setCustomerIP($customer_ip)
    {
        $this->customer_ip = $customer_ip;
    }

    /**
     * @return mixed
     */
    public function getCustomerNote()
    {
        return $this->customer_note;
    }

    /**
     * @param mixed $customer_note
     */
    public function setCustomerNote($customer_note)
    {
        $this->customer_note = $customer_note;
    }

    /**
     * @return mixed
     */
    public function getBeagleVerification()
    {
        return $this->beagle_verification;
    }

    /**
     * @param mixed $beagle_verification
     * @return $this
     */
    public function setBeagleVerification($beagle_verification)
    {
        $this->beagle_verification = $beagle_verification;
        $class = 'Rapid\Type\Regular\VerificationResult';
        if ($beagle_verification instanceof $class) {
            $this->beagle_verification = $beagle_verification;
        } else {
            $this->beagle_verification = new VerificationResult($beagle_verification);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerification()
    {
        return $this->verification;
    }

    /**
     * @param mixed $verification
     * @return $this
     */
    public function setVerification($verification)
    {
        $class = 'Rapid\Type\Regular\VerificationResult';
        if ($verification instanceof $class) {
            $this->verification = $verification;
        } else {
            $this->verification = new VerificationResult($verification);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeagleScore()
    {
        return $this->beagle_score;
    }

    /**
     * @param mixed $beagle_score
     */
    public function setBeagleScore($beagle_score)
    {
        $this->beagle_score = $beagle_score;
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
    public function getAuthorisationCode()
    {
        return $this->authorisation_code;
    }

    /**
     * @param mixed $authorisation_code
     */
    public function setAuthorisationCode($authorisation_code)
    {
        $this->authorisation_code = $authorisation_code;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->response_code;
    }

    /**
     * @param mixed $response_code
     */
    public function setResponseCode($response_code)
    {
        $this->response_code = $response_code;
    }

    /**
     * @return mixed
     */
    public function getResponseMessage()
    {
        return $this->response_message;
    }

    /**
     * @param mixed $response_message
     */
    public function setResponseMessage($response_message)
    {
        $this->response_message = $response_message;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * @param mixed $invoice_number
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->invoice_number = $invoice_number;
    }

    /**
     * @return mixed
     */
    public function getInvoiceReference()
    {
        return $this->invoice_reference;
    }

    /**
     * @param mixed $invoice_reference
     */
    public function setInvoiceReference($invoice_reference)
    {
        $this->invoice_reference = $invoice_reference;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * @param mixed $total_amount
     */
    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return mixed
     */
    public function getTransactionID()
    {
        return $this->transaction_iD;
    }

    /**
     * @param mixed $transaction_iD
     */
    public function setTransactionID($transaction_iD)
    {
        $this->transaction_iD = $transaction_iD;
    }

    /**
     * @return mixed
     */
    public function getTransactionStatus()
    {
        return $this->transaction_status;
    }

    /**
     * @param mixed $transaction_status
     */
    public function setTransactionStatus($transaction_status)
    {
        $this->transaction_status = $transaction_status;
    }

    /**
     * @return mixed
     */
    public function getTokenCustomerID()
    {
        return $this->token_customer_iD;
    }

    /**
     * @param mixed $token_customer_iD
     */
    public function setTokenCustomerID($token_customer_iD)
    {
        $this->token_customer_iD = $token_customer_iD;
    }

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

}