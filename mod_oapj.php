<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$mode = $params->get('general_mode', 'placeholder');

require_once (dirname(__FILE__).DS.'helper.php');

$oapjData = new modOAPJHelper($params);

$ncode = 'n='.$params->get('general_ncode', '');

switch ($mode) {
	case 'loader':
		$zoneList = $oapjData->getList();
		
		if (!$zoneList) { echo '<!--'.JText::_('JEV_MOD_OAPJ_NO_ZONES_DEFINED').'-->'; return; }
		
		require(JModuleHelper::getLayoutPath('mod_oapj', 'loader'.DS.'loader'));
		break;
	
	case 'placeholder':
		$zoneList = $oapjData->getList();
		
		if (!$zoneList) { echo '<!--'.JText::_('JEV_MOD_OAPJ_NO_ZONES_DEFINED').'-->'; return; }
	
		require(JModuleHelper::getLayoutPath('mod_oapj', 'placeholder'.DS.$params->get('placeholder_type', 'default')));
		break;

	case 'block':
		$banners = $oapjData->getBanners();
		
		require(JModuleHelper::getLayoutPath('mod_oapj', 'block'.DS.$params->get('block_type', 'mediumrectangle')));
		break;
}