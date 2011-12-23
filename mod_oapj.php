<?php // no direct access
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).DS.'helper.php');

$oapjHelper = new modOAPJHelper($params);
$mode = $params->get('general_mode', 'placeholder');
$ncode = 'n='.$params->get('general_ncode', '');

switch ($mode) {
	case 'loader':
		$zoneList = $oapjHelper->getList($params);
		
		if (!$zoneList) { echo '<!--'.JText::_('JEV_MOD_OAPJ_NO_ZONES_DEFINED').'-->'; return; }
		
		require(JModuleHelper::getLayoutPath('mod_oapj', 'loader'.DS.'loader'));
		break;
	
	case 'placeholder':
		$zoneList = $oapjHelper->getList($params);
		
		if (!$zoneList) { echo '<!--'.JText::_('JEV_MOD_OAPJ_NO_ZONES_DEFINED').'-->'; return; }
	
		require(JModuleHelper::getLayoutPath('mod_oapj', 'placeholder'.DS.$params->get('placeholder_type', 'default')));
		break;

	case 'block':
		$banners = $oapjHelper->getBanners($params);
		
		require(JModuleHelper::getLayoutPath('mod_oapj', 'block'.DS.$params->get('block_type', 'mediumrectangle')));
		break;
}