<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		AuctioneerDB
* @subpackage	mails
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



?>

<fieldset class="fieldsfly fly-horizontal">

	<div class="control-group field-mailID">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_MAILID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'mailID',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-toTheUser">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_TOTHEUSER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'toTheUser',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-mailHeader">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_MAILHEADER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'mailHeader',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-mailMessage">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_MAILMESSAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'mailMessage',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-itemIDAttached">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_ITEMIDATTACHED" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'itemIDAttached',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-itemRefID">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_ITEMREFID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'itemRefID',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-goldsAttached">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_GOLDSATTACHED" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'goldsAttached',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>