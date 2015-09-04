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
$GLOBALS['TL_LANG']['tl_module']['sv_seminar_category']  = array('Seminarkategorie', 'Bitte wählen Sie einen oder mehrere Kategorien/Kalender.');
$GLOBALS['TL_LANG']['tl_module']['enclosure']       = array('Anlagen', 'Hier können Sie Dateien auswählen, um diese als Anhang versenden zu lassen.');
$GLOBALS['TL_LANG']['tl_module']['sv_show_recurring']= array('Seminaranzeige mit Wiederholungsterminen ', 'Damit wird es möglich auch währen eines laufenden Seminars zu einem Terminzeitpunkt zu buchen.');
$GLOBALS['TL_LANG']['tl_module']['sv_seminar']       = array('Seminar', 'Bitte wählen Sie einen oder mehrere Seminare.');
$GLOBALS['TL_LANG']['tl_module']['sv_order']         = array('Sortierreihenfolge', 'Hier können Sie die Sortierreihenfolge festlegen.');
$GLOBALS['TL_LANG']['tl_module']['sv_limit']         = array('Anzahl an Seminaren', 'Hier können Sie die Seminar-Anzahl beschränken. Geben Sie 0 ein, um alle anzuzeigen.');
$GLOBALS['TL_LANG']['tl_module']['sv_cal_readerModule']  = array('Seminar Lesermodul', 'Hier können Sie das Seminar Lesermodul auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_cal_template']  = array('Seminar-Kalender-Template', 'Hier können Sie das SeminarKalender-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_template']      = array('Seminar-Event-Template', 'Hier können Sie das SeminarEvent-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_category_template'] = array('Seminarkategorie-Template', 'Hier können Sie das Seminarkategorie-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_seminar_template']  = array('Seminar-Template', 'Hier können Sie das Seminar-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_seminarevent_template']  = array('Seminarevent-Template', 'Hier können Sie das Seminarevent-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_seminarbooking_template']  = array('Seminarbuchungs-Template', 'Hier können Sie das Seminarbuchungs-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_stemplate']     = array('Seminarevent-Template', 'Hier können Sie das Seminarevent-Template auswählen.');
$GLOBALS['TL_LANG']['tl_module']['sv_startDay']      = array('Erster Wochentag', 'Hier können Sie den ersten Tag der Woche festlegen.');
$GLOBALS['TL_LANG']['tl_module']['sv_showQuantity']  = array('Anzahl der Seminar-Events anzeigen', 'Die Anzahl der Seminar-Events jedes Monats im Menü anzeigen.');
$GLOBALS['TL_LANG']['tl_module']['sv_ignoreDynamic'] = array('URL-Parameter ignorieren', 'Den Zeitraum nicht anhand der date/month/year-Parameter in der URL ändern.');
$GLOBALS['TL_LANG']['tl_module']['sv_jumpTo']           = array('Weiterleitung zum Seminar', 'Wählen Sie die Weiterleitungsseite zur Seminarseite aus.');
$GLOBALS['TL_LANG']['tl_module']['sv_jumpToBuchen']  = array('Weiterleitung zur Anmeldung', 'Wählen Sie die Weiterleitungsseite für die Anmeldung aus.');
$GLOBALS['TL_LANG']['tl_module']['sv_bccMail']  	 = array('Absender Mailadresse', 'Tragen Sie hier Ihre E-Mailadresse ein.');
$GLOBALS['TL_LANG']['tl_module']['sv_fromText']  	 = array('Absendername', 'Geben Sie hier Ihre offizielle Bezeichnung für den Absender ein.');
$GLOBALS['TL_LANG']['tl_module']['sv_shortText']  	 = array('Betreffzeile', 'Definition der Betreffzeile.');
$GLOBALS['TL_LANG']['tl_module']['sv_messageText']   = array('Nachrichtentext', 'Nachrichtentext. Hier können Inserttags, wie {{sv::data}}, {{sv::description}}, {{sv::firstname}} und {{sv::lastname}} benutzt werden.');
$GLOBALS['TL_LANG']['tl_module']['sv_booking']       = array('Seminarbuchung','Buchung(ein) oder Vormerkung(aus).');

/**
 * References
 */
$GLOBALS['TL_LANG']['tl_module']['seminarcalendar_listevent'][0]   = 'Terminliste zum Kalender';
/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_module']['seminardata_legend']       = 'Seminareinstellungen';
$GLOBALS['TL_LANG']['tl_module']['seminareventsdata_legend'] = 'Eventeinstellungen';
?>