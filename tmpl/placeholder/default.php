<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

foreach($zoneList->zoneList as $zoneAd) {?>
<span id="z-<?php echo $zoneAd['name']; ?>" class="adHolder" style="<?php if ($params->get('general_width')) { echo 'width: ' . $params->get('general_width') . 'px;'; } if ($params->get('general_height')) { echo 'height: ' . $params->get('general_height') . 'px;'; } ?>">
<noscript>
<a target='_blank' class="noJs" href='<?php echo $params->get('general_ckurl').'?'.$ncode;?>'>
	<img style="border: 0;" alt='advertisment <?php echo $zoneAd['name']; ?>' src='<?php echo $params->get('general_avwurl').'?'.$zoneAd['id'].'&amp;'.$ncode; ?>' />
</a>
</noscript>
</span>
<?php }