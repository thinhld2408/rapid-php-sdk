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
use Rapid\Type\Regular\PaymentDetails;

/**
 * Class CreateCustomerResponse
 * Follows https://eway.io/api-v3/#token-payments
 * @package Rapid\Type\Response
 */
class CreateCustomerResponse extends AbstractResponse
{

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
    public function getSharedPaymentUrl()
    {
        return $this->shared_payment_url;
    }

    /**
     * @param mixed $shared_payment_url
     * @return $this
     */
    public function setSharedPaymentUrl($shared_payment_url)
    {
        $this->shared_payment_url = $shared_payment_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormActionUrl()
    {
        return $this->form_action_url;
    }

    /**
     * @param mixed $form_action_url
     * @return $this
     */
    public function setFormActionUrl($form_action_url)
    {
        $this->form_action_url = $form_action_url;
        return $this;
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
     * @return $this
     */
    public function setAccessCode($access_code)
    {
        $this->access_code = $access_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompleteCheckoutURL()
    {
        return $this->complete_checkout_uRL;
    }

    /**
     * @param mixed $complete_checkout_uRL
     */
    public function setCompleteCheckoutURL($complete_checkout_uRL)
    {
        $this->complete_checkout_uRL = $complete_checkout_uRL;
    }

    /**
     * @return mixed
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
}