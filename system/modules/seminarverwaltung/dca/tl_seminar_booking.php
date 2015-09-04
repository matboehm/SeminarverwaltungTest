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

$this->loadLanguageFile('tl_member');
$this->loadLanguageFile('tl_seminar');
$this->loadLanguageFile('tl_seminar_events');

$GLOBALS['TL_CONFIG']['tl_seminar_booking']['startid'] = 0;
$this->Import('BackendUser','User');
/**
 * Table tl_seminar_booking
 */
$GLOBALS['TL_DCA']['tl_seminar_booking'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		//'ptable'                      => 'tl_seminar_events',
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('tl_seminar_booking', 'checkPermission'),
		),
		'onsubmit_callback' => array
		(
			array('tl_seminar_booking', 'adjustTime'),
			array('tl_seminar_booking', 'checkBookings'),
		),
		'ondelete_callback' => array
		(
			array('tl_seminar_booking', 'checkBookings'),
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'flag'                    => 1,
			'fields'                  => array('title','intern'),
			'headerFields'            => array('intern','tstamp','title'),
			'panelLayout'             => 'filter;search,limit',
			'child_record_callback'   => array('tl_seminar_booking', 'listSeminarbookings')
		),
		'label' => array
		(
			'fields'                  => array('intern','lastname','firstname'),
			'format'                  => '%s %s, %s'
		),
		'global_operations' => array
		(
			'seminarexport' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_booking']['seminarexport'],
				'href'                => 'key=seminarexport',
				'class'               => 'header_css_export',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'bookingexport' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_booking']['bookingexport'],
				'href'                => 'key=bookingexport',
				'class'               => 'header_css_export',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_booking']['edit'],
				'href'                => 'table=tl_seminar_booking&act=edit',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_booking']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_booking']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_booking']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('reservation','booking','storno','payed'),
//		'default'                     => '{title_legend},title,intern,pid,author,startDate;lastname,firstname,gender,street,postal,city,country,email,phone, mobile,fax;reservation,reservation_date,booking,booking_date,storno,storno_date;payed,payment,payment_date,cost,currency,completed;'
		'default'                     => '{title_legend},seminarid,pid,title,intern,startDate,author;{contact_legend:hide},lastname,firstname,gender,street,postal,city,country,email,phone, mobile,fax;{booking_legend},reservation,booking,storno;{payment_legend:hide},payed,cost,currency;{completion_legend:hide}completed;remark'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'reservation'				  => 'reservation_date',
		'booking'				      => 'booking_date',
		'storno'				  	  => 'storno_date',
		'payed'  				  	  => 'payment,payment_date',
	),

	// Fields
	'fields' => array
	(
		'seminarid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['seminarid'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_seminar.title',
			'eval'                    => array('doNotCopy'=>true, 'chosen'=>true, 'mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
		),
		'pid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['pid'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_seminar_events.intern',
			'eval'                    => array('doNotCopy'=>true, 'chosen'=>true, 'mandatory'=>false, 'includeBlankOption'=>true, 'tl_class'=>'w50'),

		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'intern' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['intern'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'startDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['date'],
			'default'                 => time(),
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>false, 'datepicker'=>true, 'tl_class'=>'wizard')
		),
		'author' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['author'],
			'default'                 => $this->User->id,
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_user.name',
			'eval'                    => array('doNotCopy'=>true, 'chosen'=>true, 'mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'firstname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['firstname'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'personal', 'tl_class'=>'w50')
		),
		'lastname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['lastname'],
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'personal', 'tl_class'=>'w50')
		),
		'gender' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['gender'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('m'=>'seminar_gender_male', 'w'=>'seminar_gender_female'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('includeBlankOption'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'personal', 'tl_class'=>'w50')
		),
		'street' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['street'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'address', 'tl_class'=>'w50')
		),
		'postal' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['postal'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'address', 'tl_class'=>'w50')
		),
		'city' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['city'],
			'exclude'                 => true,
			'filter'                  => true,
			'search'                  => true,
			'sorting'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'address', 'tl_class'=>'w50')
		),
		'country' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['country'],
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'inputType'               => 'select',
			'options'                 => $this->getCountries(),
			'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'address', 'tl_class'=>'w50')
		),
		'phone' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['phone'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'rgxp'=>'phone', 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'contact', 'tl_class'=>'w50')
		),
		'mobile' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['mobile'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'rgxp'=>'phone', 'decodeEntities'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'contact', 'tl_class'=>'w50')
		),
		'fax' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['fax'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'rgxp'=>'phone', 'decodeEntities'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'contact', 'tl_class'=>'w50')
		),
		'email' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_member']['email'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'rgxp'=>'email', 'unique'=>false, 'decodeEntities'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'contact', 'tl_class'=>'w50')
		),
		'reservation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['reservation'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'reservation_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['reservation_date'],
			'default'                 => '',
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>false, 'datepicker'=>true, 'tl_class'=>'wizard'),
			'save_callback' => array
			(
				array('tl_seminar_booking', 'setEmptyDate')
			)
		),
		'booking' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['booking'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'booking_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['booking_date'],
			'default'                 => time(),
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>false, 'datepicker'=>true, 'tl_class'=>'wizard'),
			'save_callback' => array
			(
				array('tl_seminar_booking', 'setEmptyDate')
			)
		),
		'storno' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['storno'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'storno_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['storno_date'],
			'default'                 => '0',
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>false, 'datepicker'=>true, 'tl_class'=>'wizard'),
			'save_callback' => array
			(
				array('tl_seminar_booking', 'setEmptyDate')
			)
		),
		'payed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['payed'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'payment' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['payment'],
			'default'                 => '0.00',
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false)
		),
		'payment_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['payment_date'],
			'exclude'                 => true,
			'default'                 => '0',
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>false, 'datepicker'=>true, 'tl_class'=>'wizard'),
			'save_callback' => array
			(
				array('tl_seminar_booking', 'setEmptyDate')
			)
		),
		'cost' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['cost'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50')
		),
		'currency' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['currency'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'completed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['completed'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		),
		'remark' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['remark'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
		),
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['cssClass'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_booking']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 2,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		)
	)
);

