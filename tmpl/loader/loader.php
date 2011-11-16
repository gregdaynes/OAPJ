<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = &JFactory::getDocument();

$scriptSrc	= $params->get('spcjs', false);
$scriptOptions	= $params->get('spcjsoptions', '');

if ($scriptSrc) {
	// replace proper amps with improper - then replace with proper
	$scriptOptions = str_ireplace('&amp;', '&', $scriptOptions);
	$scriptOptions = str_ireplace('&', '&amp;', $scriptOptions);	
	$scriptOptions = trim($scriptOptions);
	
	$scriptSrc = $scriptSrc.'?'.$scriptOptions;	
} ?> 

<script type="text/javascript">
	<?php echo $this->oa_zones; ?>
	window.addEvent('domready', function() {
		var adholder = $('adHolder');
		
		adholder.getChildren().each(function(el, i) {
			
			id = el.get('id');
			if ($('z-'+id)) {
				$('z-'+id).adopt(el);
			}
		});
	});
	
</script>
<script src="<?php echo $scriptSrc; ?>" type="text/javascript"></script>

<div id="adHolder" style="display: none;">
	<?php foreach ($zoneList as $zone ) { ?>
		<div id="<?php echo $zone; ?>">
			<script>OA_show('<?php echo $zone; ?>');</script>
		</div>
	<?php } ?>
</div>