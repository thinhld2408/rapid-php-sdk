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

class VerificationResult extends RapidModel {

    /**
     * @return mixed
     */
    public function getCVN()
    {
        return $this->CVN;
    }

    /**
     * @param mixed $CVN
     * @return $this
     */
    public function setCVN($CVN)
    {
        $this->CVN = $CVN;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
    public function getBeagleEmail()
    {
        return $this->beagle_email;
    }

    /**
     * @param mixed $beagle_email
     * @return $this
     */
    public function setBeagleEmail($beagle_email)
    {
        $this->beagle_email = $beagle_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeaglePhone()
    {
        return $this->beagle_phone;
    }

    /**
     * @param mixed $beagle_phone
     * @return $this
     */
    public function setBeaglePhone($beagle_phone)
    {
        $this->beagle_phone = $beagle_phone;
        return $this;
    }
}