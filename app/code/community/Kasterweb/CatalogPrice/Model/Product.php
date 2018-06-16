<?php

class Kasterweb_CatalogPrice_Model_Product extends Mage_Catalog_Model_Product
{

    public $qtyParcelsWithoutInterest = 0;

    public function __construct()
    {
        parent::_construct();
        $this->setQtyParcelsWithoutInterest(Mage::helper('kasterweb_catalogprice')->qty_parcels_without_interest());
    }

    public function getValueCashDiscount()
    {
        return Mage::helper('kasterweb_catalogprice')->cash_discount();
    }

    public function getCashDiscount()
    {
        return Mage::helper('core')->currency($this->getFinalPrice() - ($this->getFinalPrice() * ($this->getValueCashDiscount() / 100)), true, false);
    }


    public function getValueParcelWithoutInterest()
    {
        for ($x = $this->getQtyParcelsWithoutInterest(); $x >= 1; $x--) {
            $value = $this->getFinalPrice() / $x;
            $this->setQtyParcelsWithoutInterest($x);
            if (Mage::helper('kasterweb_catalogprice')->validateParcelValueMinimun($value)) {
                break;
            }
        }
        return Mage::helper('core')->currency($value, true, false);
    }

    public function setQtyParcelsWithoutInterest($value)
    {
        $this->qtyParcelsWithoutInterest = $value;
    }

    public function getQtyParcelsWithoutInterest()
    {
        return $this->qtyParcelsWithoutInterest;
    }

    public function getTableParcelsWithoutInterest()
    {
        return Mage::helper('kasterweb_catalogprice')->table_parcels_without_interest();
    }
}