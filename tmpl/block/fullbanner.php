<?php // no direct access
defined('_JEXEC') or die('Restricted access');

foreach($banners->adIds as $index => $adId) { ?>
	<a href="<?php echo $params->get('general_ckurl').'?bannerid='.$adId.'&'.$ncode; ?>" target='_blank'>
		<img src="<?php echo $params->get('general_avwurl').'?bannerid='.$adId.'&'.$ncode; ?>" border='0' alt='<?php echo $banners->alts[$index]; ?>' width="468" height="60" />
	</a>
<?php }