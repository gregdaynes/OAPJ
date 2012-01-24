<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = &JFactory::getDocument();

$scriptSrc	= $params->get('general_spcjs', false);
$scriptOptions	= $params->get('general_spcjsoptions', '');

if ($scriptSrc) {
	// replace proper amps with improper - then replace with proper
	$scriptOptions = str_ireplace('&amp;', '&', $scriptOptions);
	$scriptOptions = str_ireplace('&', '&amp;', $scriptOptions);	
	$scriptOptions = trim($scriptOptions);
	
	$scriptSrc = $scriptSrc.'?'.$scriptOptions;	
} ?> 

<script type="text/javascript">
	<?php echo $zoneList->oa_zones; ?>
	window.addEvent('domready', function() {
		var adholder = $('adHolder');
		
		adholder.getChildren().each(function(el, i) {
			
			id = el.getProperty('id');
			if ($('z-'+id)) {
				$('z-'+id).adopt(el);
			}
		});
	});
	
</script>
<script src="<?php echo $scriptSrc; ?>" type="text/javascript"></script>

<div id="adHolder" style="display: none;">
	<?php foreach ($zoneList->zoneList as $zone ) { ?>
		<div id="<?php echo $zone['name']; ?>">
			<script>OA_show('<?php echo $zone['name']; ?>');</script>
		</div>
	<?php } ?>
</div>