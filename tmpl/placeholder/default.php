<?php
/**
 * @version	$Id: default.php 491 2011-01-12 00:19:47Z jevolve $
 * @package	jEvolve.OpenX_Placeholder
 * @copyright  Copyright (C) 2010 jEvolve, LLC. All rights reserved.
 * @license	GNU General Public License
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$zonename = $params->get('zonename');
$zoneid = 'zoneid='.$params->get('zoneid');

$ncode = 'n='.$params->get('ncode', '');
?>

<span id="z-<?php echo $zonename; ?>" class="adHolder" style="<?php if ($params->get('width')) { echo 'width: ' . $params->get('width') . 'px;'; } if ($params->get('height')) { echo 'height: ' . $params->get('height') . 'px;'; } ?>">
<noscript>
<a target='_blank' class="noJs" href='<?php echo $params->get('ckurl').'?'.$ncode;?>'><img style="border: 0;" alt='advertisment <?php echo $zonename; ?>' src='<?php echo $params->get('avwurl').'?'.$zoneid.'&amp;'.$ncode; ?>' /></a>
</noscript>
</span>