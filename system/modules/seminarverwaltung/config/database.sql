-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- 
-- Table `tl_seminar`
-- 
CREATE TABLE `tl_content` (
 `seminar_category` blob NULL,
 `seminar_choice` blob NULL,
 `seminar_template` varchar(64) NOT NULL default '',
 `seminar_sort` varchar(32) NOT NULL default '',
 `sv_jumpTo` int(10) unsigned NOT NULL default '0',
 `sv_show_recurring` char(1) NOT NULL default '',
) ENGINE=MyISAM default CHARSET=utf8;

CREATE TABLE `tl_seminar_category` (
 `id` int(10) unsigned NOT NULL auto_increment,
 `tstamp` int(10) unsigned NOT NULL default '0',
 `title` varchar(255) NOT NULL default '',
 `alias` varbinary(128) NOT NULL default '',
 `sv_jumpTo_category` int(10) unsigned NOT NULL default '0',
 `sv_jumpTo` int(10) unsigned NOT NULL default '0',
 `teaser` text NULL,
 `details` mediumtext NULL,
 `sortindex` int(10) unsigned NOT NULL default '0',
 `protected` char(1) NOT NULL default '',
 `groups` blob NULL,  
 `cssClass` varchar(255) NOT NULL default '', 
 `published` char(1) NOT NULL default '',
 `start` varchar(10) NOT NULL default '',
 `stop` varchar(10) NOT NULL default '', 
 PRIMARY KEY  (`id`),
) ENGINE=MyISAM default CHARSET=utf8;

CREATE TABLE `tl_seminar` (
 `id` int(10) unsigned NOT NULL auto_increment,
 `pid` int(10) unsigned NOT NULL default '0',
 `tstamp` int(10) unsigned NOT NULL default '0',
 `author` int(10) unsigned NOT NULL default '0',
 `title` varchar(255) NOT NULL default '',
 `alias` varbinary(128) NOT NULL default '',
 `intern` varchar(32) NOT NULL default '',
 `sortindex` int(10) unsigned NOT NULL default '0',
 `teaser` text NULL,
 `details` mediumtext NULL,
 `specials` text NULL,
 `location` varchar(255) NOT NULL default '',
 `cost` varchar(128) NOT NULL default '0,00',
 `currency` varchar(10) NOT NULL default '€',
 `organizer` int(10) unsigned NOT NULL default '0',
 `reducedcost` varchar(8) NOT NULL default '0,00',
 `sponsorship` varchar(255) NOT NULL default '',
 `facilitator` int(10) unsigned NOT NULL default '0',
 `type` varchar(255) NOT NULL default '',
 `organizergroup` int(10) unsigned NOT NULL default '0',
 `facilitatorgroup` int(10) unsigned NOT NULL default '0',
 `addImage` char(1) NOT NULL default '',
-- /* `singleSRC` varchar(255) NOT NULL default '',*/
 `singleSRC` binary(16) NULL,
 `alt` varchar(255) NOT NULL default '',
 `size` varchar(64) NOT NULL default '',
 `imagemargin` varchar(128) NOT NULL default '',
 `imageUrl` varchar(255) NOT NULL default '',
 `fullsize` char(1) NOT NULL default '',
 `caption` varchar(255) NOT NULL default '',
 `floating` varchar(32) NOT NULL default '',
 `addEnclosure` char(1) NOT NULL default '',
 `enclosure` blob NULL,  
 `source` varchar(32) NOT NULL default '',
 `sv_jumpTo` int(10) unsigned NOT NULL default '0',
 `articleId` int(10) unsigned NOT NULL default '0',
 `url` varchar(255) NOT NULL default '', 
 `target` char(1) NOT NULL default '', 
 `jumpToBooking` int(10) unsigned NOT NULL default '0',
 `places` int(10) unsigned NOT NULL default '0',
 `places_min` int(10) unsigned NOT NULL default '0',
 `last_request_days` varchar(10) NOT NULL default '',
 `last_request_direction` varchar(32) NOT NULL default 'before',
 `membergroup` blob NULL,
 `email` varchar(255) NOT NULL default '',
 `showalways` char(1) NOT NULL default '0',
 `duration` varchar(255) NOT NULL default '',
 `protected` char(1) NOT NULL default '',
 `cssClass` varchar(255) NOT NULL default '',
 `published` char(1) NOT NULL default '',
 `start` varchar(10) NOT NULL default '',
 `stop` varchar(10) NOT NULL default '', 
 PRIMARY KEY  (`id`),
 KEY `pid` (`pid`),
 KEY `facilitator` (`facilitator`),
 KEY `sv_jumpTo` (`sv_jumpTo`)
 KEY `articleId` (`articleId`)
) ENGINE=MyISAM default CHARSET=utf8;

-- 
-- Table `tl_seminar_events`
-- 

