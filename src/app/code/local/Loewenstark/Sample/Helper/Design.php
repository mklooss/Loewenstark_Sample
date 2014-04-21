<?php

class Loewenstark_Sample_Helper_Design
extends Loewenstark_Sample_Helper_Data
{
    protected $_is_catview = null;

    /**
     * 
     * return bool
     */
    public function isCategoryView()
    {
        if(is_null($this->_is_catview))
        {
            $this->_is_catview = (bool)in_array('catalog_category_view', Mage::app()->getLayout()->getUpdate()->getHandles());
        }
        return $this->_is_catview;
    }
}