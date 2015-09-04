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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_seminar_events']['intern']      = array('Interne Bezeichnung', 'Bitte geben Sie eine eindeutige Eventbezeichnung ein.');
$GLOBALS['TL_LANG']['tl_seminar_events']['alias']       = array('Alias Name', 'Eindeutiger Alias Name.');
$GLOBALS['TL_LANG']['tl_seminar_events']['tstamp'] 		= array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');
$GLOBALS['TL_LANG']['tl_seminar_events']['addTime'] 	= array('Uhrzeiten', 'Uhrzeiten hinzufügen');
$GLOBALS['TL_LANG']['tl_seminar_events']['startTime']	= array('Startzeit', 'Startuhrzeit des Seminars');
$GLOBALS['TL_LANG']['tl_seminar_events']['endTime'] 	= array('Endezeit', 'Endeuhrzeit des Seminars');
$GLOBALS['TL_LANG']['tl_seminar_events']['date'] 	  	= array('Startdatum', 'Kurstermin Startdatum');
$GLOBALS['TL_LANG']['tl_seminar_events']['multipleDate']= array('mehrtägiger Kurs', 'mehrtägiger Kurs mit Angabe des Enddatums');
$GLOBALS['TL_LANG']['tl_seminar_events']['endDate']	  	= array('Endedatum', 'Kurstermin Endedatum');
$GLOBALS['TL_LANG']['tl_seminar_events']['recurring'] 	= array('Wiederholung', 'Wiederholungseinstellung der Kurse');
$GLOBALS['TL_LANG']['tl_seminar_events']['repeatEach']	= array('Wiederholungsfaktor', 'Wiederholungsfaktor (Tage, Wochen, Monate,..');
$GLOBALS['TL_LANG']['tl_seminar_events']['recurrences']	= array('Anzahl Wiederholungen', 'Anzahl Wiederholungen');
$GLOBALS['TL_LANG']['tl_seminar_events']['details']		= array('Besondere Hinweise', 'Besondere Hinweise');
$GLOBALS['TL_LANG']['tl_seminar_events']['published']	= array('veröffentlicht', 'Veröffentlichen des Termins');
$GLOBALS['TL_LANG']['tl_seminar_events']['cssClass']	= array('Klasse', 'CSS Definition der Klasse');
$GLOBALS['TL_LANG']['tl_seminar_events']['start']       = array('Anzeigen ab', 'Das Event erst ab diesem Tag auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_seminar_events']['stop']        = array('Anzeigen bis', 'Das Event nur bis zu diesem Tag auf der Webseite anzeigen.'); 

/**
 * Seminar Event configurations
 */
$GLOBALS['TL_LANG']['tl_seminar_events']['places_requested'] = array('Anzahl angefragter Plätze', 'Menge der angefragten Plätze für dieses Event.'); 
$GLOBALS['TL_LANG']['tl_seminar_events']['places_booked'] = array('Anzahl gebuchter Plätze', 'Menge der gebuchten Plätze für dieses Event.'); 
//$GLOBALS['TL_LANG']['tl_seminar_events']['last_request_days'] = array('Buchung bis', 'Das Event ist bis zu diesem Zeitversatz buchbar.'); 
//$GLOBALS['TL_LANG']['tl_seminar_events']['last_request_direction'] = array('Buchungsoption', 'Buchungsoption offen bis: vor oder nach Beginn des Events.'); 
//$GLOBALS['TL_LANG']['tl_seminar_events']['membergroup'] = array('Teilnehmergruppe (Mitglieder)', 'Bitte wählen Sie die Teilnehmergruppe für die Mitglieder unter der die Anfragen gespeichert werden sollen.');
//$GLOBALS['TL_LANG']['tl_seminar_events']['email'] = array('Benachrichtigungs E-Mail', 'Angabe der E-Mailadresse an die diese Nachricht direkt gesendet wird.'); 
 
/**
 * Options
 */
//$GLOBALS['TL_LANG']['tl_seminar_events']['after']    = array('nach Start'); 
//$GLOBALS['TL_LANG']['tl_seminar_events']['before']     = array('vor Start'); 
$GLOBALS['TL_LANG']['tl_seminar_events']['days']    = array('Tag(e)'); 
$GLOBALS['TL_LANG']['tl_seminar_events']['weeks']     = array('Woche(n)'); 
$GLOBALS['TL_LANG']['tl_seminar_events']['months']     = array('Monat(e)'); 
$GLOBALS['TL_LANG']['tl_seminar_events']['years']     = array('Jahr(e)'); 

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_seminar_events']['date_legend'] 	 = 'Termin mit Datum und Uhrzeiten';
$GLOBALS['TL_LANG']['tl_seminar_events']['text_legend'] 	 = 'Seminartext';
$GLOBALS['TL_LANG']['tl_seminar_events']['details_legend'] 	 = 'Beschreibungstext';
$GLOBALS['TL_LANG']['tl_seminar_events']['published_legend'] = 'Veröffentlichung';
$GLOBALS['TL_LANG']['tl_seminar_events']['title_legend']	 = 'Titel und Weiterleitung';
$GLOBALS['TL_LANG']['tl_seminar_events']['expert_legend']	 = 'Experteneinstellung für CSS';
$GLOBALS['TL_LANG']['tl_seminar_events']['protected_legend'] = 'Zugriffsschutz';
$GLOBALS['TL_LANG']['tl_seminar_events']['organizer_legend'] = 'Veranstalterdaten'; 

/**
 * References
 */
$GLOBALS['TL_LANG']['tl_seminar_events']['notify_admin']  = 'Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar_events']['notify_author'] = 'Autor des Seminars';
$GLOBALS['TL_LANG']['tl_seminar_events']['notify_both']   = 'Autor und Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar_events']['source_teaser'] = 'Teasertexte';
$GLOBALS['TL_LANG']['tl_seminar_events']['source_text']   = 'Komplette Beiträge';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_seminar_events']['new']        = array('Neues Seminarevent', 'Eine neues Seminarevent erstellen');
$GLOBALS['TL_LANG']['tl_seminar_events']['show']       = array('Seminareventdetails', 'Details des Seminarevent ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_seminar_events']['edit']       = array('Seminarevent bearbeiten', 'Seminarevent ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar_events']['toggle']     = array('Seminarevent veröffentlichen', 'Seminarevent ID %s veröffentlichen');
$GLOBALS['TL_LANG']['tl_seminar_events']['copy']       = array('Seminarevent duplizieren', 'Seminarevent ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_seminar_events']['delete']     = array('Seminarevent löschen', 'Seminarevent ID %s löschen');

?>