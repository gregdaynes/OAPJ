<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = &JFactory::getDocument();

/**
 * Parameters
 */
$zoneList		= $zoneList->zoneList;

$uniqueId		= 'id'.uniqid(rand(), false);
$width			= $params->get('general_width');
$height			= $params->get('general_height');
$ckurl			= $params->get('general_ckurl');
$avwurl			= $params->get('general_avwurl');
$displaytime	= $params->get('placeholder_displaytime', 5);
$transitiontime	= $params->get('placeholder_transitiontime', 0.25);
$autoplay		= $params->get('placeholder_autoplay', 1);
if ($autoplay == 1) { $autoplay = "true"; } else { $autoplay = "false"; }
$transition		= $params->get('placeholder_transition', 'crossFade');

$noscript = rand(0, count($zoneList) -1); // int // get random zome
$noscript = $noscript['id']; // get zone id

JHTML::_('behavior.mootools');
JHTML::script('fx.elements.js', 'media/mod_oapj/');
JHTML::script('loop.js', 'media/mod_oapj/');
JHTML::script('slideshow.js', 'media/mod_oapj/'); ?>

<div id="<?php echo $uniqueId; ?>" class="<?php echo $params->get('general_moduleclass_sfx'); ?>">
	<div class="mask" style="display: none;">
		<ul class="ads">
			<?php
				$i=1;
				foreach($zoneList as $zoneAd) { 
					$zonename = $zoneAd['name'];
					$zoneid = $zoneAd['id']; ?>
					<li id="z-<?php echo $zonename; ?>"></li>
				<?php $i++; }
			?>
		</ul>
	</div>
	<ul class="controls" style="display: none;">
		<?php
		for($i=1; $i<=count($zoneList); $i++) { ?>
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
	<a target='_blank' href='<?php echo $params->get('general_ckurl').'?'.$ncode;?>'>
		<img style="border: 0;" src='<?php echo $params->get('general_avwurl').'?zoneid='.$noscript.'&amp;'.$ncode; ?>' />
	</a>
</noscript>