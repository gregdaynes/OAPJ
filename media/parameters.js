window.addEvent('domready', function() {
	
	var modeSelector = $('paramsgeneral_mode'),
		currentMode  = modeSelector.getProperty('value'),
		params		 = $(document).getElements('[name^=params]')
		;
		
	var updateFields = function() {
				
		// filter params we don't need (not current mode)
			// into a new array
		filteredParams = params.filter(function(field, i) {
						
			if (currentMode == 'loader' || currentMode == 'placeholder') {
				if (field.getProperty('name').contains('params[pl_')) {
					return false;
				};
			}
			
			if (field.getProperty('name').contains('params['+currentMode) ||
			    field.getProperty('name').contains('params[general')) {
					return false;
			}
			
			return true;
		});
					
		// hide all params in new array
		params.getParent().getParent().setStyle('display', '');
		filteredParams.each(function(field) {
			field.getParent().getParent().setStyle('display', 'none');
		});
				
	};
	
		
	// 0 block   1 placeholder   2 loader
	
	modeSelector.addEvent('change', function() {
		
		currentMode = this.getProperty('value');
		
		updateFields();
		
	});
	
	updateFields();
	
});