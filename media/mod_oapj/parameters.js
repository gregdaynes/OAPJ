window.addEvent('domready', function() {
	
	var modeSelector = $('jform_params_general_mode'),
		currentMode  = modeSelector.getProperty('value'),
		params		 = $(document).getElements('[id^=jform_params_]')
		;
		
		console.log(currentMode);
		
	var updateFields = function() {
				
		// filter params we don't need (not current mode)
			// into a new array
		filteredParams = params.filter(function(field, i) {
			

			
						
			if (currentMode == 'loader' || currentMode == 'placeholder') {
				if (field.id.contains('pl_')) {
					return false;
				};
			} 
			
			if (field.id.contains('jform_params_'+currentMode) ||
			    field.id.contains('jform_params_general') ||
			    field.id.contains('jform_params_moduleclass_')) {
					return false;
			}
			
			return true;
			
		});

		// hide all params in new array		
		params.setStyle('display', '');
		filteredParams.each(function(field) {
			field.setStyle('display', 'none');
		});
				
	};
	
		
	// 0 block   1 placeholder   2 loader
	modeSelector.addEvent('change', function() {
		currentMode = this.getProperty('value');
		updateFields();
		
	});
	
	updateFields();
});