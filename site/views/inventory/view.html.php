<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		AuctioneerDB
* @subpackage	inventories
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
* HTML View class for the Serials component
*
* @package	Serials
* @subpackage	Inventory
*/
class SerialsCkViewInventory extends SerialsClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('inventory');

	/**
	* Execute and display a template : inventory
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayInventory($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.inventory');
		$this->item		= $item		= $this->get('Item');
		$this->canDo	= $canDo	= SerialsHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('SERIALS_LAYOUT_INVENTORY'), $this->item, 'items');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the view (prevent from direct access)
		if (!$model->canAccess($item))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('inventory.save', "SERIALS_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('inventory.apply', "SERIALS_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('inventory.cancel', "SERIALS_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();

	}


}

// Load the fork
SerialsHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('SerialsViewInventory')){ class SerialsViewInventory extends SerialsCkViewInventory{} }

