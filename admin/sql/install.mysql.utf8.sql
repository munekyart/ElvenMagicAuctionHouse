
-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : accounts
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__serials_accounts` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`username` VARCHAR(255) ,
	`password` VARCHAR(256) ,
	`golds` BIGINT(11) DEFAULT 500 ,

	PRIMARY KEY  (`id`),
	UNIQUE KEY(username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : auctions
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__serials_auctions` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`auctionID` INT(11) NOT NULL ,
	`owner` VARCHAR(32) DEFAULT 'Auctioneer Store' ,
	`hrsLeft` INT(11) ,
	`bidPrice` BIGINT(11) ,
	`buyoutPrice` BIGINT(11) ,
	`currentBidOf` VARCHAR(32) DEFAULT '-1' ,
	`datetime` VARCHAR(32) DEFAULT 'NOT NULL' ,
	`itemID` INT(11) ,
	`auctionDatetime` DATETIME ,

	PRIMARY KEY  (`id`),
	KEY `auctionID` (`auctionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : inventories
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__serials_inventories` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`userId` INT(11) DEFAULT 0 ,
	`items` VARCHAR(128) DEFAULT 'NOT NULL' ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : mails
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__serials_mails` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`mailID` INT(11) ,
	`toTheUser` INT(11) ,
	`mailHeader` VARCHAR(32) DEFAULT 'NOT NULL' ,
	`mailMessage` VARCHAR(256) DEFAULT 'NOT NULL' ,
	`itemIDAttached` INT(11) DEFAULT 0 ,
	`itemRefID` INT(11) DEFAULT 0 ,
	`goldsAttached` INT(11) DEFAULT 0 ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

