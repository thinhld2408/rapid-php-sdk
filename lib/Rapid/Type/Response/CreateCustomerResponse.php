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

use Rapid\Common\RapidModel;
use Rapid\Type\Regular\Customer;

class CreateCustomerResponse extends RapidModel
{
    var $errors;
    var $customer;
    var $shared_payment_url;
    var $form_action_url;
    var $access_code;

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     * @return $this
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
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
}