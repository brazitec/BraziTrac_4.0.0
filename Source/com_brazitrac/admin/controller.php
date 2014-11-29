<?php
/**
 * @package		$Id: controller.php 2 2014-07-30 08:16:00Z RS $
 * @author 		Robert Skolnick
 * @copyright	2007-2014 BraziTech. All rights reserved.
 * @license		GNU/GPL.
 */
// No direct access to this file
defined('_JEXEC') or die;

 jimport('joomla.application.component.controller');
 
/**
 * General Controller of Brazitrac component
 */
class BraziTracController extends JControllerLegacy
{
	/**
	 * @var		string	The default view.
	 * @since	1.6
	 */
	protected $default_view = 'dashboard';
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			If true, the view output will be cached
	 * @param	array			An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/brazitrac.php';
		
		$view		= JRequest::getCmd('view', 'dashboard');
		$layout 	= JRequest::getCmd('layout', 'default');
		$id			= JRequest::getInt('id');
		if( $layout!='edit' ){
			// Load the submenu.
			BrazitracHelper::addSubmenu(JRequest::getCmd('view', 'dashboard'));
		}
		parent::display();

	}
}

