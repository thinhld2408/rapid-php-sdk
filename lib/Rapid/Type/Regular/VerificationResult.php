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
     */
    public function setCVN($CVN)
    {
        $this->CVN = $CVN;
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
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
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
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     */
    public function setBeagleEmail($beagle_email)
    {
        $this->beagle_email = $beagle_email;
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
     */
    public function setBeaglePhone($beagle_phone)
    {
        $this->beagle_phone = $beagle_phone;
    }
}