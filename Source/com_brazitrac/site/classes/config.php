<?php
/**
 * Brazitrac Ticket System
 * 
 * @version		$Id: config.php 66 2009-03-31 14:18:46Z brazitrac $
 * @package		brazitrac
 * @package		classes
 * @license		GNU/GPL
 */

// import libraries
jimport("joomla.filter.filterinput");

/**
 * 
 * 
 */
class WConfig extends JObject
{
	/**
	 * Cached settings
	 * 
	 * @access protected
	 * @var array
	 */
    var $_settings = null;

	/**
	 * WConfig constructor
	 */
	function __construct() {
		$this->reload();
	}

	/**
	 * Reloads the config cache
	 */
	function reload() {
		// get DBO
		$database = JFactory::getDBO();
		
		// load settings
		$database->setQuery("SELECT * FROM " . WDBHelper::nameQuote("#__brazitrac_settings") . " /* WConfig::reload() */ " );
		$vars = $database->loadObjectList();
		// create category objects
		foreach($vars as $var)
		{
			// create index in array and give value
			$this->_settings[$var->name] = $var->value;
		}
	}
	
	/**
	 * Gets a WConfig setting
	 * 
	 * $type can be INT, INTEGER, FLOAT, DOUBLE, BOOL, BOOLEAN, WORD, or STRING
	 * 
	 * @param $name string Name of setting
	 * @param $default string Default value
	 * @param $type string Type to cast value as
	 */
	function get($name, $default=null, $type="STRING") {
		$value = (array_key_exists($name, $this->_settings)) ? $this->_settings[$name] : $default;
		$filter = JFilterInput::getInstance();
		return $filter->clean($value, $type);
	}
	
	/**
	 * Sets a WConfig value
	 *
	 * Only existing values can be set (cannot be used to add a config value)
	 * 
	 * @param $name string name of setting
	 * @param $value string value of setting
	 * @return boolean
	 */
	 function set($name, $value) {
	// only set if is known
		if (array_key_exists($name, $this->_settings)) {
			$this->_settings[$name] = $value;
			return true;
		}
		
		return false;
	}
	
	/**
	 * Saves updated settings
	 */
	function save()
	{
		$database = JFactory::getDBO();
		
		// itterate over settings
		foreach(array_keys($this->_settings) AS $key) {
			$database->setQuery( "UPDATE " . WDBHelper::nameQuote("#__brazitrac_settings") . " " .
			               "SET " . WDBHelper::nameQuote("value") . " = " . $database->Quote($this->_settings[$key]) . " " .
						   "WHERE " . WDBHelper::nameQuote("name") . " = " . $database->Quote($key) . " /* WConfig::save() */ ");
			$database->query();
		}
	}
	
	/**
	 * Get the global instance of WConfig
	 * 
	 * @static
	 */
	function &getInstance() {
		static $instance;
		
		if (!$instance) {
			$instance = new WConfig();
		}
		
		return $instance;
	}
}

?>