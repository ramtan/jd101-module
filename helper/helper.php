<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Module.mod_smartwelcome
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class NonHelper{
	
	// Function เชคการ show จาก cookie ถ้า cookie Run ครบจำนวนก็จะไม่โชว Alert Bar
	public static function show($params){

		$app = JFactory::getApplication();
		
		// ดึงข้อมูล .... จากหน้า config
		$secret = $app->getCfg('secret');

		// ดึงค่าของ cookie ชื่อ JSW_....
		$cookie = $app->input->cookie->get('JSW_'.$secret);

		if(!$cookie){

			//ถ้ายังไม่ได้ set cookie ให้ set cookie ชื่อ JSW_ ......
			$app->input->cookie->set('JSW_'.$secret, '1');
			return true;
		}elseif($cookie < $params->get('visit_count','5')){

			// ถ้า $cookie น้อยกว่าจำนวน visit_count ก้ให้ +1
			$app->input->cookie->set('JSW_'.$secret, $cookie +1);
			return true;
		}else{
			return false;
		}

	}
}


