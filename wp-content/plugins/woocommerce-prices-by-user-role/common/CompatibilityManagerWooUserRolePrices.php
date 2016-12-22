<?php

class CompatibilityManagerWooUserRolePrices extends WooUserRolePricesFestiPlugin
{
    private $_message = array();
    
    protected function onInit()
    {
        if ($this->_isActivedNotCompatiblePlugins()) {
            
        }
        $this->addActionListener(
            'admin_notices',
            'onDisplayInfoAboutNotCompatiblePluginAction' 
        );
    } // end onInit
    
    private function _isActivedNotCompatiblePlugins()
    {
        $plugins = $this->getNotCompatiblePluginsList();

        $result = false;
        
        foreach ($plugins as $path => $name) {
            if ($this->isPluginActive($path)) {
                $message = 'WooCommerce Prices By User Role: ';
                $message .= 'Not compatible with "'.$name.'"';
                $this->_message[] = $message;
                $result = true;
            }
        }
        
        return $result;
    } // end _isActivedNotCompatiblePlugins
    
    public function onDisplayInfoAboutNotCompatiblePluginAction()
    {
        if (!$this->_message) {
            return false;
        }
        
        foreach ($this->_message as $message) {
            $this->displayError($message);
        }
    } // end onDisplayInfoAboutNotCompatiblePluginAction
    
    public function getNotCompatiblePluginsList()
    {
        $pluginsList = array();
        
        $path = 'woocommerce-composite-products/';
        $mainFile = 'woocommerce-composite-products.php';
        $name = 'Composite Products';
        
        $pluginsList[$path.$mainFile] = $name;
        
        $path = 'jck-woo-show-single-variations/';
        $mainFile = 'jck-woo-show-single-variations.php';
        $name = 'WooCommerce Show Single Variations';
        
        $pluginsList[$path.$mainFile] = $name;
        
        return $pluginsList;
    } // end getNotCompatiblePluginsList
}
