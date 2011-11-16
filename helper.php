<?php
/**
 * @version	$Id: helper.php 330 2010-11-23 18:28:57Z jevolve $
 * @package	jEvolve.OpenX_Loader
 * @copyright  Copyright (C) 2010 jEvolve, LLC. All rights reserved.
 * @license	GNU General Public License
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modOAPJHelper
{
	public $_params;

	function __construct($params)
	{
		$this->oapj = new JObject();
		$this->oapj->_params = $params;
	}
	
	function getParam($data, $default = null)
	{
		$param = null; // initial
		
		$params = $this->oapj->_params; // get params
		
		$param = $params->_registry['_default']['data']->$data; // get specific params
		
		if ($param == null) {
			return $default; // return default if no params
		}
		
		return $param;
	}
	
	function getBanners()
	{
		$adIds		= explode('|', $this->getParam('block_id'));
		$alts		= explode('|', $this->getParam('block_alt'));
		
		$this->oapj->data = new JObject();
		$this->oapj->data->adIds = $adIds;
		$this->oapj->data->alts  = $alts;
		
		return $this->oapj->data;
	}
	
	function getList()
	{	
		
//		$zones = $this->_params->get('zones');
//		$zones = explode("\n", trim($zones));
//		
//		foreach ($zones as $index=>$zone) {
//			$zone = trim($zone);
//			$zone = explode('|', $zone); 
//			
//			$zoneList[] = $zone[0];
//			$zones[$zone[0]] = $zone[1];
//			unset($zones[$index]);
//		}
//		
//		$this->oa_zones = 'var OA_zones = '.json_encode($zones).';';
//		
//		return $zoneList;
	}
}