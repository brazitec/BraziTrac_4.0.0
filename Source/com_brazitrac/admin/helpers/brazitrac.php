<?php
/**
 * @package		$Id: brazitrac.php 2 2014-07-30 08:16:00Z RS $
 * @author 		Robert Skolnick
 * @copyright	2007-2014 BraziTech. All rights reserved.
 * @license		GNU/GPL.
 */

// no direct access
defined('_JEXEC') or die;

/**
 * brazitrac component helper.
 */
class BrazitracHelper
{
	protected static $actions;
	
	public static function addSubmenu($vName)
	{
		$option = JRequest::getVar('option');
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_DASHBOARD_VIEW'),
			'index.php?option=com_brazitrac',
			$vName == 'articles'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_NEWS'),
			'index.php?option=com_brazitrac&view=news',
			$vName == 'departments'
		);	
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_GLOSSARY'),
			'index.php?option=com_brazitrac&view=glossary',
			$vName == 'groups'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_FAQ_CATEGORIES'),
			'index.php?option=com_brazitrac&view=staffs',
			$vName == 'staffs'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_FAQ_FAQS'),
			'index.php?option=com_brazitrac&view=fields',
			$vName == 'fields'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_RC_REQUEST_CATEGORIES'),
			'index.php?option=com_brazitrac&view=replytemplates',
			$vName == 'replytemplates'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_R_REQUESTS'),
			'index.php?option=com_brazitrac&task=request.list',
			$vName == 'priorities'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_RP_PRIORITY'),
			'index.php?option=com_brazitrac&view=emailtemplates',
			$vName == 'emailtemplates'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_STATISTICS'),
			'index.php?option=com_brazitrac&view=customercares',
			$vName == 'customercares'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BRAZITRAC_REPORTS'),
			'index.php?option=com_brazitrac&view=reports',
			$vName == 'reports'
		);
			
	}

	/**
	 * Gets a list of the actions that can be performed.
	 */
	public static function getActions($categoryId = 0, $articleId = 0)
	{
		if (empty(self::$actions))
			{
			$user	= JFactory::getUser();
			self::$actions = new JObject;
	
			$actions = array(
				'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
			);
	
			foreach ($actions as $action) {
				self::$actions->set($action,	$user->authorise($action, 'com_brazitrac'));
			}
		}
		
		return self::$actions;
	}
	
	/**
	 * get staff list from string userids determine by comma 
	 */
	
	public static function getStaffList($str) {
		$re_str = '';
		if($str) {
			$uids = explode(',',  $str);
			foreach ($uids as $uid) {
				$staff = JFactory::getUser($uid);
				$re_str .= $staff->username.' ['. $staff->name.']<br />';
			}
		}
		
		return $re_str;
	}
	
	public static function generateQuickCode($datetime) {
// 		$time = JFactory::getDate($datetime)->toFormat('%Y%m%d%H%M%S');
		$time = JFactory::getDate($datetime)->format('YmdHMS');
		$db = JFactory::getDbo();
		
		$query_code = '
			SELECT MAX(`id`)
			FROM `#__brazitrac_tickets`
		';
		$db->setQuery($query_code);
		$maxID = intval($db->loadResult());
		
		return $maxID.$time;
	}
	
	/**
	 * load Fieldset and output it as a form with all fields loaded
	 * @param unknown $fieldset
	 */
	public static function loadFieldset($form, $fieldset) {
		foreach($form->getFieldset($fieldset) as $field):
			echo '
				<div class="control-group">
					<div class="control-label">
						'.$field->label.'
					</div>
					<div class="controls">
						'.$field->input.'
					</div>
				</div>
			';
		endforeach;
	}
	
	public static function getVersion(){
		$db = JFactory::getDbo();
		$sql = "SELECT * FROM `#__extensions` WHERE `type`='component' AND `element`='com_brazitrac'";
		$db->setQuery($sql);
		$res = $db->loadObject();
		$manifest_cache = json_decode($res->manifest_cache);
		$version = $manifest_cache->version;
		return $version;
	}
}