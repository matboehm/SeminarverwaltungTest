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

/**
 * Back end modules
 */
$GLOBALS['TL_LANG']['MOD']['seminarverwaltung'] = array('Seminarverwaltung', 'Seminare verwalten.');
$GLOBALS['TL_LANG']['MOD']['seminar'] = array('Seminare', 'Seminare verwalten.');
$GLOBALS['TL_LANG']['MOD']['seminar_booking'] = array('Anfragen', 'Anfragen und Buchungen verwalten.');
$GLOBALS['TL_LANG']['MOD']['seminar_mail'] = array('E-Mail', 'E-Mail zu den Anfragen verwalten.');
$GLOBALS['TL_LANG']['MOD']['seminar_address'] = array('Adressen', 'Adressverwaltung: Teilnehmer, Kursleiter, Räumlichkeiten, etc.');
$GLOBALS['TL_LANG']['MOD']['seminar_config'] = array('Konfiguration', 'Konfiguration der Seminarverwaltung.');
/* Formularfelder */
$GLOBALS['TL_LANG']['MOD']['formseminarselect']   	= array('Seminarauswahl', 'Selektion aus einer Seminarliste.');
$GLOBALS['TL_LANG']['MOD']['formsemcatselect']   	= array('Seminarkategorieauswahl', 'Selektion einer Seminarkategorie.');
/**
 * Front end modules
 */
$GLOBALS['TL_LANG']['FMD']['seminarevents'] 		= 'Seminartermine';
$GLOBALS['TL_LANG']['FMD']['seminar']      		 	= array('Seminar', 'Fügt der Seite einen Seminar hinzu.');
$GLOBALS['TL_LANG']['FMD']['seminarcalendar']  		= array('Seminarkalender', 'Erzeugt einen Kalender zu den gewählten Kategorien mit den Seminarterminen.');
$GLOBALS['TL_LANG']['FMD']['seminarcalendarlist'] 	= array('Seminarkalender Terminliste', 'Erzeugt eine Liste zum Kalender mit den Seminarterminen.');
$GLOBALS['TL_LANG']['FMD']['seminarcategory']		= array('Seminarkategorie', 'Listet alle Seminarkategorien auf.');
$GLOBALS['TL_LANG']['FMD']['seminarcategorylist']	= array('Seminarkategorieliste', 'Listet alle Seminare zu den Kategorien auf.');
$GLOBALS['TL_LANG']['FMD']['seminareventlist'] 		= array('Seminareventliste', 'Listet alle Seminarevents eines Seminars auf.');
$GLOBALS['TL_LANG']['FMD']['seminarlist']   		= array('Seminarliste', 'Listet alle Seminare einer bestimmten Kategorie auf.');
$GLOBALS['TL_LANG']['FMD']['seminarlist_all_cat']	= array('Seminarliste Alle Kategorien', 'Listet alle Seminar aller Kategorien auf.');
$GLOBALS['TL_LANG']['FMD']['seminarreader'] 		= array('Seminarleser', 'Stellt ein einzelnes Seminar dar.');
$GLOBALS['TL_LANG']['FMD']['seminarical_reader'] 	= array('Seminar Kalender Import', 'Import das aktuelle Event in einen iCal-Kalender.');
$GLOBALS['TL_LANG']['FMD']['seminarmenu']   		= array('Seminarliste-Menü', 'Erzeugt ein Menü zur Navigation der Seminarliste.');
$GLOBALS['TL_LANG']['FMD']['seminarbooking']   		= array('Seminar Buchungsformular', 'Buchungsformular mit und ohne Auswahl eines Seminars aus der Gesamtpalette.');
$GLOBALS['TL_LANG']['FMD']['seminarbooking_seminar']= array('Seminar Buchungsformular mit Seminarzuordnung', 'Buchungsformular mit Zuordnung zu einem Seminars.');
$GLOBALS['TL_LANG']['FMD']['seminarbuchung']   		= array('Seminar Buchungsformular Auswahl (veraltet)', 'Buchungsformular mit Auswahl eines Seminars aus der Gesamtpalette.');
$GLOBALS['TL_LANG']['FMD']['seminarbuchung_einzeln']= array('Seminar Buchungsformular (veraltet)', 'Buchungsformular für ein einzelnes Seminar.');

/**
 * Content Elements
 */
$GLOBALS['TL_LANG']['CTE']['seminarverwaltung']      = 'Seminarverwaltung';
$GLOBALS['TL_LANG']['CTE']['seminarlist']            = array('Seminarliste zu Kategorien', 'Seminarliste anhand der Kategorieauswahl anzeigen.');
$GLOBALS['TL_LANG']['CTE']['seminar']                = array('Seminarauswahl', 'Einzelne oder mehrere Seminare zu Kategorien oder allgemein anzeigen.');
$GLOBALS['TL_LANG']['CTE']['sv_sort_none']           = 'keine Sortierung';
$GLOBALS['TL_LANG']['CTE']['sv_sort_date_asc']        = 'nach nächstmöglichem Datum aufwärts';
$GLOBALS['TL_LANG']['CTE']['sv_sort_date_desc']      = 'nach nächstmöglichem Datum abwärts';
$GLOBALS['TL_LANG']['CTE']['sv_sort_alpha_asc']       = 'Alphabetisch aufwärts';
$GLOBALS['TL_LANG']['CTE']['sv_sort_alpha_desc']     = 'Alphabetisch abwärts';


?>