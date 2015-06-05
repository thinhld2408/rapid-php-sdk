<?php
namespace Rapid\Api;

use Rapid\Api\AccessCode;
use Rapid\Type\Regular\LineItem;
use Rapid\Validation\ArgumentValidator;

class AccessCodeShared extends AccessCode
{
    /**
     * @param $url
     * @return $this
     */
    public function setCancelUrl($url)
    {
        $this->cancel_url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCancelUrl()
    {
        return $this->cancel_url;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setPartnerID($id)
    {
        $this->partner_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPartnerID()
    {
        return $this->partner_id;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setLogoUrl($url)
    {
        $this->logo_url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

    /**
     * @param $text
     * @return $this
     */
    public function setHeaderText($text)
    {
        $this->header_text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeaderText()
    {
        return $this->header_text;
    }

    /**
     * @param $lang
     * @return $this
     */
    public function setLanguage($lang)
    {
        $this->language = $lang;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param boolean $readOnly
     * @return $this
     */
    public function setCustomerReadOnly($readOnly)
    {
        $this->customer_readonly = $readOnly;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerReadOnly()
    {
        return $this->customer_readonly;
    }

    /**
     * @param boolean $verify
     * @return $this
     */
    public function setVerifyCustomerPhone($verify)
    {
        $this->verify_phone = $verify;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerifyCustomerPhone()
    {
        return $this->verify_phone;
    }

    /**
     * @param boolean $verify
     * @return $this
     */
    public function setVerifyCustomerEmail($verify)
    {
        $this->verify_email = $verify;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerifyCustomerEmail()
    {
        return $this->verify_email;
    }

    /**
     * @return mixed
     */
    public function getCustomView()
    {
        return $this->custom_view;
    }

    /**
     * @param mixed $custom_view
     */
    public function setCustomView($custom_view)
    {
        $this->custom_view = $custom_view;
    }

    /**
     * @return mixed
     */
    public function getVerifyPhone()
    {
        return $this->verify_phone;
    }

    /**
     * @param mixed $verify_phone
     */
    public function setVerifyPhone($verify_phone)
    {
        $this->verify_phone = $verify_phone;
    }

    /**
     * @return mixed
     */
    public function getVerifyEmail()
    {
        return $this->verify_email;
    }

    /**
     * @param mixed $verify_email
     */
    public function setVerifyEmail($verify_email)
    {
        $this->verify_email = $verify_email;
    }

}