<?php // no direct access
defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.mootools');

jimport('joomla.html.html');
jimport('joomla.form.formfield');//import the necessary class definition for formfield

class JFormFieldLoadjs extends JFormField
{
	
	/**
	 * The form field type.
	 *
	 * @var string
	 * @since 1.6
	 */
	 protected $type = 'Loadjs'; //the form field type
	
	 /**
	 * Method to get content articles
	 *
	 * @return array The field option objects.
	 * @since 1.6
	 */
	 protected function getInput()
	 {
	 
		 // Output
		 return '<script src="../media/mod_oapj/parameters.js"></script>';
	 
	 }
}