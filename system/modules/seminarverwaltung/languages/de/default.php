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
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['MSC']['intern']     			= 'Interne Seminarbezeichnung (Verwaltungsinformation).';
$GLOBALS['TL_LANG']['MSC']['acceptAGB']  			= 'Ich habe die AGB gelesen und akzeptiert';
$GLOBALS['TL_LANG']['MSC']['acceptWiderruf']  		= 'Ich habe die Widerrufsklauseln gelesen und akzeptiert';
$GLOBALS['TL_LANG']['MSC']['acceptAGB_Value']  		= 'agb_akzeptiert';
$GLOBALS['TL_LANG']['MSC']['acceptWiderruf_Value']  = 'widerruf_akzeptiert';
$GLOBALS['TL_LANG']['MSC']['linkToAGB']  			= 'AGB';
$GLOBALS['TL_LANG']['MSC']['linkToWiderruf'] 		= 'Widerrufsrecht';
$GLOBALS['TL_LANG']['MSC']['anredeMann'] 			= 'Herr';
$GLOBALS['TL_LANG']['MSC']['anredeFrau'] 			= 'Frau';
$GLOBALS['TL_LANG']['MSC']['notAcceptedAGB'] 		= 'Sie haben die AGB noch nicht akzeptiert.';
$GLOBALS['TL_LANG']['MSC']['notAcceptedWiderruf'] 	= 'Sie haben die Widerrufsklauseln noch nicht akzeptiert.';
$GLOBALS['TL_LANG']['MSC']['emailWrong'] 			= 'Die E-Mail ist nicht korrekt angegeben oder leer!';
$GLOBALS['TL_LANG']['MSC']['bccWrong']   			= 'Die BCC E-Mail im Modul ist nicht korrekt angegeben oder leer!';
$GLOBALS['TL_LANG']['MSC']['emailMessage'] 			= 'Diese Mitteilung erhalten Sie zus&auml;tzlich noch per E-Mail.';
$GLOBALS['TL_LANG']['MSC']['noBooking']   			= 'Buchung derzeit nicht m&ouml;glich!';
$GLOBALS['TL_LANG']['MSC']['noSeminarData'] 		= 'Keine Daten zum Kurs ermittelt!';
$GLOBALS['TL_LANG']['MSC']['seminar']               = 'Seminar';
$GLOBALS['TL_LANG']['MSC']['seminar_category']      = 'Seminarkategorie';
$GLOBALS['TL_LANG']['MSC']['seminar_title']         = 'Seminar';
$GLOBALS['TL_LANG']['MSC']['seminar_alias']         = 'Alias';
$GLOBALS['TL_LANG']['MSC']['seminar_intern']        = 'Seminarnummer';
$GLOBALS['TL_LANG']['MSC']['seminar_date']          = 'Von - bis';
$GLOBALS['TL_LANG']['MSC']['seminar_timerange']     = 'Zeitraum';
$GLOBALS['TL_LANG']['MSC']['seminar_cost']          = 'Kosten';
$GLOBALS['TL_LANG']['MSC']['seminar_reducedcost']   = 'Redutierte Kosten';
$GLOBALS['TL_LANG']['MSC']['seminar_currency']      = 'W&auml;hrung';
$GLOBALS['TL_LANG']['MSC']['seminar_duration']      = 'Seminardauer';
$GLOBALS['TL_LANG']['MSC']['seminar_location']      = 'Veranstaltungsort';
$GLOBALS['TL_LANG']['MSC']['seminar_specials']      = 'Hinweise';
$GLOBALS['TL_LANG']['MSC']['seminarevent_dateFrom'] = 'Startdatum';
$GLOBALS['TL_LANG']['MSC']['seminarevent_dateTo']   = 'Enddatum';
$GLOBALS['TL_LANG']['MSC']['seminarevent_timeFrom'] = 'Startdatum';
$GLOBALS['TL_LANG']['MSC']['seminarevent_timeTo']   = 'Enddatum';
$GLOBALS['TL_LANG']['MSC']['seminar_specials']      = 'Hinweise';
$GLOBALS['TL_LANG']['MSC']['seminar_price'] 	    = 'Kurspreis';
$GLOBALS['TL_LANG']['MSC']['seminar_referent']		= 'Referent(in)';
$GLOBALS['TL_LANG']['MSC']['seminar_places']    	= 'Pl&auml;tze gesamt';
$GLOBALS['TL_LANG']['MSC']['seminar_freeplaces']    = 'Freie Pl&auml;tze';
$GLOBALS['TL_LANG']['MSC']['seminar_jumpTo']  		= 'Zur Buchung';
$GLOBALS['TL_LANG']['MSC']['seminar_lastRequestDays']= 'Buchung bis';
$GLOBALS['TL_LANG']['MSC']['seminar_lastRequestDirection']= 'vor oder nach Beginn';
$GLOBALS['TL_LANG']['MSC']['seminar_email']		    = 'E-Mail';
$GLOBALS['TL_LANG']['MSC']['seminar_showalways']    = 'Seminar immer anzeigen (=1)';
$GLOBALS['TL_LANG']['MSC']['seminar_reduced']		= 'reduziert';
$GLOBALS['TL_LANG']['MSC']['seminar_noParmFound']	= 'Parameter nicht gefunden!';
$GLOBALS['TL_LANG']['MSC']['seminar_noData']		= 'Keine Daten zum Seminar ermittelt!';
$GLOBALS['TL_LANG']['MSC']['seminar_noCatData']		= 'Keine Daten zur Kategorie ermittelt!';
$GLOBALS['TL_LANG']['MSC']['seminar_choose Seminar']= 'Bitte Seminar ausw&auml;hlen';
//
$GLOBALS['TL_LANG']['MSC']['seminarevent_specials'] = 'Besondere Hinweise';
$GLOBALS['TL_LANG']['MSC']['seminarevent_details']  = 'Eventdetails';
//
$GLOBALS['TL_LANG']['MSC']['seminar_bookingstate']  = 'Status';
$GLOBALS['TL_LANG']['MSC']['seminar_bookingstate_full']  = 'Ausgebucht';
//
$GLOBALS['TL_LANG']['MSC']['seminartooltip_datesOK']   = 'Folgende Termine finden statt:';
$GLOBALS['TL_LANG']['MSC']['seminarical_add2cal']   = 'zum eigenen Kalender hinzufügen';
//
$GLOBALS['TL_LANG']['MSC']['seminarheading_date']    = 'Datum';
$GLOBALS['TL_LANG']['MSC']['seminarheading_time']    = 'Zeit';
$GLOBALS['TL_LANG']['MSC']['seminarheading_title']   = 'Titel';
$GLOBALS['TL_LANG']['MSC']['seminarheading_intern']  = 'Buchungsnr.';
$GLOBALS['TL_LANG']['MSC']['seminarheading_location']= 'Ort';
$GLOBALS['TL_LANG']['MSC']['seminarheading_category']= 'Kategorie';
$GLOBALS['TL_LANG']['MSC']['seminarheading_intern']  = 'Kursnr.';
$GLOBALS['TL_LANG']['MSC']['seminarheading_referent']= 'Referent(in)';
$GLOBALS['TL_LANG']['MSC']['seminarheading_cost']    = 'Kosten';
$GLOBALS['TL_LANG']['MSC']['seminarheading_free']    = 'Freie Pl&auml;tze';
$GLOBALS['TL_LANG']['MSC']['seminarheading_jumpTo']  = 'Zur Buchung';
//
$GLOBALS['TL_LANG']['MSC']['seminar_bookingform_heading']= 'Buchungsformular';
$GLOBALS['TL_LANG']['MSC']['seminar_bookingform_hint']   = 'Die mit einem * markierten Felder sind Pflichtfelder.';
// seminar buchung Felder 
$GLOBALS['TL_LANG']['MSC']['seminar_gender'] 		= 'Anrede';
$GLOBALS['TL_LANG']['MSC']['seminar_firstname']		= 'Vorname';
$GLOBALS['TL_LANG']['MSC']['seminar_lastname']		= 'Nachname';
$GLOBALS['TL_LANG']['MSC']['seminar_street']		= 'Stra&szlig;e, Hausnummer';
$GLOBALS['TL_LANG']['MSC']['seminar_postal']		= 'PLZ';
$GLOBALS['TL_LANG']['MSC']['seminar_city']			= 'Ort';
$GLOBALS['TL_LANG']['MSC']['seminar_phone']			= 'Telefon';
$GLOBALS['TL_LANG']['MSC']['seminar_mobile'] 		= 'Mobilnummer';
$GLOBALS['TL_LANG']['MSC']['seminar_fax'] 			= 'Fax';
$GLOBALS['TL_LANG']['MSC']['seminar_email']			= 'E-Mail';
$GLOBALS['TL_LANG']['MSC']['seminar_remark']		= 'Mitteilung';
// buchungstemplate
$GLOBALS['TL_LANG']['MSC']['seminar_toolate']		= 'Die Anmeldefrist ist überschritten! Eine Buchung ist leider nicht mehr möglich.';
$GLOBALS['TL_LANG']['MSC']['seminar_full']	   	    = 'Das Seminar ist ausgebucht! Aber Sie können sich gerne vormerken lassen, falls noch ein Platz frei wird.';
$GLOBALS['TL_LANG']['MSC']['seminar_intime']		= 'Jetzt buchen, solange noch Pl&auml;tze frei sind!';
$GLOBALS['TL_LANG']['MSC']['seminar_bookingpossible'] = 'Buchung möglich!';
$GLOBALS['TL_LANG']['MSC']['seminar_reservationSubmit']		= 'Vormerkung';
$GLOBALS['TL_LANG']['MSC']['seminar_bookingSubmit']		= 'kostenpflichtige Buchung';

