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

if (!class_exists('SerialsHelper'))
	require_once(JPATH_ADMINISTRATOR . '/components/com_serials/helpers/loader.php');


/**
* Form field for Serials.
*
* @package	Serials
* @subpackage	Form
*/
class SerialsCkFormFieldCkxref extends SerialsClassFormField
{
	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'ckxref';

	/**
	* Method to get the field input markup.
	*
	* @access	public
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	public function getInput()
	{

		$this->input = JDom::_('html.form.input.select', array_merge(array(
				'dataKey' => $this->getOption('name'),
				'domClass' => $this->getOption('class'),
				'domId' => $this->id,
				'domName' => $this->name,
				'dataValue' => $this->value,
				'labelKey' => $this->getOption('labelKey'),
				'multiple' => true,
				'prefix' => $this->getOption('prefix'),
				'responsive' => $this->getOption('responsive'),
				'size' => $this->getOption('size', 4, 'int'),
				'suffix' => $this->getOption('suffix'),
				'valueKey' => $this->getOption('valueKey')
			), $this->jdomOptions));

		return parent::getInput();
	}


}

// Load the fork
SerialsHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldCkxref')){ class JFormFieldCkxref extends SerialsCkFormFieldCkxref{} }

