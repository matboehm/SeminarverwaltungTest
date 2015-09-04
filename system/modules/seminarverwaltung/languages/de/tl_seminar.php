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
$GLOBALS['TL_LANG']['tl_seminar']['title']          = array('Titel', 'Bitte geben Sie den Seminar-Titel ein.');
$GLOBALS['TL_LANG']['tl_seminar']['pid']         	= array('Seminarkategorie', 'Bitte geben Sie eine Seminarkategorie an.');
$GLOBALS['TL_LANG']['tl_seminar']['intern']         = array('Interne Bezeichnung', 'Bitte geben Sie die Seminarbezeichnung ein.');
$GLOBALS['TL_LANG']['tl_seminar']['alias']          = array('Alias Name', 'Eindeutiger Alias Name.');
$GLOBALS['TL_LANG']['tl_seminar']['author']         = array('Autor Name', 'Name des Bearbeiters.');
$GLOBALS['TL_LANG']['tl_seminar']['organizergroup']	= array('Veranstaltergruppe', 'Geben Sie bite die Seminarveranstaltergruppe an (Seminarhaus).');
$GLOBALS['TL_LANG']['tl_seminar']['organizer'] 		= array('Seminarveranstalter', 'Geben Sie bite den Seminarveranstalter an (Seminarhaus).');
$GLOBALS['TL_LANG']['tl_seminar']['location']   	= array('Seminarort (Haus/Raum)', 'Bitte geben Sie den Ort ein, wo das Seminar stattfindet (Adresse, Raum).');
$GLOBALS['TL_LANG']['tl_seminar']['facilitatorgroup'] = array('Seminarleitergruppe', 'Bitte definieren Sie die Seminarleitergruppe.');
$GLOBALS['TL_LANG']['tl_seminar']['facilitator']    = array('Seminarleiter', 'Bitte definieren Sie einen Seminarleiter.');
$GLOBALS['TL_LANG']['tl_seminar']['jumpToBooking']  = array('Weiterleitung zur Buchung', 'Weiterleitungsseite zum Buchuchungsformular.');
$GLOBALS['TL_LANG']['tl_seminar']['teaser']         = array('Kurzbeschreibung', 'Kurze Seminarbeschreibung für Listendarstellungen.');
$GLOBALS['TL_LANG']['tl_seminar']['details']        = array('Seminarbeschreibung', 'Ausführliche Seminarbeschreibung ohne Datum, Zeit, Kosten etc.');
$GLOBALS['TL_LANG']['tl_seminar']['specials']       = array('Besondere Hinweise', 'Besondere Hinweise zum Seminar.');
$GLOBALS['TL_LANG']['tl_seminar']['duration']       = array('Seminardauer', 'Bitte geben Sie einen Kurztext zur Seminardauer ein.');
$GLOBALS['TL_LANG']['tl_seminar']['showalways']     = array('Seminar immer anzeigen', 'Anzeigen des Seminars, auch wenn kein Zeitraum zugeordnet wurde.');
$GLOBALS['TL_LANG']['tl_seminar']['currency']       = array('Währung', 'Währungsangabe.');
$GLOBALS['TL_LANG']['tl_seminar']['cost']       	= array('Kosten', 'Geben Sie die Kosten des Seminars an.');
$GLOBALS['TL_LANG']['tl_seminar']['reducedcost']    = array('Kosten (reduziert)', 'Geben Sie die reduzierten Kosten für spezielle Gruppen an.');
$GLOBALS['TL_LANG']['tl_seminar']['sponsorship']    = array('Förderung', 'Geben Sie die Fördermöglichkeiten des Seminars an.');
$GLOBALS['TL_LANG']['tl_seminar']['tstamp']         = array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');
$GLOBALS['TL_LANG']['tl_seminar']['makeFeed']       = array('Feed erzeugen', 'Feed zum Seminar anlegen.');
$GLOBALS['TL_LANG']['tl_seminar']['source']       = array('Weiterleitungsziel', 'Hier können Sie die Standard-Weiterleitung überschreiben.');
$GLOBALS['TL_LANG']['tl_seminar']['default']      = array('Standard', 'Beim Anklicken des "Weiterlesen ...-Links wird der Besucher auf die Standardseite des Nachrichtenarchivs weitergeleitet.');
$GLOBALS['TL_LANG']['tl_seminar']['internal']     = array('Seite', 'Beim Anklicken des "Weiterlesen ...-Links wird der Besucher auf eine Seite weitergeleitet.');
$GLOBALS['TL_LANG']['tl_seminar']['article']      = array('Artikel', 'Beim Anklicken des "Weiterlesen ...-Links wird der Besucher auf einen Artikel weitergeleitet.');
$GLOBALS['TL_LANG']['tl_seminar']['external']     = array('Externe URL', 'Beim Anklicken des "Weiterlesen ...-Links wird der Besucher auf eine externe Webseite weitergeleitet.');
$GLOBALS['TL_LANG']['tl_seminar']['sv_jumpTo']       = array('Weiterleitungsseite', 'Bitte wählen Sie die Seite aus, zu der Besucher weitergeleitet werden, wenn Sie einen Beitrag anklicken.');
$GLOBALS['TL_LANG']['tl_seminar']['articleId']    = array('Artikel', 'Bitte wählen Sie den Artikel aus, zu der Besucher weitergeleitet werden, wenn Sie einen Beitrag anklicken.'); 
$GLOBALS['TL_LANG']['tl_seminar']['published']    = array('Seminar veröffentlichen', 'Das Seminar auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_seminar']['start']        = array('Anzeigen ab', 'Das Seminar erst ab diesem Tag auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_seminar']['stop']         = array('Anzeigen bis', 'Das Seminar nur bis zu diesem Tag auf der Webseite anzeigen.'); 
$GLOBALS['TL_LANG']['tl_seminar']['dates']        = array('Seminartermine', 'Einem Seminar Termine zuordnen.'); 
$GLOBALS['TL_LANG']['tl_seminar']['addImage']     = array('Ein Bild hinzufügen', 'Bild hinzufügen und formatieren.'); 

