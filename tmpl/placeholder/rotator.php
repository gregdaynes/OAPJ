<?php
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = &JFactory::getDocument();

/**
 * Parameters
 */
$zonename = $params->get('zonename');
$ncode = 'n='.$params->get('ncode', ''); 
$zones		= explode("\n", $params->get('zones'));
$uniqueId	= 'id'.$evl->generateUniqueCode("5");
$width		= $params->get('width');
$height		= $params->get('height');
$ckurl		= $params->get('ckurl');
$avwurl		= $params->get('avwurl');
$displaytime	= $params->get('displaytime', 5);
$transitiontime	= $params->get('transitiontime', 0.25);
$autoplay	= $params->get('autoplay', 1);
if ($autoplay == 1) { $autoplay = "true"; } else { $autoplay = "false"; }
$transition	= $params->get('transition', 'crossFade');

$noscript = rand(0, count($zones) -1); // get random zome
$noscript = explode('|',$zones[$noscript]); // get zone id
$noscript = $noscript[1];

JHTML::script('fx.elements.js', 'media/mod_openx_placeholder/');
JHTML::script('loop.js', 'media/mod_openx_placeholder/');
JHTML::script('slideshow.js', 'media/mod_openx_placeholder/'); 

?>

<div id="<?php echo $uniqueId; ?>" class="<?php echo $params->get('moduleclass_sfx'); ?>">
	<div class="mask" style="display: none;">
		<ul class="ads">
			<?php
				$i=1;
				foreach($zones as $zone) { 
					$tmp = explode('|', trim($zone));
					$zonename = $tmp[0];
					$zoneid = $tmp[1]; ?>
					<li id="z-<?php echo $zonename; ?>"></li>
				<?php $i++; }
			?>
		</ul>
	</div>
	<ul class="controls" style="display: none;">
		<?php
		for($i=1; $i<=count($zones); $i++) { ?>
			<li>&bull;</li>
		<?php } ?>
	</ul>
</div>

<script>
	window.addEvent('domready', function() {
		var buttons = $('<?php echo $uniqueId; ?>').getElement('.controls').getElements('li');
		var container = $('<?php echo $uniqueId; ?>');
		var manualPaused = false;
		
		container.getElement('.mask').setStyles({
			'width': <?php echo $width; ?>,
			'height': <?php echo $height; ?>,
			'overflow': 'hidden',
			'display': ''
		});
		
		container.getElement('.controls').setStyle(
			'display', ''
		);
				
		var <?php echo $uniqueId; ?> = new SlideShow(
			$('<?php echo $uniqueId; ?>').getElement('.ads'), {
				delay: <?php echo $displaytime * 1000; ?>,
				duration: <?php echo $transitiontime * 1000; ?>,
				autoplay: <?php echo $autoplay; ?>,
				transition: '<?php echo $transition; ?>'
			});
			
		// Buttons
		buttons.each(function(element, index){
		    element.addEvents({
		        click: function(){
		            <?php echo $uniqueId; ?>.show(index);
		        }
		    });
		});
		
		// Active Button
		<?php echo $uniqueId; ?>.addEvent('show', function(slideData) {
			buttons[slideData.previous.index].removeClass('active');
			buttons[slideData.next.index].addClass('active');
		});
		
		container.addEvent('mouseenter', function() { <?php echo $uniqueId; ?>.pause(); });
		container.addEvent('mouseleave', function() { if (!manualPaused) <?php echo $uniqueId; ?>.play(); });
	});
</script>
<noscript>
	<a target='_blank' href='<?php echo $params->get('ckurl').'?'.$ncode;?>'>
		<img style="border: 0;" alt='advertisment <?php echo $zonename; ?>' src='<?php echo $params->get('avwurl').'?zoneid='.$noscript.'&amp;'.$ncode; ?>' />
	</a>
</noscript>