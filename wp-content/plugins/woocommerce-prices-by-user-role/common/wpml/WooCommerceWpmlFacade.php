<?php

class WooCommerceWpmlFacade
{
    private $_wpmlInstance;    
        
    public function __construct()
    {
        $this->_wpmlInstance = $this->_getWmplInstance();
    }
    
    private function _getWmplInstance()
    {
        $name = "woocommerce_wpml";
            
        if (!$this->_isInstanceExistInGlobals($name)) {
            $message = 'WoocommerceWpml instance is not initilized';
            throw new Exception($message);
        }
        
        return $GLOBALS[$name];
    }
    
    private function _isInstanceExistInGlobals($name)
    {
        return array_key_exists($name, $GLOBALS);
    }
    
    private function _getWpmlMultiCurrencySupportInstance()
    {    
         if ($this->_isMultiCurrencySupportPropertyExist()) {
             return $this->_wpmlInstance->multi_currency_support;
         } else if ($this->_isMultiCurrencyPropertyExist()) {
             return $this->_wpmlInstance->multi_currency;
         } else {
             $message = 'WpmlMultiCurrencySupport instance is not initilized';
             throw new Exception(
                 $message,
                 PRICE_BY_ROLE_EXCEPTION_WMPL_CURRENCY
             );
         }
    }
    
    private function _isMultiCurrencySupportPropertyExist()
    {
        return isset($this->_wpmlInstance->multi_currency_support);
    }
    
    private function _isMultiCurrencyPropertyExist()
    {
        return isset($this->_wpmlInstance->multi_currency);
    }
    
    public function getActiveCurrenciesData()
    {
        $currencySupport = $this->_getWpmlMultiCurrencySupportInstance();
        
        return $currencySupport->get_currencies();
    }
}
