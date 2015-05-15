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

class LineItem extends RapidModel {

    /**
     * @return string
     */
    public function getSKU()
    {
        return $this->SKU;
    }

    /**
     * @param string $SKU
     * @return $this
     */
    public function setSKU($SKU)
    {
        $this->SKU = $SKU;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitCost()
    {
        return $this->unit_cost;
    }

    /**
     * @param int $unit_cost
     * @return $this
     */
    public function setUnitCost($unit_cost)
    {
        $this->unit_cost = $unit_cost;
        return $this;
    }

    /**
     * @return int
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param int $tax
     * @return $this
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * Used to set the line item's values so that the total and tax add up correctly
     *
     * @param $unit_cost
     * @param $unit_tax
     * @param int $quantity
     */
    public function calculate($unit_cost, $unit_tax, $quantity = 0){
        $this->setTax($unit_tax * $quantity);
        $this->setTotal($this->getTax() + ($quantity * $unit_cost));
    }

}