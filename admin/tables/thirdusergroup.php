<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		AuctioneerDB
* @subpackage	Usergroups
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
* Serials Table class
*
* @package	Serials
* @subpackage	Usergroup
*/
class SerialsCkTableThirdusergroup extends SerialsClassTable
{
	/**
	* Constructor
	*
	* @access	public
	* @param	object	&$db	Database connector object
	* @param	string	$tbl	Table name
	* @param	string	$key	Primary key
	*
	* @return	void
	*/
	public function __construct(&$db, $tbl = '#__usergroups', $key = 'id')
	{
		parent::__construct($tbl, $key, $db);
	}


}

// Load the fork
SerialsHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('SerialsTableThirdusergroup')){ class SerialsTableThirdusergroup extends SerialsCkTableThirdusergroup{} }

