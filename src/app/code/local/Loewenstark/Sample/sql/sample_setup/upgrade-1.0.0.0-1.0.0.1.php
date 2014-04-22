<?php
$installer = $this;
/* @var Loewenstark_Sample_Model_Resource_Setup $installer */
$installer->startSetup();

// package name and theme name
$package     = 'sample';
$theme       = 'default';

$mail        = 'kontakt@mage-profis.de';
$name        = 'mage-profis.de';
$company     = 'Löwenstark Web-Solutions Gmbh';
$phone       = '+49/531/213605500';
$fax         = '+49/531/21360579500';
$street      = 'Alte Salzdahlumer Straße 202';
$zip         = '38124';
$city        = 'Braunschweig';
$country     = 'DE';
$locale      = 'de_DE';
$vatid       = 'DE 286589491';
$register    = 'HRB 203977';

$court       = 'Amtsgericht Braunschweig';
$owner       = 'Inhaber';
$ceo         = 'Inhaber';
$bankowner   = 'Löwenstark Web-Solutions GmbH';
$bankaccount = '1111111111';
$bankcode    = '11111111';
$bankname    = 'Bank';
$swift       = '11111111111';
$iban        = 'DE00000000000000000000';

$currency    = 'EUR';

$config = array(
    'web/url/redirect_to_base' => '301',
    'web/seo/use_rewrites' => 1,
    'design/package/name' => $package,
    'design/theme/default' => $theme,
    'design/head/default_title' => $name,
    'design/head/title_suffix' => ' | '.$name,
    'design/header/logo_alt' => $name,
    'design/footer/copyright' => '&copy; '.date('Y').' '.$company,
    'catalog/frontend_flat/catalog_category' => 1,
    'catalog/frontend_flat/catalog_product' => 1,
    'catalog/search/search_type' => 3,
    'catalog/seo/product_use_categories' => 0,
    'catalog/seo/category_canonical_tag' => 1,
    'catalog/seo/product_canonical_tag' => 1,
    'sitemap/generate/enabled' => 1,
    'system/log/enabled' => 1,
    'catalog/review/allow_guest' => 1,
    'catalog/frontend/flat_catalog_category' => 1,
    'catalog/frontend/flat_catalog_product' => 1,
    'advanced/modules_disable_output/Mage_AdminNotification' => 1,
    'dev/template/allow_symlink' => 1,
    'general/locale/timezone' => 'Europe/Berlin',
    'general/region/display_all' => 0,
    'general/locale/firstday' => 1,
    'general/locale/code' => $locale,
    'currency/options/base' => $currency,
    'currency/options/default' => $currency,
    'currency/options/allow' => $currency,
    'contacts/email/recipient_email' => $mail,
    'trans_email/ident_general/name' => $name,
    'trans_email/ident_general/email' => $mail,
    'trans_email/ident_support/name' => $name,
    'trans_email/ident_support/email' => $mail,
    'trans_email/ident_custom1/email' => $name,
    'trans_email/ident_custom1/email' => $mail,
    'trans_email/ident_custom2/email' => $name,
    'trans_email/ident_custom2/email' => $mail,
    'general/region/state_required' => 'CA,EE,ES,FI,FR,LT,LV,RO,US',
    'general/region/display_all' => 0,
    'general/store_information/name' => $name,
    'general/store_information/phone' => $phone,
    'general/store_information/merchant_country' => $country,
    'general/store_information/address' => $street."\n".$zip.' '.$city,
    // imprint
    'general/imprint/shop_name' => $name,
    'general/imprint/company_first' => $company,
    'general/imprint/street' => $street,
    'general/imprint/zip' => $zip,
    'general/imprint/city' => $city,
    'general/imprint/country' => $country,
    'general/imprint/telephone' => $phone,
    'general/imprint/fax' => $fax,
    'general/imprint/email' => $mail,
    'general/imprint/vat_id' => $vatid,
    'general/imprint/register_number' => $register,
    'general/imprint/court' => $court,
    'general/imprint/owner' => $owner,
    'general/imprint/ceo' => $ceo,
    'general/imprint/bank_account_owner' => $bankowner,
    'general/imprint/bank_account' => $bankaccount,
    'general/imprint/bank_code_number' => $bankcode,
    'general/imprint/bank_name' => $bankname,
    'general/imprint/swift' => $swift,
    'general/imprint/iban' => $iban,
    'catalog/vertnav/hide_top' => 0,
    'cataloginventory/options/show_out_of_stock' => 1,
    'catalog/review/allow_guest' => 0
);

foreach($config as $key=>$value)
{
    $installer->setConfigData($key, $value);
}

$installer->endSetup();
