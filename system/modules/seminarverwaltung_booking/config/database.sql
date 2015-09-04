-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- 
-- Table `tl_seminar_booking`
-- 

CREATE TABLE `tl_seminar_booking` (
 `data` blob NULL,
 `firma` varchar(255) NOT NULL default '',
 `billing_address` mediumtext NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 

-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
 `sv_form` int(10) unsigned NOT NULL default '0',
 `sv_readyPage` int(10) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
