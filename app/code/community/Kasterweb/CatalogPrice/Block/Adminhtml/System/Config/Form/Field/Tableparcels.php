<?php
class Kasterweb_CatalogPrice_Block_Adminhtml_System_Config_Form_Field_Tableparcels extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    protected $_helper;

    protected function _prepareToRender()
    {
        $this->addColumn('parcel', array(
            'label'	=> Mage::helper('kasterweb_catalogprice')->__('Parcels'),
            'style' => 'width: 100px;',
        ));
        $this->addColumn('interest', array(
            'label' => Mage::helper('kasterweb_catalogprice')->__('Interest by Percent'),
            'style' => 'width: 100px;',
        ));

        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('kasterweb_catalogprice')->__('Add new option');
        parent::_prepareToRender();
    }

}
