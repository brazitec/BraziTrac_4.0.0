<?php
/**
 * @package		$Id: brazitrac.php 2 2014-07-30 08:16:00Z RS $
 * @author 		Robert Skolnick
 * @copyright	2007-2014 BraziTech. All rights reserved.
 * @license		GNU/GPL.
 */
// no direct access
defined('_JEXEC') or die;
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
$version = new JVersion();
$obJVer  = $version->getShortVersion();
$isJ25 = substr($obJVer, 0,3)=="2.5";

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_brazitrac'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
} 
jimport('joomla.application.component.controller');

$document = JFactory::getDocument();
$document->addStyleSheet('components\com_brazitrac\assets\javascript\moorainbow\moorainbow.css');

// Get an instance of the controller prefixed by BraziTrac
$controller = JControllerLegacy::getInstance('BraziTrac');
 
// Perform the Request task and Execute request task
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();
