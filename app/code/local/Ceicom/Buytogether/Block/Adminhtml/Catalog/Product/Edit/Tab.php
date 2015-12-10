<?php

class Ceicom_Buytogether_Block_Adminhtml_Catalog_Product_Edit_Tab
extends Mage_Adminhtml_Block_Widget
implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function canShowTab()
    {
        return (($this->getRequest()->getActionName() === 'new') && (!$this->getRequest()->getParam('set')))
            ? false
            : true;
    }

    public function getTabLabel()
    {
        return $this->__('Buy together');
    }

    public function getTabTitle()
    {
        return $this->__('Buy together');
    }

    public function isHidden()
    {
        return false;
    }

    public function getTabUrl()
    {
        return $this->getUrl('*/*/buytogether', array('_current' => true));
    }

    public function getTabClass()
    {
        return 'ajax';
    }

}
