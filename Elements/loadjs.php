<?php

defined('JPATH_BASE') or die();

JHTML::_('behavior.mootools');

class JElementLoadjs extends JElement
{
	function fetchElement()
	{	
		// return the javascript.
		return '<script src="../media/mod_oapj/parameters.js"></script>';
	}
}