/**
 * Class tl_seminar_booking
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Gerd Regnery 2011-2015
 * @author     Gerd Regnery 
 * @package    Controller
 */
class tl_seminar_booking extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function initial(DataContainer $dc) {
		$rep = $GLOBALS['TL_DCA']['tl_seminar_booking']['palettes']['default'];
		if ($dc->activeRecord->pid === 0) {
			$GLOBALS['TL_DCA']['tl_seminar_booking']['palettes']['default'] = str_replace('pid,','',$rep);
		} else {
			$GLOBALS['TL_DCA']['tl_seminar_booking']['palettes']['default'] = str_replace('seminarid,','',$rep);
		}
	}

	/**
	 * Check bookings to control event ooking counts
	 */
	public function checkBookings(DataContainer $dc)
	{
		$objBookings = new CheckBookings();
		$arrResult = $objBookings->getResult();
	}

	/**
	 * Check permissions to edit table tl_seminar_booking
	 */
	public function checkPermission()
	{
		if ($this->User->isAdmin)
		{
			return;
		}
		// Set root IDs
		if (!is_array($this->User->seminarbookings) || empty($this->User->seminarbookings))
		{
			$root = array(0);
		}
		else
		{
			$root = $this->User->seminarbookings;
		}
		
		$id = strlen(Input::get('id')) ? Input::get('id') : CURRENT_ID;
		// Check current action
		switch (Input::get('act'))
		{
			case 'paste':
				// Allow
				break;

			case 'create':
				break;

			case 'cut':
			case 'copy':
				if (!in_array(Input::get('id'), $root))
				{
					$this->log('Not enough permissions to '.Input::get('act').' seminarbooking ID "'.$id.'" to calendar ID "'.Input::get('id').'"', __METHOD__, TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				// NO BREAK STATEMENT HERE

			case 'edit':
			case 'show':
			case 'delete':
			case 'toggle':
				$objSeminarbooking = $this->Database->prepare("SELECT id FROM tl_seminar_booking WHERE id=?")
											  ->limit(1)
											  ->execute($id);

				if ($objSeminarbooking->numRows < 1)
				{
					$this->log('Invalid seminarbooking ID "'.$id.'"', __METHOD__, TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				break;

			case 'select':
			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
			case 'cutAll':
			case 'copyAll':
				if (!in_array($id, $root))
				{
					$this->log('Not enough permissions to access seminarbooking ID "'.$id.'"', __METHOD__, TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				$objSeminarbooking = $this->Database->prepare("SELECT id FROM tl_seminar_booking WHERE id=?")
											  ->execute($id);

				if ($objSeminarbooking->numRows < 1)
				{
					$this->log('Invalid seminarbooking ID "'.$id.'"', __METHOD__, TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				$session = $this->Session->getData();
				$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $objSeminarbooking->fetchEach('id'));
				$this->Session->setData($session);
				break;

			default:
				if (strlen(Input::get('act')))
				{
					$this->log('Invalid command "'.Input::get('act').'"', __METHOD__, TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}


	/**
	 * Auto-generate the event alias if it has not been set yet
	 * @param mixed
	 * @param DataContainer
	 * @return string
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if (!strlen($varValue))
		{
			$autoAlias = true;
			$varValue = standardize($this->restoreBasicEntities($dc->activeRecord->title));
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_seminar_booking WHERE alias=?")
								   ->execute($varValue);

		// Check whether the alias exists
		if ($objAlias->numRows > 1 && !$autoAlias)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		// Add ID to alias
		if ($objAlias->numRows && $autoAlias)
		{
			$varValue .= '-' . $dc->id;
		}

		return $varValue;
	}
	
	/**
	 * Check the RSS-feed alias
	 * @param object
	 * @throws Exception
	 */
	public function checkFeedAlias($varValue, DataContainer $dc)
	{
		// No change or empty value
		if ($varValue == $dc->value || $varValue == '')
		{
			return $varValue;
		}

		$arrFeeds = $this->removeOldFeeds(true);

		// Alias exists
		if (array_search($varValue, $arrFeeds) !== false)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		return $varValue;
	}


	/**
	 * Check for modified calendar feeds and update the XML files if necessary
	 */
	public function generateFeed()
	{
		$session = $this->Session->get('seminar_feed_updater');

		if (!is_array($session) || count($session) < 1)
		{
			return;
		}

		$this->Session->set('seminar_feed_updater', null);
	}


	/**
	 * Schedule a seminar feed update
	 * 
	 * This method is triggered when a single seminar or multiple seminars
	 * are modified (edit/editAll).
	 * @param object
	 */
	public function scheduleUpdate(DataContainer $dc)
	{
		// Return if there is no ID 
		if (!$dc->id)
		{
			return;
		}

		// Store the ID in the session
		$session = $this->Session->get('seminar_feed_updater');
		$session[] = $dc->id;
		$this->Session->set('seminar_feed_updater', array_unique($session));
	}

	/**
	 * Adjust start end end time of the event based on date, span, startTime and endTime
	 * @param object
	 */
	public function adjustTime(DataContainer $dc)
	{
		// Return if there is no active record (override all)
		if (!$dc->activeRecord)
		{
			return;
		}

		$arrSet['startTime'] = $dc->activeRecord->date;
		$arrSet['endTime'] = $dc->activeRecord->date;

		// Add time
		if ($dc->activeRecord->addTime)
		{
			$arrSet['startTime'] = strtotime(date('Y-m-d', $arrSet['startTime']) . ' ' . date('H:i:s', $dc->activeRecord->startTime));
			$arrSet['endTime'] = strtotime(date('Y-m-d', $arrSet['endTime']) . ' ' . date('H:i:s', $dc->activeRecord->endTime));
		}

		//$this->Database->prepare("UPDATE tl_seminar_events %s WHERE id=?")->set($arrSet)->execute($dc->id);
	}

	/**
	 * Set the end date to null if empty
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function setEmptyDate($varValue, DataContainer $dc)
	{
		if ($varValue === '')
		{
			$varValue = null;
		}

		return $varValue;
	}

	/**
	 * Return the edit header button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editHeader($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || count(preg_grep('/^tl_seminar_booking::/', $this->User->alexf)) > 0) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : '';
	}


	/**
	 * Return the copy calendar button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function copyCalendar($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $this->User->hasAccess('create', 'seminarbookingp')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}


	/**
	 * Return the delete calendar button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function deleteCalendar($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $this->User->hasAccess('delete', 'seminarbookingp')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
	
	/**
	 * Get all articles and return them as array
	 * @param object
	 * @return array
	 */
	public function getArticleAlias(DataContainer $dc)
	{
		$arrPids = array();
		$arrAlias = array();

		if (!$this->User->isAdmin)
		{
			foreach ($this->User->pagemounts as $id)
			{
				$arrPids[] = $id;
				$arrPids = array_merge($arrPids, $this->getChildRecords($id, 'tl_page'));
			}

			if (empty($arrPids))
			{
				return $arrAlias;
			}

			$objAlias = $this->Database->prepare("SELECT a.id, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrPids))) .") ORDER BY parent, a.sorting")
									   ->execute($dc->id);
		}
		else
		{
			$objAlias = $this->Database->prepare("SELECT a.id, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid ORDER BY parent, a.sorting")
									   ->execute($dc->id);
		}

		if ($objAlias->numRows)
		{
			$this->loadLanguageFile('tl_article');

			while ($objAlias->next())
			{
				$arrAlias[$objAlias->parent][$objAlias->id] = $objAlias->title . ' (' . (strlen($GLOBALS['TL_LANG']['tl_article'][$objAlias->inColumn]) ? $GLOBALS['TL_LANG']['tl_article'][$objAlias->inColumn] : $objAlias->inColumn) . ', ID ' . $objAlias->id . ')';
			}
		}

		return $arrAlias;
	}
	public function listSeminarbookings($arrRow) {
		return 	'<div class="cte_type ' . $key . '"><strong>' . $arrRow['title'] . '</strong> - ' . $arrRow['intern'] . ' => '.$arrRow['lastname'].','.$arrRow['firstname'].'</div>'."\n";
	}
 
}

?>