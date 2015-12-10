
<?php

class Ceicom_Buytogether_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction() {

        $cart = Mage::getModel('checkout/cart');
        $cart->init();

        $products = explode(',', $this->getRequest()->getParam('products'));
        $quantity = explode(',', $this->getRequest()->getParam('qtd'));

        $number = count($products);

        if ($products[0] == '' or $products[1] == '') {
            return $this->_redirect('/');
        }

        for($i = 0; $i < $number; $i++) {
            $product = Mage::getModel('catalog/product')->load($products[$i]);
            try {
                $cart->addProduct($product, array('qty' => $quantity[$i]));
            } catch (Exception $e) {
                $this->_redirect('/');
            }
        }


        $cart->save();
        $this->_redirect('checkout/cart');
    }
}
