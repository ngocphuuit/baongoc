<?php

class FestiWooCommerceSimpleProduct extends AbstractFestiWooCommerceProduct
{
    public function removeAddToCartButton()
    {
        remove_all_actions('woocommerce_simple_add_to_cart');
        
        // Need to display stock status
        $this->adapter->addActionListener(
            'woocommerce_simple_add_to_cart',
            'onDisplayOnlyProductStockStatusAction'
        );
    } // end removeAddToCartButton
    
    public function getProductId($product)
    {
        return $product->id;
    } // end getProductId
    
    public function isAvaliableToDispalySavings($product)
    {
        return true;
    } // end isAvaliableToDispalySavings
    
    public function isAvaliableToDisplaySaleRange($product)
    {
        $price = $this->adapter->getUserPrice($product);
        if ($price) {
            return false;
        }
        
        return true;
    } // end isAvaliableToDisplaySaleRange
    
    public function getFormatedPriceForSaleRange($product, $userPrice)
    {
        return $userPrice;
    } // end getFormatedPriceForSaleRange
}