// template buchung_single
$GLOBALS['TL_LANG']['MSC']['seminar_details']    	= 'Seminardetails';
$GLOBALS['TL_LANG']['MSC']['seminar_teaser']    	= 'Seminarteaser';
$GLOBALS['TL_LANG']['MSC']['seminar_attendance']    = 'Teilnehmerzahl';
$GLOBALS['TL_LANG']['MSC']['seminar_min']		    = 'mindestens';
$GLOBALS['TL_LANG']['MSC']['seminar_max']    		= 'maximal';
$GLOBALS['TL_LANG']['MSC']['seminar_participant']   = 'Teilnehmer';
$GLOBALS['TL_LANG']['MSC']['seminar_nobooking'] 	= 'Buchung nicht mehr m&ouml;glich!';
// spezialFelder
$GLOBALS['TL_LANG']['MSC']['seminar_gender_male'] 	= 'm&auml;nnlich';
$GLOBALS['TL_LANG']['MSC']['seminar_gender_female']	= 'weiblich';
$GLOBALS['TL_LANG']['MSC']['seminar_choose']	    = 'Bitte Seminar w&auml;hlen';
$GLOBALS['TL_LANG']['MSC']['seminar_category_choose'] = 'Bitte Kategorie w&auml;hlen';
$GLOBALS['TL_LANG']['MSC']['seminar_button_booking'] = 'Zahlungspflichtige Anmeldung';
$GLOBALS['TL_LANG']['MSC']['seminar_button_reservation'] = 'Zahlungspflichtige Anmeldung';
$GLOBALS['TL_LANG']['MSC']['seminar_button_register'] = 'Anmelden';
$GLOBALS['TL_LANG']['MSC']['noSeminarSelected']     = 'Sie müssen ein Seminar auswählen!';   
$GLOBALS['TL_LANG']['MSC']['seminar_captcha']       = 'Sicherheitsabfrage';

?>