<?php

class Loewenstark_Sample_Model_Observer
{
    // set sample.xml before local.xml
    public function addLayoutXml($event)
    {
        $xml = $event->getUpdates()
                ->addChild('sample');
        /* @var $xml SimpleXMLElement */
        $xml->addAttribute('module', 'Loewenstark_Sample');
        $xml->addChild('file', 'sample.xml');
    }
}