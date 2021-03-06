<?php

$installer = $this;

/**
 * Install product link types
 */
$data = array(
    array(
        'link_type_id'  => Ceicom_Buytogether_Model_Catalog_Product_Link::LINK_TYPE_BUYTOGETHER,
        'code'          => 'buytogether'
    )
);

foreach ($data as $bind) {
    $installer->getConnection()->insertForce($installer->getTable('catalog/product_link_type'), $bind);
}

/**
 * install product link attributes
 */
$data = array(
    array(
        'link_type_id'                  => Ceicom_Buytogether_Model_Catalog_Product_Link::LINK_TYPE_BUYTOGETHER,
        'product_link_attribute_code'   => 'position',
        'data_type'                     => 'int'
    )
);

$installer->getConnection()->insertMultiple($installer->getTable('catalog/product_link_attribute'), $data);
