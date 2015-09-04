<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'sv',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'catdaten'                  => 'system/modules/seminarverwaltung/classes/catdaten.php',
	'CheckBookings'             => 'system/modules/seminarverwaltung/classes/CheckBookings.php',
	'seminardaten'              => 'system/modules/seminarverwaltung/classes/seminardaten.php',
	'seminarselect'             => 'system/modules/seminarverwaltung/classes/seminarselect.php',
	'ContentSeminar'            => 'system/modules/seminarverwaltung/ContentSeminar.php',
	'ContentSeminarlist'        => 'system/modules/seminarverwaltung/ContentSeminarlist.php',
	'FormGenderSelect'          => 'system/modules/seminarverwaltung/FormGenderSelect.php',
	'FormSeminarcategorySelect' => 'system/modules/seminarverwaltung/FormSeminarcategorySelect.php',
	'FormSeminarCheckBox'       => 'system/modules/seminarverwaltung/FormSeminarCheckBox.php',
	'FormSeminarSelect'         => 'system/modules/seminarverwaltung/FormSeminarSelect.php',
	'ModuleFormBooking'         => 'system/modules/seminarverwaltung/ModuleFormBooking.php',
	'ModuleSeminarCalendar'     => 'system/modules/seminarverwaltung/ModuleSeminarCalendar.php',
	'ModuleSeminarCalendarList' => 'system/modules/seminarverwaltung/ModuleSeminarCalendarList.php',
	'ModuleSeminarCategoryList' => 'system/modules/seminarverwaltung/ModuleSeminarCategoryList.php',
	'ModuleSeminareventsList'   => 'system/modules/seminarverwaltung/ModuleSeminareventsList.php',
	'ModuleSeminarICAL'         => 'system/modules/seminarverwaltung/ModuleSeminarICAL.php',
	'ModuleSeminarList'         => 'system/modules/seminarverwaltung/ModuleSeminarList.php',
	'ModuleSeminarReader'       => 'system/modules/seminarverwaltung/ModuleSeminarReader.php',
	'searchPages'               => 'system/modules/seminarverwaltung/searchPages.php',
	'Seminar'                   => 'system/modules/seminarverwaltung/Seminar.php',
	'sv\SeminarBookingModel'    => 'system/modules/seminarverwaltung/SeminarBookingModel.php',
	'sv\SeminarCategoryModel'   => 'system/modules/seminarverwaltung/SeminarCategoryModel.php',
	'SeminarEvents'             => 'system/modules/seminarverwaltung/SeminarEvents.php',
	'sv\SeminarEventsModel'     => 'system/modules/seminarverwaltung/SeminarEventsModel.php',
	'SeminarExport'             => 'system/modules/seminarverwaltung/SeminarExport.php',
	'SeminarManager'            => 'system/modules/seminarverwaltung/SeminarManager.php',
	'sv\SeminarModel'           => 'system/modules/seminarverwaltung/SeminarModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_ical'                            => 'system/modules/seminarverwaltung/templates',
	'mod_seminar'                         => 'system/modules/seminarverwaltung/templates',
	'mod_seminar_buchungsformular'        => 'system/modules/seminarverwaltung/templates',
	'mod_seminar_buchungsformular_single' => 'system/modules/seminarverwaltung/templates',
	'mod_seminar_calendar'                => 'system/modules/seminarverwaltung/templates',
	'mod_seminar_calendar_eventlist'      => 'system/modules/seminarverwaltung/templates',
	'mod_seminar_category'                => 'system/modules/seminarverwaltung/templates',
	'mod_seminarbooking'                  => 'system/modules/seminarverwaltung/templates',
	'mod_seminarevents_list'              => 'system/modules/seminarverwaltung/templates',
	'mod_seminarlist'                     => 'system/modules/seminarverwaltung/templates',
	'mod_seminarreader'                   => 'system/modules/seminarverwaltung/templates',
	'sv_cal_default'                      => 'system/modules/seminarverwaltung/templates',
	'sv_cal_mini'                         => 'system/modules/seminarverwaltung/templates',
	'sv_ce_seminar_events'                => 'system/modules/seminarverwaltung/templates',
	'sv_ce_seminar_events_table'          => 'system/modules/seminarverwaltung/templates',
	'sv_evt_calendarlist'                 => 'system/modules/seminarverwaltung/templates',
	'sv_evt_list'                         => 'system/modules/seminarverwaltung/templates',
	'sv_evt_listcomplete'                 => 'system/modules/seminarverwaltung/templates',
	'sv_evt_listlatest'                   => 'system/modules/seminarverwaltung/templates',
	'sv_evt_listshort'                    => 'system/modules/seminarverwaltung/templates',
	'sv_seminar_info'                     => 'system/modules/seminarverwaltung/templates',
	'sv_seminar_menu'                     => 'system/modules/seminarverwaltung/templates',
	'sv_seminarbooking_combined'          => 'system/modules/seminarverwaltung/templates',
	'sv_seminarcategory_menu'             => 'system/modules/seminarverwaltung/templates',
	'sv_seminarevent_full'                => 'system/modules/seminarverwaltung/templates',
	'sv_seminarevent_list'                => 'system/modules/seminarverwaltung/templates',
	'sv_seminarevent_seminar'             => 'system/modules/seminarverwaltung/templates',
	'vcal'                                => 'system/modules/seminarverwaltung/templates',
));
