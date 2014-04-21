<?php
/**
 * with this script you can easily change the base url
 * from magento
**/
// BOF: Config
// Syntax have to be "http(s)://something.com/"
// Slash at the End is required
$http    = 'http://shop.local/';
$https = 'http://shop.local/';
// EOF: Config
/* Magento Move Shop */
 
require 'app/Mage.php';
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
 
$types = Mage::app()->getCacheInstance()->getTypes();
foreach($types as $_type)
{
    // clear invalid caches
    Mage::app()->getCacheInstance()->cleanType($_type->getId());
}
 
Mage::getModel('core/config')->saveConfig('web/unsecure/base_url',$http,'default',0);
Mage::getModel('core/config')->saveConfig('web/secure/base_url',$https,'default',0);
 
Mage::getConfig()->reinit();
Mage::app()->reinitStores();
 
$types = Mage::app()->getCacheInstance()->getTypes();
foreach($types as $_type)
{
    // clear invalid caches
    Mage::app()->getCacheInstance()->cleanType($_type->getId());
}
 
echo "<h3>DONE</h3>";