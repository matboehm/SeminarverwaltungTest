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
$GLOBALS['TL_LANG']['tl_seminar_category']['title']   = array('Titel', 'Bitte geben Sie Kategorie ein.');
$GLOBALS['TL_LANG']['tl_seminar_category']['alias']   = array('Aliasname', 'Aliasname wird automatisch generiert.');
$GLOBALS['TL_LANG']['tl_seminar_category']['sv_jumpTo']  = array('Weiterleitungsseite zum Seminar', 'Standardweiterleitung für die Seminare dieser Kategorie.');
$GLOBALS['TL_LANG']['tl_seminar_category']['sv_jumpTo_category']  = array('Weiterleitung zur Kategorieseite', 'Wählen Sie die Weiterleitungsseite für die Kategorie aus.');
$GLOBALS['TL_LANG']['tl_seminar_category']['teaser']         = array('Kurzbeschreibung', 'Kurze Kategoriebeschreibung für Listendarstellungen.');
$GLOBALS['TL_LANG']['tl_seminar_category']['details']        = array('Kategoriebeschreibung', 'Ausführliche Kategoriebeschreibung');
$GLOBALS['TL_LANG']['tl_seminar_category']['tstamp'] 	= array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');
$GLOBALS['TL_LANG']['tl_seminar_category']['protected']	= array('Zugiffsschutz', 'Zugriffsschutz für zugelassene Mitgliedergruppen.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_seminar_category']['title_legend']     = 'Titel';
$GLOBALS['TL_LANG']['tl_seminar_category']['teaser_legend']    = 'Teaser';
$GLOBALS['TL_LANG']['tl_seminar_category']['text_legend']      = 'Beschreibung';
$GLOBALS['TL_LANG']['tl_seminar_category']['comments_legend']  = 'Kommentare';
$GLOBALS['TL_LANG']['tl_seminar_category']['protected_legend'] = 'Zugriffsschutz';
$GLOBALS['TL_LANG']['tl_seminar_category']['feed_legend']      = 'RSS/Atom-Feed';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_seminar_category']['notify_admin']  = 'Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar_category']['notify_author'] = 'Autor des Seminars';
$GLOBALS['TL_LANG']['tl_seminar_category']['notify_both']   = 'Autor und Systemadministrator';
$GLOBALS['TL_LANG']['tl_seminar_category']['source_teaser'] = 'Teasertexte';
$GLOBALS['TL_LANG']['tl_seminar_category']['source_text']   = 'Komplette Beiträge';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_seminar_category']['new']        = array('Neue Seminarkategorie', 'Eine neue Seminarkategorie erstellen');
$GLOBALS['TL_LANG']['tl_seminar_category']['show']       = array('Seminarkategoriedetails', 'Details des Seminarkategorie ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_seminar_category']['edit']       = array('Seminarkategorie bearbeiten', 'Seminarkategorie ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar_category']['editheader'] = array('Seminarkategorie-Einstellungen bearbeiten', 'Einstellungen der Seminarkategorie ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_seminar_category']['copy']       = array('Seminarkategorie duplizieren', 'Seminarkategorie ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_seminar_category']['delete']     = array('Seminarkategorie löschen', 'Seminarkategorie ID %s löschen');

?>