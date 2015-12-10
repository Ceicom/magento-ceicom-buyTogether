<?php

class Ceicom_Buytogether_Model_Observer extends Varien_Object
{

    public function catalogProductPrepareSave($observer)
    {
        $event = $observer->getEvent();

        $product = $event->getProduct();
        $request = $event->getRequest();

        $links = $request->getPost('links');
        if (isset($links['buytogether']) && !$product->getBuytogetherReadonly()) {
            $product->setBuytogetherLinkData(Mage::helper('adminhtml/js')->decodeGridSerializedInput($links['buytogether']));
        }
    }

    public function catalogModelProductDuplicate($observer)
    {
        $event = $observer->getEvent();

        $currentProduct = $event->getCurrentProduct();
        $newProduct = $event->getNewProduct();

        $data = array();
        $currentProduct->getLinkInstance()->useBuytogetherLinks();
        $attributes = array();
        foreach ($currentProduct->getLinkInstance()->getAttributes() as $_attribute) {
            if (isset($_attribute['code'])) {
                $attributes[] = $_attribute['code'];
            }
        }
        foreach (Mage::getModel('ceicom_buytogether/catalog_product')->getBuytogetherLinkCollection($currentProduct) as $_link) {
            $data[$_link->getLinkedProductId()] = $_link->toArray($attributes);
        }
        $newProduct->setBuytogetherLinkData($data);
    }

    public function addToCart($observer) {
    }

}
