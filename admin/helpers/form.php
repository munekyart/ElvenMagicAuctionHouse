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
* Forms Helper.
*
* @package	Serials
*/
class SerialsCkHelperForm
{
	/**
	* Check the visibility of a field, based on the ACL filter.
	*
	* @access	public static
	* @param	JFormField	$field	Field element.
	*
	* @return	boolean	True when allowed
	*/
	public static function canView($field)
	{
		if (!$access = $field->getAttribute('access'))
			return true;

		$acl = SerialsHelper::getActions();
		foreach(explode(",", $access) as $action)
			if ($acl->get($action))
				return true;

		return false;
	}

	/**
	* Method to get the groups of the field element.
	*
	* @access	public static
	* @param	Object	$element	Field element.
	*
	* @return	array	The groups.
	*/
	public static function getElementGroups($element)
	{
		$groups = array();

		$defaultOn = '';

		$model = SerialsHelper::componentModel((string)$element['model'], false);

		$namespace = array();
		foreach ($element->children() as $option)
		{
			// Only get <chain /> elements.
			if ($option->getName() != 'group')
				continue;



			// Group name
			$group = new stdClass();
			$name = (string) $option['name'];
			$group->name = $name;
			$namespace[] = $name;

			// Stores the model name of the group
			if ($model)
			{
				$relation = $model->getRelation($name);
				$group->model = (strpos($relation->model, '.')?'':'serials.') . $relation->model;

				$model = SerialsHelper::componentModel($relation->model, false);
			}

			// Value Key
			$valueKey = (string) $option['valueKey'];
			if (empty($valueKey))
				$valueKey = (count($namespace)>1?'_' . implode('_', $namespace):$namespace[0]);
			$group->valueKey = $valueKey;


			// Label Key
			$labelKey = (string) $option['labelKey'];
			if ($labelKey || isset($option['on']))
			{
				if ($defaultOn)
					$defaultOn .= '.';

				$defaultOn .= $group->name;

				// Label field. If not specified, find automaticaly the full underscore namespaced field name
				$group->on = (isset($option['on'])?(string) $option['on']:$defaultOn . ($defaultOn?'.':'') . $labelKey);
			}
			else
				$group->on = $group->name;

			// Label Key
			$group->alias = SerialsClassModelOrm::tableFieldAlias($group->on, false);

			$dir = (string) $option['dir'];
			if (!empty($dir))
				$group->dir = $dir;

			$groups[] = $group;
		}

		return $groups;
	}

	/**
	* Get the items of the given field.
	*
	* @access	public static
	* @param	JFormField	$field	Field element.
	*
	* @return	array	Items.
	*/
	public static function getItems($field)
	{
		// Uses the field local function to load the items
		if (method_exists($field, 'getItems'))
			return $field->getItems();

		// Uses a model
		$model = static::getModel($field);
		if (!$model)
			return null;

		// Trigger for model custom from the field class
		if (method_exists($field, 'prepareModel'))
			$field->prepareModel($model);

		// Load and return the items
		return $model->getItems();
	}

	/**
	* Method to get the model from a field.
	*
	* @access	public static
	* @param	JFormField	$field	Field element.
	* @param	boolean	$item	Set to true for getting the ITEM model.
	*
	* @return	JModel	The model.
	*/
	public static function getModel($field, $item = false)
	{
		if (method_exists($field, 'getModelName'))
			$model = $field->getModelName();
		else
		{
			$model = $field->getAttribute('model');
			if (empty($model))
				$model = JFactory::getApplication()->input->get('view');
		}

		return SerialsHelper::componentModel($model, $item);
	}


}

// Load the fork
SerialsHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('SerialsHelperForm')){ class SerialsHelperForm extends SerialsCkHelperForm{} }

