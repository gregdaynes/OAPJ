<?php // no direct access
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
		$zones = $this->getParam('pl_zones');
		$zones = explode("\n", trim($zones));
		
		$this->oapj->zoneList = null;
		
		foreach ($zones as $index=>$zone) {
			$zone = trim($zone);
			$zone = explode('|', $zone); 
			
			$this->oapj->zoneList[$index]['name'] = $zone[0]; // zone name
			$this->oapj->zoneList[$index]['id'] = $zone[1]; // zone id
			
			$zones[$zone[0]] = $zone[1];
			unset($zones[$index]);
		}
		
		$this->oapj->oa_zones = 'var OA_zones = '.json_encode($zones).';';
		
		return $this->oapj;
	}
}