CREATE TABLE `tl_seminar_events` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `intern` varchar(32) NOT NULL default '',
  `alias` varbinary(128) NOT NULL default '',
  `addTime` char(1) NOT NULL default '', 
  `startTime` int(10) unsigned NOT NULL default '0',
  `multipleDate` char(1) NOT NULL default '',
  `endTime` int(10) unsigned NOT NULL default '0',
  `date` int(10) unsigned NOT NULL default '0',
  `endDate` int(10) unsigned NOT NULL default '0',
  `recurring` char(1) NOT NULL default '',
  `repeatEach` varchar(64) NOT NULL default '',
  `repeatEnd` int(10) unsigned NOT NULL default '0',
  `recurrences` int(10) unsigned NOT NULL default '0',
  `details` mediumtext NULL,
  `specials` text NULL,
  `location` varchar(255) NOT NULL default '',
  `organizer` int(10) unsigned NOT NULL default '0',
  `facilitator` int(10) unsigned NOT NULL default '0',
  `organizergroup` int(10) unsigned NOT NULL default '0',
  `facilitatorgroup` int(10) unsigned NOT NULL default '0',
  `places_requested` int(10) unsigned NOT NULL default '0',
  `places_booked` int(10) unsigned NOT NULL default '0',
  `cssClass` varchar(255) NOT NULL default '', 
  `published` char(1) NOT NULL default '',
  `start` varchar(10) NOT NULL default '',
  `stop` varchar(10) NOT NULL default '', 
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
-- 
-- Table `tl_seminar_booking`
-- 

CREATE TABLE `tl_seminar_booking` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `seminarid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `author` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `intern` varchar(32) NOT NULL default '',
  `startDate` int(10) unsigned NOT NULL default '0',
  `endDate` int(10) unsigned NOT NULL default '0',
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `gender` varchar(32) NOT NULL default '',
  `company` varchar(255) NOT NULL default '',
  `street` varchar(255) NOT NULL default '',
  `postal` varchar(32) NOT NULL default '',
  `city` varchar(255) NOT NULL default '',
  `country` varchar(2) NOT NULL default '',
  `phone` varchar(64) NOT NULL default '',
  `mobile` varchar(64) NOT NULL default '',
  `fax` varchar(64) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `reservation` char(1) NOT NULL default '',
  `reservation_date` int(10) unsigned NOT NULL default '0',
  `booking` char(1) NOT NULL default '',
  `booking_date` int(10) unsigned NOT NULL default '0',
  `payed` char(1) NOT NULL default '',
  `payment` varchar(32) NOT NULL default '0.00',
  `payment_date` int(10) unsigned NOT NULL default '0',
  `storno` char(1) NOT NULL default '',
  `storno_date` int(10) unsigned NOT NULL default '0',
  `completed` varchar(255) NOT NULL default '',
  `cost` varchar(128) NOT NULL default '',
  `currency` varchar(255) NOT NULL default '',
  `reducedcost` varchar(8) NOT NULL default '0,00',
  `remark` mediumtext NULL,
  `cssClass` varchar(255) NOT NULL default '', 
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 

-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `headline` varchar(255) NOT NULL default '',
  `sv_jumpTo` int(10) unsigned NOT NULL default '0',
  `enclosure` blob NULL,
  `sv_show_recurring` char(1) NOT NULL default '',
  `sv_seminar` blob NULL,
  `sv_seminar_category` blob NULL,
  `sv_category_template` varchar(32) NOT NULL default '',
  `sv_seminar_template` varchar(32) NOT NULL default '',
  `sv_seminarevent_template` varchar(32) NOT NULL default '',
  `sv_seminarbooking_template` varchar(32) NOT NULL default '',
  `sv_template` varchar(32) NOT NULL default '',
  `sv_stemplate` varchar(32) NOT NULL default '',
  `sv_jumpToBuchen` int(10) unsigned NOT NULL default '0',
  `sv_cal_readerModule` int(10) unsigned NOT NULL default '0',
  `sv_cal_template` varchar(32) NOT NULL default '',
  `sv_bccMail` varchar(255) NOT NULL default '',
  `sv_fromText` varchar(128) NOT NULL default '',
  `sv_shortText` varchar(255) NOT NULL default '',
  `sv_messageText` mediumtext NULL,
  `sv_booking` char(1) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

 
CREATE TABLE `tl_member_group` (
  `tags` varchar(255) NOT NULL default ''
) ENGINE=MyISAM default CHARSET=utf8;

-- 
-- Table `tl_user`
-- 

CREATE TABLE `tl_user` (
  `seminars` blob NULL,
  `seminarp` blob NULL,
  `seminarbookings` blob NULL,
  `seminarbookingp` blob NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_user_group`
-- 

CREATE TABLE `tl_user_group` (
  `seminars` blob NULL,
  `seminarp` blob NULL
  `seminarbookings` blob NULL,
  `seminarbookingp` blob NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8; 