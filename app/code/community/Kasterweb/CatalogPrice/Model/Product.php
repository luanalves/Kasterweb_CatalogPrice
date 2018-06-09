<?php

class Kasterweb_CatalogPrice_Model_Product extends Mage_Catalog_Model_Product
{
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
        return Mage::helper('core')->currency($this->getFinalPrice() / $this->getQtyParcelsWithoutInterest(), true, false);
    }

    public function getQtyParcelsWithoutInterest()
    {
        return Mage::helper('kasterweb_catalogprice')->qty_parcels_without_interest();
    }

    public function getTableParcelsWithoutInterest()
    {
        return Mage::helper('kasterweb_catalogprice')->table_parcels_without_interest();
    }
}