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


// Some usefull constants
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if(!defined('BR')) define("BR", "<br />");
if(!defined('LN')) define("LN", "\n");

// Main component aliases
if (!defined('COM_SERIALS')) define('COM_SERIALS', 'com_serials');
if (!defined('SERIALS_CLASS')) define('SERIALS_CLASS', 'Serials');

// Component paths constants
if (!defined('JPATH_ADMIN_SERIALS')) define('JPATH_ADMIN_SERIALS', JPATH_ADMINISTRATOR . '/components/' . COM_SERIALS);
if (!defined('JPATH_SITE_SERIALS')) define('JPATH_SITE_SERIALS', JPATH_SITE . '/components/' . COM_SERIALS);

$app = JFactory::getApplication();

// This constant is used for replacing JPATH_COMPONENT, in order to share code between components.
if (!defined('JPATH_SERIALS')) define('JPATH_SERIALS', ($app->isSite()?JPATH_SITE_SERIALS:JPATH_ADMIN_SERIALS));

// Load the component Dependencies
require_once(dirname(__FILE__) . '/helper.php');


jimport('joomla.version');
$version = new JVersion();

if (version_compare($version->RELEASE, '3.0', '<'))
	throw new JException('Joomla! 3.x is required.');

// Proxy alias class : CONTROLLER
if (!class_exists('CkJController')){ 	jimport('legacy.controller.legacy'); 	class CkJController extends JControllerLegacy{}}

// Proxy alias class : MODEL
if (!class_exists('CkJModel')){			jimport('legacy.model.legacy');			class CkJModel extends JModelLegacy{}}

// Proxy alias class : VIEW
if (!class_exists('CkJView')){	if (!class_exists('JViewLegacy', false))	jimport('legacy.view.legacy'); class CkJView extends JViewLegacy{}}

require_once(dirname(__FILE__) . '/../classes/loader.php');

SerialsClassLoader::setup(false, false);
SerialsClassLoader::discover('Serials', JPATH_ADMIN_SERIALS, false, true);

// Some helpers
SerialsClassLoader::register('JToolBarHelper', JPATH_ADMINISTRATOR ."/includes/toolbar.php", true);

CkJController::addModelPath(JPATH_SERIALS . '/models', 'SerialsModel');
// Register JDom
JLoader::register('JDom', JPATH_ADMIN_SERIALS . '/dom/dom.php', true);

//Instance JDom
if (!isset($app->dom))
{
	if (!class_exists('JDom'))
		jexit('JDom is required');

	JDom::getInstance();	
}

