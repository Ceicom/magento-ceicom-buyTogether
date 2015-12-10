<?php

class Ceicom_Buytogether_Model_Catalog_Product extends Mage_Catalog_Model_Product
{
    /**
     * Retrieve array of buytogether products
     *
     * @return array
     */
    public function getBuytogetherProducts($productInstance)
    {
        if (!$productInstance->hasBuytogetherProducts()) {
            $products = array();
            $collection = $this->getBuytogetherProductCollection($productInstance);
            foreach ($collection as $product) {
                $products[] = $product;
            }
            $this->setBuytogetherProducts($products);
        }
        return $this->getData('buytogether_products');
    }

    /**
     * Retrieve buytogether products identifiers
     *
     * @return array
     */
    /*public function getBuytogetherProductIds()
    {
        if (!$this->hasBuytogetherProductIds()) {
            $ids = array();
            foreach ($this->getBuytogetherProducts() as $product) {
                $ids[] = $product->getId();
            }
            $this->setBuytogetherProductIds($ids);
        }
        return $this->getData('buytogether_product_ids');
    }*/

    /**
     * Retrieve collection buytogether product
     *
     * @return Mage_Catalog_Model_Resource_Product_Link_Product_Collection
     */
    public function getBuytogetherProductCollection($productInstance)
    {
        $collection = $productInstance->getLinkInstance()->useBuytogetherLinks()
            ->getProductCollection()
            ->setIsStrongMode();
        $collection->setProduct($productInstance);
        return $collection;
    }

    /**
     * Retrieve collection buytogether link
     *
     * @return Mage_Catalog_Model_Resource_Product_Link_Collection
     */
    public function getBuytogetherLinkCollection($productInstance)
    {
        $collection = $productInstance->getLinkInstance()->useBuytogetherLinks()
            ->getLinkCollection();
        $collection->setProduct($this);
        $collection->addLinkTypeIdFilter();
        $collection->addProductIdFilter();
        $collection->joinAttributes();
        return $collection;
    }

}
