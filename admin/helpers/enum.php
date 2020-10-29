<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		AuctioneerDB
* @subpackage	AuctioneerDB
* @copyright	
* @author		 -  - 
* @license		
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');



/**
* Enumerations Helper. Create the static lists.
*
* @package	Serials
*/
class SerialsCkHelperEnum
{
	/**
	* Stores the lists in cache for optimization.
	*
	* @var array
	*/
	protected static $_cache = array();

	/**
	* Instanced name.
	*
	* @var string
	*/
	protected $enumName;

	/**
	* Instanced list.
	*
	* @var array
	*/
	public $list = array();

	/**
	* Instanced optional options.
	*
	* @var array
	*/
	protected $options = array();

	/**
	* Entry function to load a list.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration : [triad]_[field]
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	public static function _($enumName, $options = array())
	{
		$enumeration = self::getInstance($enumName);

		// Enumeration not found
		if (!$enumeration)
			return array();

		return $enumeration->getList($options);
	}

	/**
	* Enumeration constructor.
	*
	* @access	public
	* @param	string	$enumName	Name of the enumeration
	*
	* @return	void
	*/
	public function __construct($enumName)
	{
		$this->enumName = $enumName;
	}

	/**
	* Get an enumeration instance.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration
	*
	* @return	object	Enumeration instance (SerialsHelperEnum)
	*/
	public static function getInstance($enumName)
	{
		if (empty($enumName))
			return null;

		if (isset(static::$_cache[$enumName]))
			return static::$_cache[$enumName];

		$enumeration = new SerialsHelperEnum($enumName);

		static::$_cache[$enumName] = $enumeration;

		return $enumeration;
	}

	/**
	* Get an enumeration item (from enumeration instance).
	*
	* @access	public
	* @param	string	$value	Index value
	*
	* @return	array	Enumeration item
	*/
	public function getItem($value)
	{
		if (!isset($this->list[$value]))
			return null;

		return $this->list[$value];
	}

	/**
	* Load the list and return it.
	*
	* @access	protected
	* @param	array	$options	Optional configuration. (Advanced custom, not used in native)
	*
	* @return	array	Associative enumeration list.
	*/
	protected function getList($options = array())
	{
		$enumName = '___' . $this->enumName;

		if (!method_exists($this, $enumName))
			return null;

		$this->list = $this->$enumName($options);

		$this->translate();

		return $this->list;
	}

	/**
	* Get an item text (from enumeration instance).
	*
	* @access	public
	* @param	string	$value	Index value
	*
	* @return	string	Item text
	*/
	public function getText($value)
	{
		if (!$item = $this->getItem($value))
			return '';

		return $item['text'];
	}

	/**
	* Get the item of an enumeration.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration
	* @param	string	$value	Value index of the list.
	*
	* @return	array	Found item.
	*/
	public static function item($enumName, $value)
	{
		$enumeration = self::getInstance($enumName);

		// Enumeration not found
		if (!$enumeration)
			return null;

		// Load the enumeration
		$enumeration->getList();

		return $enumeration->getItem($value);
	}

	/**
	* Get the text value of an enumeration.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration
	* @param	string	$value	Value index of the list.
	*
	* @return	string	Translated text value of the found item.
	*/
	public static function text($enumName, $value)
	{
		$enumeration = self::getInstance($enumName);

		// Enumeration not found
		if (!$enumeration)
			return '';

		// Load the enumeration
		$enumeration->getList();

		return $enumeration->getText($value);
	}

	/**
	* Translate the list.
	*
	* @access	protected
	* @param	string	$source	Text field.
	* @param	string	$target	Translated Text field.
	*
	* @return	void
	*/
	protected function translate($source = 'text', $target = 'text')
	{
		if (empty($this->list))
			return;

		// Translate the texts
		foreach ($this->list as $value => $item)
			$this->list[$value][$target] = JText::_($item[$source]);
	}


}

// Load the fork
SerialsHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('SerialsHelperEnum')){ class SerialsHelperEnum extends SerialsCkHelperEnum{} }

