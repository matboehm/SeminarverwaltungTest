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
 * Load tl_content language file
 */
$this->loadLanguageFile('tl_seminar');
$this->loadLanguageFile('tl_seminar_events');

/**
 * Table tl_seminar_events
 */
$GLOBALS['TL_DCA']['tl_seminar_events']['palettes']['default'] =  'intern,alias;{date_legend},addTime,date,multipleDate;recurring;{details_legend:hide},location,details,specials;places_requested,places_booked;
{organizer_legend:hide},organizer,facilitator;{published_legend},published;{expert_legend:hide},cssClass,start,stop;';
$GLOBALS['TL_DCA']['tl_seminar_events']['fields']['location'] = array
(
		'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['location'],
		'default'				  => '',
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>false, 'maxlength'=>255)
);

?>