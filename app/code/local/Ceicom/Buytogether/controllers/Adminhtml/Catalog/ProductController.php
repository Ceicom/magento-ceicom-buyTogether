<?php

require_once(Mage::getModuleDir('controllers','Mage_Adminhtml').DS.'Catalog'.DS.'ProductController.php');

class Ceicom_Buytogether_Adminhtml_Catalog_ProductController extends Mage_Adminhtml_Catalog_ProductController
{
    /**
     * Get buytogetherd products grid and serializer block
     */
    public function buytogetherAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->getLayout()->getBlock('catalog.product.edit.tab.buytogether')
            ->setProductsBuytogether($this->getRequest()->getPost('products_buytogether', null));
        $this->renderLayout();
    }

    /**
     * Get buytogether products grid
     */
    public function buytogetherGridAction()
    {
        $this->_initProduct();
        $this->loadLayout();
        $this->getLayout()->getBlock('catalog.product.edit.tab.buytogether')
            ->setProductsBuytogether($this->getRequest()->getPost('products_buytogether', null));
        $this->renderLayout();
    }

}
