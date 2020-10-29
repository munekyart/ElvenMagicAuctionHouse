<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		AuctioneerDB
* @subpackage	auctions
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

	<div class="control-group field-auctionID">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_AUCTIONID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'auctionID',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-owner">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_OWNER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'owner',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-hrsLeft">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_HRSLEFT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'hrsLeft',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-bidPrice">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_BIDPRICE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'bidPrice',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-buyoutPrice">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_BUYOUTPRICE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'buyoutPrice',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-currentBidOf">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_CURRENTBIDOF" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'currentBidOf',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-datetime">
    	<div class="control-label">
			<label><?php echo JText::_( "SERIALS_FIELD_AUCTIONDATETIME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'datetime',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>