<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Gerd Regnery 2011 - 2013
 * @author     Gerd Regnery <http://www.webdesign-impulse.de>
 * @package    Seminarverwaltung
 * @license    Commercial 
 */

/* Hooks */

/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD'], 1, array ('seminarverwaltung' => array
(
	'seminar' => array
	(
		'tables'     => array('tl_seminar_category','tl_seminar','tl_seminar_events'),
		'icon'       => 'system/modules/seminarverwaltung/assets/sv_verwaltung.png'
	),
	'seminar_booking' => array
	(
		'tables'     => array('tl_seminar_booking'),
		'icon'       => 'system/modules/seminarverwaltung/assets/sv_buchungen.png'
	),
/*
	'seminar_mail' => array
	(
		'tables'     => array('tl_seminar_mail'),
		'icon'       => 'system/modules/seminarverwaltung/assets/sv_mail.png'
	),
	'seminar_address' => array
	(
		'tables'     => array('tl_seminar_address'),
		'icon'       => 'system/modules/seminarverwaltung/assets/sv_adressen.png'
	),
	'seminar_config' => array
	(
		'tables'     => array('tl_seminar_config'),
		'icon'       => 'system/modules/seminarverwaltung/assets/sv_config.png'
	)
*/
)));
$GLOBALS['BE_MOD']['seminarverwaltung']['seminar_booking']['seminarexport'] = array('SeminarExport', 'export');
$GLOBALS['BE_MOD']['seminarverwaltung']['seminar_booking']['bookingexport'] = array('SeminarExport', 'export');
if (TL_MODE == 'BE' && strlen($GLOBALS['BE_MOD']['content']['seminar_booking']['stylesheet']))	
{
  $GLOBALS['TL_CSS'][] = 'system/modules/seminarverwaltung/assets/style.css';
}
/**
 * Form Fields
 */
/*
$GLOBALS['BE_FFL']['formseminarselect'] = 'FormSeminarSelect';
$GLOBALS['TL_FFL']['formseminarselect'] = 'FormSeminarSelect';
$GLOBALS['BE_FFL']['formsemcatselect'] 	= 'FormSeminarCheckBox';
$GLOBALS['TL_FFL']['formsemcatselect'] 	= 'FormSeminarCheckBox';
*/


//EFG Support
if(!is_array($GLOBALS['EFG']['storable_fields'])) {
    $GLOBALS['EFG']['storable_fields'] = array('formseminarselect','formsemcatselect');
} else {
    array_push($GLOBALS['EFG']['storable_fields'],'formseminarselect');
    array_push($GLOBALS['EFG']['storable_fields'],'formsemcatselect');
} 
/**
 * Front end modules
 */
array_insert($GLOBALS['FE_MOD'], 2, array
(
	'seminar' => array
	(
		'seminarreader' 		=> 'ModuleSeminarReader',
		'seminarcategory'  		=> 'ModuleSeminarCategoryList',
		'seminarlist'   		=> 'ModuleSeminarList',
		'seminareventlist' 		=> 'ModuleSeminareventsList',
//		'seminarlist_all_cat'   => 'ModuleSeminarlist_AllCat',
		'seminarcalendar'   	=> 'ModuleSeminarCalendar',
		'seminarcalendarlist'  	=> 'ModuleSeminarCalendarList',
		'seminarbooking'		=> 'ModuleFormBooking',
//		'seminarbuchung'		=> 'ModuleFormularBuchung',
//		'seminarbuchung_einzeln'=> 'ModuleFormularBuchungSingle',
//		'csvexport'				=> 'CSVExport'
	)
));
/**
 * Content Elements
 */
$GLOBALS['TL_CTE']['seminarverwaltung']['seminarlist'] = 'ContentSeminarlist';
$GLOBALS['TL_CTE']['seminarverwaltung']['seminar'] 	   = 'ContentSeminar';
/**
 * Register hook to add seminar items to the indexer
 */
$GLOBALS['TL_HOOKS']['getSearchablePages'][] = array('searchPages', 'getSearchablePages');
/**
 * Permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'seminars';
$GLOBALS['TL_PERMISSIONS'][] = 'seminarp';
$GLOBALS['TL_PERMISSIONS'][] = 'seminarbookings';
$GLOBALS['TL_PERMISSIONS'][] = 'seminarbookingp';?>