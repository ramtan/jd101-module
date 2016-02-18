<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Module.mod_smartwelcome
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */ 

defined('_JEXEC') or die;

//include the helper file
require_once __DIR__.'/helper/helper.php';

// เรียกใช้ Function show โดยส่ง  $params ไป
$show = NonHelper::show($params);

if($show){
	//สั่ง joomla ให้ค้น laypout ที่ mod_smartwelcome และดูค่าที่ผู้ใช้เลือกว่าเป็น layout อะไร
	require JModuleHelper::getLayoutPath('mod_smartwelcome', $params->get('layout','default'));
}
