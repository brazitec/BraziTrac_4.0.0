<?php
/**
* @package		$Id: view.html.php 2 2013-07-30 08:16:00Z RS $
* @author 		Robert Skolnick
* @copyright	2007-2014 fBraziTech. All rights reserved.
* @license		GNU/GPL.
*/

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
jimport('joomla.html.pane');

class BrazitracViewDashboard extends JViewLegacy
{
	function display($tpl = null)
	{
		JHTML::stylesheet( 'style.css', 'administrator/components/com_brazitrac/assets/' );
		JToolBarHelper::title( JText::_('COM_BRAZITRAC_CPANEL_BRAZITRAC'), 'logoBraziTech.jpg' );
		
		$this->addToolbar();
		// display
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::preferences('com_brazitrac', 500, 800, 'JOPTIONS');
	}
	
	
	/**
	 * load QuickIcons
	 *
	 */
	function loadQuickIcons()
	{
		echo '
			<ul class="thumbnails">
		';
	    # first row
		/*$this->quickiconButton('index.php?option=com_brazitrac&view=config',			'configuration_48.png', JText::_('COM_BRAZITRAC_CPANEL_CONFIGURATION'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=upgrade',			'icon_support_48.png', 			JText::_('COM_BRAZITRAC_CPANEL_SUPPORT'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=priorities',			'priority_32.png', 			JText::_('COM_BRAZITRAC_DEPARTMENT_PRIORITY'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=reports',			'reports_48.png', 			JText::_('COM_BRAZITRAC_CPANEL_REPORTS'));
		*/
		# 2nd row
		$this->quickiconButton('index.php?option=com_brazitrac&view=announcments',	'announcments.png', 	JText::_('COM_BRAZITRAC_announcmentS'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=glossary',		'glossary48.png', 	JText::_('COM_BRAZITRAC_GLOSSARY'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=faqcategory',	'faqcategory.png', 	JText::_('COM_BRAZITRAC_FAQ_CATEGORIES'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=faq',		'faq.png', 		JText::_('COM_BRAZITRAC_FAQ_FAQS'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=requestcategory',	'requestcategory.png', 	JText::_('COM_BRAZITRAC_RC_REQUEST CATEGORIES'));
	    # 3rd row
		$this->quickiconButton('index.php?option=com_brazitrac&task=department.add',	'icon-48-departments-new.png', 		JText::_('COM_BRAZITRAC_CPANEL_NEW_DEPARTMENT'));
		$this->quickiconButton('index.php?option=com_brazitrac&task=group.add',		'icon-48-groups-new.png', 		JText::_('COM_BRAZITRAC_CPANEL_NEW_GROUP'));
		$this->quickiconButton('index.php?option=com_brazitrac&task=staff.add',		'icon-48-staffs-new.png', 		JText::_('COM_BRAZITRAC_CPANEL_NEW_STAFF'));
		$this->quickiconButton('index.php?option=com_brazitrac&task=field.add',		'icon-48-custom-fields-new.png', 		JText::_('COM_BRAZITRAC_CPANEL_NEW_CUSTOMFIELD'));
		$this->quickiconButton('index.php?option=com_brazitrac&task=replytemplate.add',	'icon-48-reply-template-new.png', 		JText::_('COM_BRAZITRAC_CPANEL_NEW_REPLYTEMPLATE'));
		# other rows
		
		$this->quickiconButton('index.php?option=com_brazitrac&view=priorities',			'priority_32.png', 			JText::_('COM_BRAZITRAC_DEPARTMENT_PRIORITIES'));
		$this->quickiconButton('index.php?option=com_brazitrac&view=reports',			'reports_48.png', 			JText::_('COM_BRAZITRAC_CPANEL_REPORTS'));
		echo '
			</ul>
		';
	}
	
	/**
	 * load a Quick Icon
	 *
	 * @param unknown_type $link
	 * @param unknown_type $image
	 * @param unknown_type $text
	 */
	function quickiconButton($link, $image, $text)
	{
		$lang = JFactory::getLanguage();
		?>
		<div class="span2">
			<div class="icon">
				<a href="<?php echo $link; ?>">
					<?php  
					$src = JURI::base().'components/com_brazitrac/assets/images/icons/'. $image;
					$title = $text;
					echo '<img src="'.$src.'" title="'.$title.'"/>';
					?>
					<span><?php echo $text; ?></span>
				</a>
			</div>
		</div>
		<?php
	} // end quickiconButton

} // end class
?>