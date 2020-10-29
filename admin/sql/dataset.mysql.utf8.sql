
-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Dataset installation script
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
INSERT INTO `#__serials_accounts` (`id`,`username`,`password`,`golds`)
VALUES
('1','munkey','',500);

INSERT INTO `#__serials_auctions` (`id`,`auctionID`,`owner`,`hrsLeft`,`bidPrice`,`buyoutPrice`,`currentBidOf`,`datetime`,`itemID`,`auctionDatetime`)
VALUES
('1',1,'Auctioneer Store',123,23,23,'-1','NOT NULL',0,'');

INSERT INTO `#__serials_inventories` (`id`,`userId`,`items`)
VALUES
('1',1,'NOT NULL');

INSERT INTO `#__serials_mails` (`id`,`mailID`,`toTheUser`,`mailHeader`,`mailMessage`,`itemIDAttached`,`itemRefID`,`goldsAttached`)
VALUES
('1',1,1,'NOT NULL','NOT NULL',0,0,0);

