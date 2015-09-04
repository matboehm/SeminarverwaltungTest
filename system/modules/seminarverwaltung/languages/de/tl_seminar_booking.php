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
$GLOBALS['TL_LANG']['tl_seminar_booking']['title']          = array('Titel', 'Bitte geben Sie den Titel des Seminars ein.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['author']         = array('Autor', 'Bearbeiter dieser Buchung.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['pid']         	= array('Seminarevent', 'Bitte geben Sie ein Seminarevent an.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['seminarid']     	= array('Seminar', 'Bitte geben Sie ein Seminar an.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['intern']         = array('Interne Bezeichnung', 'Bitte geben Sie die Bezeichnung des Seminarevents ein.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['remark']        	= array('Bemerkung', 'Bemerkungen zur Buchung.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['currency']       = array('Währung', 'Währungsangabe.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['cost']       	= array('Kosten', 'Geben Sie die Kosten des Seminars an.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['tstamp']         = array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');
$GLOBALS['TL_LANG']['tl_seminar_booking']['published']      = array('Seminar veröffentlichen', 'Das Seminar auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['reservation']   	= array('Reservierung', 'Reservierungsstatus und -datum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['reservation_date']= array('Reservierungsdatum', 'Reservierungsdatum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['booking'] 	  	= array('Buchung', 'Buchungsstatus und -datum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['booking_date']	= array('Buchungsdatum', 'Buchungsdatum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['storno']		   	= array('Stornierung', 'Stornierungsstatus und -datum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['storno_date']	= array('Stornierungsdatum', 'Stornierungsdatum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['payed']		   	= array('Bezahlung', 'Bezahlstatus, Betrag und -datum setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['payment']		= array('Bezahlbetrag', 'Bezahlbetrag über alle bisher eingegangen Zahlungen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['payment_date']	= array('Bezahldatum', 'Bezahldatum letzter Eingang setzen.');
$GLOBALS['TL_LANG']['tl_seminar_booking']['completed']		= array('Buchung fertig', 'Buchung ist komplett bearbeitet und fertig.');

/**
 * Seminar configurations
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['email'] = array('Benachrichtigungs E-Mail', 'Angabe der E-Mailadresse an die diese Nachricht direkt gesendet wird.'); 
 
/**
 * Options
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['after']    = array('nach Start'); 
$GLOBALS['TL_LANG']['tl_seminar_booking']['before']     = array('vor Start'); 


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['title_legend']     = 'Titel';
$GLOBALS['TL_LANG']['tl_seminar_booking']['contact_legend']   = 'Kontaktdaten'; 
$GLOBALS['TL_LANG']['tl_seminar_booking']['booking_legend']   = 'Buchungsinfo'; 
$GLOBALS['TL_LANG']['tl_seminar_booking']['payment_legend']   = 'Bezahlstatus'; 



$GLOBALS['TL_LANG']['tl_seminar_booking']['protected_legend'] = 'Zugriffsschutz';

$GLOBALS['TL_LANG']['tl_seminar_booking']['text_legend']      = 'Seminartext';
$GLOBALS['TL_LANG']['tl_seminar_booking']['image_legend']     = 'Bild-Einstellungen';
$GLOBALS['TL_LANG']['tl_seminar_booking']['enclosure_legend'] = 'Anlagen';
$GLOBALS['TL_LANG']['tl_seminar_booking']['source_legend']    = 'Weiterleitungsziel';
$GLOBALS['TL_LANG']['tl_seminar_booking']['expert_legend']    = 'Experten-Einstellungen';
$GLOBALS['TL_LANG']['tl_seminar_booking']['publish_legend']   = 'Veröffentlichung'; 
$GLOBALS['TL_LANG']['tl_seminar_booking']['dates_legend']     = 'Seminartermine'; 
/**
 * References
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['notify_admin']  = 'Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar_booking']['notify_author'] = 'Autor des Seminars';
$GLOBALS['TL_LANG']['tl_seminar_booking']['notify_both']   = 'Autor und Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar_booking']['source_teaser'] = 'Teasertexte';
$GLOBALS['TL_LANG']['tl_seminar_booking']['source_text']   = 'Komplette Beiträge';
/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['new']        = array('Neue Seminarbuchung', 'Eine neue Buchung erstellen');
$GLOBALS['TL_LANG']['tl_seminar_booking']['show']       = array('Buchungsdetails', 'Details der Buchung ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_seminar_booking']['edit']       = array('Buchung bearbeiten', 'Buchung ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar_booking']['editheader'] = array('Buchung-Einstellungen bearbeiten', 'Einstellungen der Buchung ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar_booking']['copy']       = array('Buchung duplizieren', 'Buchung ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_seminar_booking']['delete']     = array('Buchung löschen', 'Buchung ID %s löschen');
/**
 * Global Operations
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['seminarexport'] = array('CSV-Export Kurse','Exportiert alle Kursevents in eine CSV-Datei');
$GLOBALS['TL_LANG']['tl_seminar_booking']['bookingexport'] = array('CSV-Export Buchungen','Exportiert alle Buchungen in eine CSV-Datei');
/**
 * Texte / Formular
 */
$GLOBALS['TL_LANG']['tl_seminar_booking']['salutationMan']     = 'Sehr geehrter Herr';
$GLOBALS['TL_LANG']['tl_seminar_booking']['salutationWoman']   = 'Sehr geehrte Frau';
$GLOBALS['TL_LANG']['tl_seminar_booking']['weekdays']          = array('So','Mo','Di','Mi','Do','Fr','Sa');

?>