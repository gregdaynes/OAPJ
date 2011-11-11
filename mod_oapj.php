<?php
/**
 * @version		$Id: mod_adblock.php 312 2010-11-22 23:23:15Z jevolve $
 * @package		jEvolve.mod_adblock
 * @copyright	Copyright (C) 2010 jEvolve.net. All rights reserved.
 * @license		GNU General Public License
 * @link		http://jevolve.net
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$mode = $params->get('mode', 0);

switch ($mode) {
	case 0:
		// Include the syndicate functions only once
		require_once (dirname(__FILE__).DS.'helper.php');
		
		$zoneList = modOpenXLoaderHelper::getList($params);
		
		if (!$zoneList) {
			return;
		}
		
		require(JModuleHelper::getLayoutPath('mod_oapj', 'loader'.DS.'loader'));
		break;
	
	case 1:
		require(JModuleHelper::getLayoutPath('mod_oapj', 'placeholder'.DS.$params->get('type', 'placeholder_mediumrectangle')));
		break;

	case 2:
		require(JModuleHelper::getLayoutPath('mod_oapj', $params->get('type', 'block_mediumrectangle')));
		break;
}

