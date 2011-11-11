<?php
/**
 * @version	$Id: helper.php 330 2010-11-23 18:28:57Z jevolve $
 * @package	jEvolve.OpenX_Loader
 * @copyright  Copyright (C) 2010 jEvolve, LLC. All rights reserved.
 * @license	GNU General Public License
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modOpenXLoaderHelper
{
	function getList(&$params)
	{	
		$zones = $params->get('zones');
		$zones = explode("\n", trim($zones));
		
		foreach ($zones as $index=>$zone) {
			$zone = trim($zone);
			$zone = explode('|', $zone); 
			$zoneList[] = $zone[0];
			$zones[$zone[0]] = $zone[1];
			unset($zones[$index]);
		}
		
		$this->oa_zones = 'var OA_zones = '.json_encode($zones).';';
		
		return $zoneList;
	}
}