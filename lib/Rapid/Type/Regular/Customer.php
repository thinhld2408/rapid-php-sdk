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

class Customer extends Address {

    /**
     * @return string
     */
    public function getTokenCustomerID()
    {
        return $this->token_customer_ID;
    }

    /**
     * @param string $token_customer_ID
     * @return $this
     */
    public function setTokenCustomerID($token_customer_ID)
    {
        $this->token_customer_ID = $token_customer_ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param string $company_name
     * @return $this
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getJobDescription()
    {
        return $this->job_description;
    }

    /**
     * @param string $job_description
     * @return $this
     */
    public function setJobDescription($job_description)
    {
        $this->job_description = $job_description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     * @return $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     * @return $this
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return CardDetails
     */
    public function getCardDetails()
    {
        return $this->card_details;
    }

    /**
     * @param mixed $card_details
     * @return $this
     */
    public function setCardDetails($card_details)
    {
        $class = 'Rapid\Type\Regular\CardDetails';
        if($card_details instanceof $class){
            $this->card_details = $card_details;
        }else{
            $this->card_details = new CardDetails($card_details);
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->card_number;
    }

    /**
     * @param mixed $card_number
     */
    public function setCardNumber($card_number)
    {
        $this->card_number = $card_number;
    }

    /**
     * @return mixed
     */
    public function getCardStartMonth()
    {
        return $this->card_start_month;
    }

    /**
     * @param mixed $card_start_month
     */
    public function setCardStartMonth($card_start_month)
    {
        $this->card_start_month = $card_start_month;
    }

    /**
     * @return mixed
     */
    public function getCardStartYear()
    {
        return $this->card_start_year;
    }

    /**
     * @param mixed $card_start_year
     */
    public function setCardStartYear($card_start_year)
    {
        $this->card_start_year = $card_start_year;
    }

    /**
     * @return mixed
     */
    public function getCardIssueNumber()
    {
        return $this->card_issue_number;
    }

    /**
     * @param mixed $card_issue_number
     */
    public function setCardIssueNumber($card_issue_number)
    {
        $this->card_issue_number = $card_issue_number;
    }

    /**
     * @return mixed
     */
    public function getCardName()
    {
        return $this->card_name;
    }

    /**
     * @param mixed $card_name
     */
    public function setCardName($card_name)
    {
        $this->card_name = $card_name;
    }

    /**
     * @return mixed
     */
    public function getCardExpiryMonth()
    {
        return $this->card_expiry_month;
    }

    /**
     * @param mixed $card_expiry_month
     */
    public function setCardExpiryMonth($card_expiry_month)
    {
        $this->card_expiry_month = $card_expiry_month;
    }

    /**
     * @return mixed
     */
    public function getCardExpiryYear()
    {
        return $this->card_expiry_year;
    }

    /**
     * @param mixed $card_expiry_year
     */
    public function setCardExpiryYear($card_expiry_year)
    {
        $this->card_expiry_year = $card_expiry_year;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * @param mixed $is_active
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}