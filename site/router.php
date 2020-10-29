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

require_once(JPATH_ADMINISTRATOR . '/components/com_serials/helpers/loader.php');


/**
* Create the SEF url.
*
* @param	array	&$query	List of the vars of the query.
*
* @return	array	Segments for the SEF route.
*/
function SerialsBuildRoute(&$query)
{
	// Fork system
	if (function_exists('SerialsCkBuildRoute')) return SerialsCkBuildRoute($query);

	$view = null;
	$segments = array();
	if(isset($query['view']))
	{
		$view = $query['view'];

		// First segment always the view name
		$segments[] = $view;

		unset( $query['view'] );

		$configRoute = SerialsRouteConfig();

		if (isset($configRoute[$view]))
		foreach($configRoute[$view] as $config)
		{
			$type = (isset($config['type'])?$config['type']:'var');
			$value = null;
			switch($type)
			{
				case 'layout':
					if (isset($query['layout']))
					{
						$value = $query['layout'];
						unset($query['layout']);
					}
					break;

				case 'slug':

					$id = null;
					if (isset($query['id']))
					{
						$id = $query['id'];
						unset($query['id']);
					}
					else if (isset($query['cid']))
					{
						$id = $query['cid'];
						unset($query['cid']);
					}

					if (is_array($id))
					{
						if (count($id))
							$id = $id[0];
						else
							$id = null;
					}

					if($id)
					{
						$value = $id;

						// Complete the ID with the slug (alias)
						if ((strpos($value, ':') === false) && (isset($config['aliasKey'])))
							$value = SerialsBuildSlug($value, $view, $config['aliasKey']);

					}


					break;

				case 'var':
					if (!isset($config['name']))
						break;

					$varName = $config['name'];

					if (!isset($query[$varName]))
						break;

					$value = $query[$varName];

					if (is_array($value))
						$value = implode(',', $value);

					unset($query[$varName]);

					break;

				case 'filter':
					if (!isset($config['name']))
						break;

					$varName = 'filter_' . $config['name'];

					if (!isset($query[$varName]))
						break;

					$value = $query[$varName];
					unset($query[$varName]);


					if (is_array($value))
						$values = $value;
					else
						$values = explode(',', $value);

					$newValues = array();
					foreach($values as $value)
					{
						$newValue = $value;
						// Complete the ID with the slug (alias)
						if (strpos($value, ':') === false)
						{
							if (isset($config['aliasKey']) && isset($config['model']))
								$newValue = SerialsBuildSlug($value, $config['model'], $config['aliasKey']);
						}

						$newValues[] = $newValue;
					}

					$value = implode(',', $newValues);

					break;
			}

			$segments[] = $value;
		}
	}

	return $segments;

}

/**
* Create the query request from the route.
*
* @param	array	$segments	Segments of the SEF route.
*
* @return	array	Query vars.
*/
function SerialsParseRoute($segments)
{
	// Fork system
	if (function_exists('SerialsCkParseRoute')) return SerialsCkParseRoute($segments);

	$vars = array();
	$view = null;

	if (count($segments))
		$vars['view'] = $view = $segments[0];

	$nextPos = 1;

	$count = count($segments);

	$configRoute = SerialsRouteConfig();

	if (isset($configRoute[$view]))
	foreach($configRoute[$view] as $config)
	{
		if ($count <= $nextPos)
			break;

		$value = $segments[$nextPos];

		$type = (isset($config['type'])?$config['type']:'var');

		switch($type)
		{
			case 'layout':
				$vars['layout'] = $value;
				break;

			case 'slug':

				if (!isset($config['aliasKey']))
					break;

				$vars['id'] = SerialsParseSlug($value, $view, $config['aliasKey']);

				break;

			case 'var':
				if (!isset($config['name']))
					break;

				$vars[$config['name']] = $value;
				break;

			case 'filter':

				if (!isset($config['name']))
					break;

				if (is_array($value))
					$values = $value;
				else
					$values = explode(',', $value);

				$newValues = array();
				foreach($values as $value)
				{
					$newValue = $value;

					if (isset($config['aliasKey']) && isset($config['model']))
						$newValue = SerialsParseSlug($value, $config['model'], $config['aliasKey']);

					$newValues[] = $newValue;
				}

				$value = implode(',', $newValues);

				$filterName = 'filter_' . $config['name'];

				/*
				if (strpos($value, ','))
					$filterName .= '[]';
				*/

				$vars[$filterName] = $value;

				break;
		}


		$nextPos++;
	}

	return $vars;
}

/**
* Decode a slug alias and return the id of the element
*
* @param	string	$slug	Slug to decode.
* @param	string	$model	Model of the slug table.
* @param	string	$aliasKey	Alias of the table.
*
* @return	string	ID of the found item.
*/
function SerialsParseSlug($slug, $model, $aliasKey)
{
	// Fork system
	if (function_exists('SerialsCkParseSlug')) return SerialsCkParseSlug($slug, $model, $aliasKey);

	$parts = explode( ':', $slug );
	$id = $parts[0];

	if (is_numeric($id))
		return (int)$id;


	// When ID is only a string, search in database
	$item = SerialsHelper::getData($model, array(
		'id' => array(
			$aliasKey => $id
		)
	));

	if ($item)
		return $item->id;

	return null;
}

/**
* Create a slug from an item id
*
* @param	string	$id	Item ID.
* @param	string	$model	Model of the slug table.
* @param	string	$aliasKey	Alias of the table.
*
* @return	string	Slug of the found item.
*/
function SerialsBuildSlug($id, $model, $aliasKey)
{
	// Fork system
	if (function_exists('SerialsCkBuildSlug')) return SerialsCkBuildSlug($id, $model, $aliasKey);

	$item = SerialsHelper::getData($model, array(

		// Select the alias field
		'select' => $aliasKey
	), $id);

	if ($item)
		return $id . ':' . $item->$aliasKey;

	// Not found, but bypass, and keep the current id value
	return $id;
}

/**
* Router configuration.
*
*
* @return	array	Router config.
*/
function SerialsRouteConfig()
{
	// Fork system
	if (function_exists('SerialsCkRouteConfig')) return SerialsCkRouteConfig();

	return array(
		'accounts' => array(
			array(
				'type' => 'layout'
			)
		),
		'account' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'auctions' => array(
			array(
				'type' => 'layout'
			)
		),
		'auction' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'inventories' => array(
			array(
				'type' => 'layout'
			)
		),
		'inventory' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'mails' => array(
			array(
				'type' => 'layout'
			)
		),
		'mail' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		)
	);
}


// Load fork
SerialsHelper::loadFork(__FILE__);