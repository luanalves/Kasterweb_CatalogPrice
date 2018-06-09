<?php

class Kasterweb_CatalogPrice_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function _enable()
    {
        return Mage::getStoreConfig('kasterweb_catalogpriceoptions/settings/enabled', Mage::app()->getStore()->getStoreId());
    }

    public function cash_discount()
    {
        if ($this->_enable()) {
            return Mage::getStoreConfig('kasterweb_catalogpriceoptions/settings/cash_discount', Mage::app()->getStore()->getStoreId());
        }
        return false;
    }

    public function qty_parcels_without_interest()
    {
        if ($this->_enable()) {
            return Mage::getStoreConfig('kasterweb_catalogpriceoptions/settings/parcels_without_interest', Mage::app()->getStore()->getStoreId());
        }
        return false;
    }

    public function table_parcels_without_interest()
    {
        if ($this->_enable()) {
            $data = Mage::getStoreConfig('kasterweb_catalogpriceoptions/settings/table_parcels_without_interest', Mage::app()->getStore()->getStoreId());
            if (!empty($data)) {
                return unserialize($data);
            }
        }
        return false;
    }

    public function calculateInterest($interest, $value)
    {
//        return Mage::helper('core')->currency($value + ($value * $interest / 100), true, false);
        return $value + ($value * $interest / 100);
    }

    public function getParcelValueMinimun(){
        return Mage::getStoreConfig('kasterweb_catalogpriceoptions/settings/parcel_value_minimun', Mage::app()->getStore()->getStoreId());
    }

    public function validateParcelValueMinimun($value){
        if($this->getParcelValueMinimun() < $value){
            return true;
        }
        return false;
    }
}
	 