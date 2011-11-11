<?php
/**
 * @version		$Id: skyscraper.php 302 2010-11-22 20:26:55Z jevolve $
 * @package		jEvolve.mod_adblock
 * @copyright	Copyright (C) 2010 jEvolve.net. All rights reserved.
 * @license		GNU General Public License
 * @link		http://jevolve.net
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$multiple = strpos($params->get('id'),'|');
$ncode = 'n='.$params->get('ncode', '');

if (!$multiple) {
	$adIds[] = $params->get('id');
	$alts[] = $params->get('alt');
} else {
	$adIds = explode('|', $params->get('id'));
	$alts = explode('|', $params->get('alt'));
}

foreach($adIds as $index=>$adId) { ?>
	<a href="<?php echo $params->get('ckurl').'?bannerid='.$adId.'&'.$ncode; ?>" target='_blank'>
		<img src="<?php echo $params->get('avwurl').'?bannerid='.$adId.'&'.$ncode; ?>" border='0' alt='<?php echo $alts[$index]; ?>' width="120" height="240" />
	</a>
<?php }