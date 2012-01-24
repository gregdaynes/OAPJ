<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modOAPJHelper
{
	public $oapj;

	function __construct($params)
	{
		$this->oapj = new JObject();
	}
	
	function getBanners($params)
	{
		$adIds		= explode('|', $params->get('block_id'));
		$alts		= explode('|', $params->get('block_alt'));
		
		$this->oapj->data = new JObject();
		$this->oapj->data->adIds = $adIds;
		$this->oapj->data->alts  = $alts;
		
		return $this->oapj->data;
	}
	
	function getList($params)
	{	
		$zones = $params->get('pl_zones');
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