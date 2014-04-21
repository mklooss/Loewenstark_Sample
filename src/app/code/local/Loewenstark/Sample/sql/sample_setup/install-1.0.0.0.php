<?php

$installer = $this;
/* @var Loewenstark_Sample_Model_Resource_Setup $installer */
$installer->startSetup();

// check system while creating a system
$hostname    = 'http://sample.local/';
$hostnamessl = 'https://sample.local/';

$installer->setConfigData('web/unsecure/base_url', $hostname);
$installer->setConfigData('web/secure/base_url', $hostnamessl);

$installer->removeConfigData('general/region/state_required');
$installer->removeConfigData('general/region/display_all');

// disable cache on dev system
$model = Mage::getModel('core/cache');
/* @var $model Mage_Core_Model_Cache */
$options = $model->canUse(null);
/* @var $options array */
$newOptions = array();
foreach ($options as $option => $value) {
	$newOptions[$option] = 0;
}
$model->saveOptions($newOptions);

// create admin user, if doest not exists
$query = $this->getConnection()->select()
    ->from($this->getTable('admin/user'), 'COUNT(*)')
    ->where('username = ?', 'loewenstark')
    ->limit(1);
if(intval($this->getConnection()->fetchOne($query)) < 1)
{
	$password = '8509924a4722356cfd786f143cc804b4:f1'; // syntax: md5(salt:password).':salt'
    $installer->run("INSERT INTO {$this->getTable('admin/user')} SELECT
        NULL user_id,
        'Loewen' firstname,
        'stark' lastname,
        'mathis.klooss@mage-profis.de' email,
        'loewenstark' username,
        '{$password}' password,
        NOW() created,
        NULL modified,
        NULL logdate,
        0 lognum,
        0 reload_acl_flag,
        1 is_active,
        (SELECT MAX(extra) FROM admin_user WHERE extra IS NOT NULL) extra,
        NULL rp_token,
        NOW() rp_token_created_at;

    INSERT into admin_role
        SELECT
        NULL role_id,
        (SELECT role_id FROM {$this->getTable('admin/role')} WHERE role_name = 'Administrators') parent_id,
        2 tree_level,
        0 sort_order,
        'U' role_type,
        (SELECT user_id FROM admin_user WHERE username = 'loewenstark') user_id,
        'LOEWENSTARK' role_name");
}

// initial mage setup
// configration for mage setup
if (!$installer->getConfigDataFlag('magesetup/is_initialized'))
{
    $params = array(
        'systemconfig' => true,
        'tax' => true,
        'cms' => true,
        'agreements' => true,
        'email' => false,
        'country' => 'de',
        'product_tax_class_target' => 1,
        'customer_tax_class_target' => 5
    );
    Mage::getModel('magesetup/setup')->setup($params, true);
}

try {
    @Mage_AdminNotification_Model_Survey::saveSurveyViewed(true);
} catch(Exception $e) {}

$installer->endSetup();