/**
 * Seminar configurations
 */
$GLOBALS['TL_LANG']['tl_seminar']['last_request_days'] = array('Buchung bis (in Tagen)', 'Das Event ist bis zu diesem Zeitversatz in Tagen buchbar.'); 
$GLOBALS['TL_LANG']['tl_seminar']['last_request_direction'] = array('Buchungsoption', 'Buchungsoption offen bis: vor oder nach Beginn des Events.'); 
$GLOBALS['TL_LANG']['tl_seminar']['places'] = array('Anzahl buchbarer Plätze', 'Gesamt buchbare Menge an Plätzen für dieses Event.'); 
$GLOBALS['TL_LANG']['tl_seminar']['places_min'] = array('Mindestteilnehmerzahl', 'Mindestens diese Zahl an Teilnehmern muss buchen, damit dieses Event stattfindet.');
$GLOBALS['TL_LANG']['tl_seminar']['membergroup'] = array('Teilnehmergruppe (Mitglieder)', 'Bitte wählen Sie die Teilnehmergruppe für die Mitglieder unter der die Anfragen gespeichert werden sollen.');
$GLOBALS['TL_LANG']['tl_seminar']['email'] = array('Benachrichtigungs E-Mail', 'Angabe der E-Mailadresse an die diese Nachricht direkt gesendet wird.'); 
 
/**
 * Options
 */
$GLOBALS['TL_LANG']['tl_seminar']['after']    = array('nach Start'); 
$GLOBALS['TL_LANG']['tl_seminar']['before']     = array('vor Start'); 


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_seminar']['title_legend']     = 'Titel';
$GLOBALS['TL_LANG']['tl_seminar']['protected_legend'] = 'Zugriffsschutz';
$GLOBALS['TL_LANG']['tl_seminar']['feed_legend']      = 'RSS/Atom-Feed';

$GLOBALS['TL_LANG']['tl_seminar']['teaser_legend']    = 'Teaser';
$GLOBALS['TL_LANG']['tl_seminar']['text_legend']      = 'Seminarbeschreibung';
$GLOBALS['TL_LANG']['tl_seminar']['image_legend']     = 'Bild-Einstellungen';
$GLOBALS['TL_LANG']['tl_seminar']['enclosure_legend'] = 'Anlagen';
$GLOBALS['TL_LANG']['tl_seminar']['source_legend']    = 'Weiterleitungsziel';
$GLOBALS['TL_LANG']['tl_seminar']['expert_legend']    = 'Experten-Einstellungen';
$GLOBALS['TL_LANG']['tl_seminar']['publish_legend']   = 'Veröffentlichung'; 
$GLOBALS['TL_LANG']['tl_seminar']['dates_legend']     = 'Seminartermine'; 
$GLOBALS['TL_LANG']['tl_seminar']['organizer_legend'] = 'Veranstalterdaten'; 
$GLOBALS['TL_LANG']['tl_seminar']['seminardata_legend'] = 'Seminardaten'; 
/**
 * References
 */
$GLOBALS['TL_LANG']['tl_seminar']['notify_admin']  = 'Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar']['notify_author'] = 'Autor des Seminars';
$GLOBALS['TL_LANG']['tl_seminar']['notify_both']   = 'Autor und Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar']['source_teaser'] = 'Teasertexte';
$GLOBALS['TL_LANG']['tl_seminar']['source_text']   = 'Komplette Beiträge';
/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_seminar']['new']        = array('Neues Seminar', 'Ein neues Seminar erstellen');
$GLOBALS['TL_LANG']['tl_seminar']['show']       = array('Seminardetails', 'Details des Seminars ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_seminar']['edit']       = array('Seminar bearbeiten', 'Seminar ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar']['editheader'] = array('Seminar-Einstellungen bearbeiten', 'Einstellungen des Seminars ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar']['copy']       = array('Seminar duplizieren', 'Seminar ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_seminar']['delete']     = array('Seminar löschen', 'Seminar ID %s löschen');

?>