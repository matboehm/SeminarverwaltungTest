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
$this->loadLanguageFile('tl_content');
$this->loadLanguageFile('tl_seminar');
$GLOBALS['TL_CONFIG']['tl_seminar']['startid'] = 0;

/**
 * Table tl_seminar_events
 */
$GLOBALS['TL_DCA']['tl_seminar_events'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_seminar',
		//'ctable'                      => array('tl_seminar_booking'),
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('tl_seminar_events', 'checkPermission'),
			array('tl_seminar_events', 'generateFeed')
		),
		'oncut_callback' => array
		(
			array('tl_seminar_events', 'scheduleUpdate')
		),
		'ondelete_callback' => array
		(
			array('tl_seminar_events', 'scheduleUpdate')
		),
		'onsubmit_callback' => array
		(
			array('tl_seminar_events', 'adjustTime'),
			array('tl_seminar_events', 'scheduleUpdate')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('startTime'),
			'headerFields'            => array('title','tstamp','published'),
			'panelLayout'             => 'filter;sort,search,limit',
			'child_record_callback'   => array('tl_seminar_events', 'listEvents')
		),
		'global_operations' => array
		(
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
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_events']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_events']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_events']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_events']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_events']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
				'button_callback'     => array('tl_seminar_events', 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_events']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('addTime','multipleDate','recurring'),
		'default'                     => 'intern,alias;{date_legend},addTime,date,multipleDate,recurring;{details_legend:hide},organizer,facilitator,location,details,specials;places_requested,places_booked;{published_legend},published;{expert_legend:hide},cssClass,start,stop;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'addTime'                     => 'startTime,endTime',
		'multipleDate'                => 'endDate',
		'recurring'                   => 'repeatEach,recurrences',
	),

	// Fields
	'fields' => array
	(
		'intern' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['intern'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_seminar_events', 'generateAlias')
			)
		),
		'addTime' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['addTime'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'startTime' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['startTime'],
			'default'                 => time(),
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 8,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'time', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
		),
		'endTime' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['endTime'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'time', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'save_callback' => array
			(
				array('tl_seminar_events', 'setEmptyEndTime')
			)
		),
		'date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['date'],
			'default'                 => time(),
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>true, 'datepicker'=>true, 'tl_class'=>'wizard')
		),
		'multipleDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['multipleDate'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'endDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['endDate'],
			'default'                 => time(),
			'exclude'                 => true,
			'inputType'               => 'text',
			'save_callback' => array
			(
				array('tl_seminar_events', 'setEmptyEndDate')
			),
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>true, 'datepicker'=>true, 'tl_class'=>'wizard')
		),
		'recurring' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['recurring'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'repeatEach' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['repeatEach'],
			'exclude'                 => true,
			'inputType'               => 'timePeriod',
			'options'                 => array('days', 'weeks', 'months', 'years'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_seminar_events'],
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_seminar_events', 'checkInterval')
			)
		),
		'recurrences' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['recurrences'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
		),
		'location' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['location'],
			'default'				  => '',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255)
		),
		'details' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['details'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
		),
		'specials' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['specials'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
		),
		'places_requested' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['places_requested'],
			'default'				 	   => 0,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
		),
		'places_booked' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['places_booked'],
			'default'				  	   => 0,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 2,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50')
		),
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['cssClass'],
			'exclude'                 => true,
			'inputType'               => 'text',
			//'eval'                    => array('tl_class'=>'w50')
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['start'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_events']['stop'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
		),
		'organizergroup' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['organizergroup'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			//'foreignKey'              => 'tl_member_group.name',
			'options_callback'				=> array('tl_seminar_events','selectOrganizerGroup'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'organizer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['organizer'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
			'options_callback'				=> array('tl_seminar_events','selectOrganizer'),
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'facilitatorgroup' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['facilitatorgroup'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			//'foreignKey'            => 'tl_member_group.name',
			'options_callback'				=> array('tl_seminar_events','selectFacilitatorGroup'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'facilitator' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['facilitator'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'				=> array('tl_seminar_events','selectFacilitator'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
	)
);


/**
 * Class tl_seminar_events
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2011
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Controller
 */
class tl_seminar_events extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
		// wg. Organizer und Facilitator-Gruppeneinstellung
		$this->loadDataContainer('tl_seminar');
	}
 	/**
   *   getMemberList - ermittelt eine Liste der Member einer Gruppe ($strGrouptype)
   *                   zur aktuellen Seite/Seminar ($id).
   *									 $sql enthält das Feld in der die GruppenId steht.	
 	 **/
  private function getMemberList ($sql, $id, $strGrouptype) {
    // ermitteln der Member und Filtern auf die gefundene Member_Group
  	$result = array();
  	if (isset($strGrouptype) && !empty($strGrouptype)) {						 
      $mbr = $this->Database->prepare('SELECT id, lastname, firstname, company, groups FROM tl_member WHERE 1')
            			->execute();
      while ($mbr->next()) {
      	// die Gruppenzuordnung lesen
      	$groups = deserialize($mbr->groups, true);
	  	foreach ($groups as $k=>$v) {
	  		$sqlg = "SELECT * FROM tl_member_group WHERE id=?";
	  		$objGroup = $this->Database->prepare($sqlg)->execute($v);
	  		if ($objGroup->numRows) {
	  			$name = $objGroup->name;
	  			// prüfen, ob Member in der gewünschten Gruppe ist 
		      	if ($strGrouptype == $name) {
		      		// Selectionsanzeigewert kreieren
				    $val = (($mbr->company == NULL) ? '' : ($mbr->company.', ')).$mbr->lastname . ', ' . $mbr->firstname;
				    // Ergebnis speichern
		    		$result[$mbr->id] = $val;
		      	}
      		}
      	}
      }
    } else {
    	// ermitteln aller Member
      $mbr = $this->Database->prepare('SELECT id, lastname, firstname, company, groups FROM tl_member WHERE 1')
       			->execute();
		  while ($mbr->next()) {
     		// Selectionsanzeigewert kreieren
	 		$val = (($mbr->company == NULL)?'':($mbr->company.', ')).$mbr->lastname . ', ' . $mbr->firstname;
	 		// Ergebnis speichern
     		$result[$mbr->id] = $val;
     	}	 
    }
  	return $result;
  }
  // alle Veranstalter, die zur Gruppe der Veranstalter zählen ermitteln
  public function selectOrganizer() {
  	$pageid = $this->Input->get('id');
    $result = array();
  	if (isset($pageid)) {
  		$sql = "SELECT organizergroup FROM tl_seminar_events WHERE id=?";
  	    $result = $this->getMemberList ($sql, $pageid, $GLOBALS['TL_DCA']['Seminar']['organizer']);
    }
  	return $result;
  }
  public function selectOrganizerGroup() {
  	  $fromtable = 'tl_member_group';
  	  $tag = $GLOBALS['TL_DCA']['Seminar']['organizer'];
//      $sql = "SELECT tl_member_group.id, tl_member_group.name ". 
//						 "FROM tl_member_group RIGHT JOIN tl_tag USING(id) ".
//						 "WHERE tl_tag.tag=? AND tl_tag.from_table=? ".
//						 "ORDER BY tl_member_group.name";
      $sql = "SELECT tl_member_group.id, tl_member_group.name ". 
						 "FROM tl_member_group ".
						 "WHERE tl_member_group.name=? ".
						 "ORDER BY tl_member_group.name";
  	  $page = $this->Database->prepare($sql)
  	  						 ->execute($tag);
  	  $result = array();
  	  while ($page->next()) {
  	  	$row = $page->row(); 
  	  	$result[$row['id']] = $row['name'];						 
  	  }
  	  return $result;
	}
  //
  public function selectFacilitatorGroup() {
  	  $fromtable = 'tl_member_group';
  	  $tag = $GLOBALS['TL_DCA']['Seminar']['facilitator'];
//      $sql = "SELECT tl_member_group.id, tl_member_group.name ". 
//						 "FROM tl_member_group RIGHT JOIN tl_tag USING(id) ".
//						 "WHERE tl_tag.tag=? AND tl_tag.from_table=? ".
//						 "ORDER BY tl_member_group.name";
      $sql = "SELECT tl_member_group.id, tl_member_group.name ". 
						 "FROM tl_member_group ".
						 "WHERE tl_member_group.name=? ".
						 "ORDER BY tl_member_group.name";
  	  $page = $this->Database->prepare($sql)
  	  						 ->execute($tag);
  	  $result = array();
  	  while ($page->next()) {
  	  	$row = $page->row(); 
  	  	$result[$row['id']] = $row['name'];						 
  	  }
  	  return $result;
  }
  public function selectMemberGroup() {
  	  $fromtable = 'tl_member_group';
  	  $tag = $GLOBALS['TL_DCA']['Seminar']['member'];
      $sql = "SELECT tl_member_group.id, tl_member_group.name ". 
						 "FROM tl_member_group ".
						 "WHERE tl_member_group.name=? ".
						 "ORDER BY tl_member_group.name";
  	  $page = $this->Database->prepare($sql)
  	  						 ->execute($tag);
  	  $result = array();
  	  while ($page->next()) {
  	  	$row = $page->row(); 
  	  	$result[$row['id']] = $row['name'];						 
  	  }
  	  return $result;
  }
  public function selectFacilitator() {
  	$pageid = $this->Input->get('id');
    $result = array();
  	if (isset($pageid)) {
  		$sql = "SELECT facilitatorgroup FROM tl_seminar_events WHERE id=?";
  	    $result = $this->getMemberList ($sql, $pageid, $GLOBALS['TL_DCA']['Seminar']['facilitator']);
    }
  	return $result;  	
  }



	/**
	 * Check permissions to edit table tl_seminar_events
	 */
	public function checkPermission()
	{
		return;
		// HOOK: comments extension required
		if (!in_array('comments', $this->Config->getActiveModules()))
		{
			$key = array_search('allowComments', $GLOBALS['TL_DCA']['tl_seminar_events']['list']['sorting']['headerFields']);
			unset($GLOBALS['TL_DCA']['tl_seminar_events']['list']['sorting']['headerFields'][$key]);
		}
		//return;
		if ($this->User->isAdmin)
		{
			return;
		}

		// Set root IDs
		if (!is_array($this->User->seminars) || count($this->User->seminars) < 1)
		{
			$root = array(0);
		}
		else
		{
			$root = $this->User->seminars;
		}

		$id = strlen($this->Input->get('id')) ? $this->Input->get('id') : CURRENT_ID;

		// Check current action
		switch ($this->Input->get('act'))
		{
			case 'paste':
				// Allow
				break;

			case 'create':
				if (!strlen($this->Input->get('pid')) || !in_array($this->Input->get('pid'), $root))
				{
					$this->log('Not enough permissions to create events in seminar ID "'.$this->Input->get('pid').'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'cut':
			case 'copy':
				if (!in_array($this->Input->get('pid'), $root))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' event ID "'.$id.'" to calendar ID "'.$this->Input->get('pid').'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				// NO BREAK STATEMENT HERE

			case 'edit':
			case 'show':
			case 'delete':
			case 'toggle':
				$objCalendar = $this->Database->prepare("SELECT pid FROM tl_seminar_events WHERE id=?")
											  ->limit(1)
											  ->execute($id);

				if ($objCalendar->numRows < 1)
				{
					$this->log('Invalid event ID "'.$id.'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				if (!in_array($objCalendar->pid, $root))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' event ID "'.$id.'" of seminar ID "'.$objCalendar->pid.'"', 'tl_seminar_events checkPermission', TL_ERROR);
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
					$this->log('Not enough permissions to access seminar ID "'.$id.'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				$objCalendar = $this->Database->prepare("SELECT id FROM tl_seminar_events WHERE pid=?")
											  ->execute($id);

				if ($objCalendar->numRows < 1)
				{
					$this->log('Invalid seminar ID "'.$id.'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				$session = $this->Session->getData();
				$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $objCalendar->fetchEach('id'));
				$this->Session->setData($session);
				break;

			default:
				if (strlen($this->Input->get('act')))
				{
					$this->log('Invalid command "'.$this->Input->get('act').'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				elseif (!in_array($id, $root))
				{
					$this->log('Not enough permissions to access seminar ID "'.$id.'"', 'tl_seminar_events checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}


	/**
	 * Auto-generate the event alias if it has not been set yet
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if (!strlen($varValue))
		{
			$autoAlias = true;
			$varValue = standardize($dc->activeRecord->intern);
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_seminar_events WHERE alias=?")
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
	 * Auto-generate the event id if it has not been set yet
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function setId(DataContainer $dc)
	{
		// Return if there is no active record (override all)
		//if (!$dc->activeRecord)
		//{
		//	return;
		//}
		$obj = $this->Database->prepare("SELECT MAX(xid) as maxid FROM tl_seminar_events WHERE 1")
								   ->execute();
		// Check whether the alias exists
		if ($obj->numRows) {
			if ($obj->maxid < $GLOBALS['TL_CONFIG']['tl_seminar']['startid']) {
		   		$maxid = $GLOBALS['TL_CONFIG']['tl_seminar']['startid'];
			} else {
		   		$maxid = $obj->maxid + 1;
		   	}
		} else {
			$maxid = $GLOBALS['TL_CONFIG']['tl_seminar']['startid'];
		}

		$arrSet['xid'] = $maxid;
		$this->Database->prepare("UPDATE tl_seminar_events %s WHERE id=?")->set($arrSet)->execute($dc->id);

	}


	/**
	 * Automatically set the end time if not set
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function setEmptyEndTime($varValue, DataContainer $dc)
	{
		if ($varValue === '')
		{
			$varValue = $dc->activeRecord->startTime;
		}

		return $varValue;
	}


	/**
	 * Set the end date to null if empty
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function setEmptyEndDate($varValue, DataContainer $dc)
	{
		if ($varValue === '')
		{
			$varValue = null;
		}

		return $varValue;
	}


	/**
	 * Check for a valid recurrence interval
	 * @param mixed
	 * @return mixed
	 */
	public function checkInterval($varValue)
	{
		$varValue = deserialize($varValue);

		if ($varValue['value'] < 1)
		{
			$varValue['value'] = 1;
		}

		return serialize($varValue);
	}


	/**
	 * Add the type of input field
	 * @param array
	 * @return string
	 */
	public function listEvents($arrRow)
	{
		$time = time();
		$key = ($arrRow['published'] && ($arrRow['start'] == '' || $arrRow['start'] < $time) && ($arrRow['stop'] == '' || $arrRow['stop'] > $time)) ? 'published' : 'unpublished';
		$span = Seminar::calculateSpan($arrRow['startTime'], $arrRow['endTime']);

		if ($span > 0)
		{
			$date = $this->parseDate($GLOBALS['TL_CONFIG'][($arrRow['addTime'] ? 'datimFormat' : 'dateFormat')], $arrRow['startTime']) . ' - ' . $this->parseDate($GLOBALS['TL_CONFIG'][($arrRow['addTime'] ? 'datimFormat' : 'dateFormat')], $arrRow['endTime']);
		}
		elseif ($arrRow['startTime'] == $arrRow['endTime'])
		{
			$date = $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $arrRow['date']) . ($arrRow['addTime'] ? ' (' . $this->parseDate($GLOBALS['TL_CONFIG']['timeFormat'], $arrRow['startTime']) . ')' : '');
		}
		else
		{
			$date = $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $arrRow['date']) . ($arrRow['addTime'] ? ' (' . $this->parseDate($GLOBALS['TL_CONFIG']['timeFormat'], $arrRow['startTime']) . ' - ' . $this->parseDate($GLOBALS['TL_CONFIG']['timeFormat'], $arrRow['endTime']) . ')' : '');
		}
		$dt = $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $arrRow['date']);
		return '
<div class="cte_type ' . $key . '"><strong>' . $arrRow['intern'] . '</strong> - ' . $date . '</div>
<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h52' : '') . ' block">
' . (($arrRow['details'] != '') ? $arrRow['details'] : $arrRow['teaser']) . '
</div>' . "\n";
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

	/**
	 * Adjust start end end time of the event based on date, span, startTime and endTime
	 * @param \DataContainer
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

		// Set end date
		if (strlen($dc->activeRecord->endDate))
		{
			if ($dc->activeRecord->endDate > $dc->activeRecord->date)
			{
				$arrSet['endDate'] = $dc->activeRecord->endDate;
				$arrSet['endTime'] = $dc->activeRecord->endDate;
			}
			else
			{
				$arrSet['endDate'] = $dc->activeRecord->date;
				$arrSet['endTime'] = $dc->activeRecord->date;
			}
		}

		// Add time
		if ($dc->activeRecord->addTime)
		{
			$arrSet['startTime'] = strtotime(date('Y-m-d', $arrSet['startTime']) . ' ' . date('H:i:s', $dc->activeRecord->startTime));
			$arrSet['endTime'] = strtotime(date('Y-m-d', $arrSet['endTime']) . ' ' . date('H:i:s', $dc->activeRecord->endTime));
		}

		// Adjust end time of "all day" events
		elseif ((strlen($dc->activeRecord->endDate) && $arrSet['endDate'] == $arrSet['endTime']) || $arrSet['startTime'] == $arrSet['endTime'])
		{
			$arrSet['endTime'] = (strtotime('+ 1 day', $arrSet['endTime']) - 1);
		}

		$arrSet['repeatEnd'] = 0;

		// Recurring events
		if ($dc->activeRecord->recurring)
		{
			// Unlimited recurrences end on 2038-01-01 00:00:00 (see #4862)
			if ($dc->activeRecord->recurrences == 0)
			{
				$arrSet['repeatEnd'] = 2145913200;
			}
			else
			{
				$arrRange = deserialize($dc->activeRecord->repeatEach);

				$arg = $arrRange['value'] * $dc->activeRecord->recurrences;
				$unit = $arrRange['unit'];

				$strtotime = '+ ' . $arg . ' ' . $unit;
				$arrSet['repeatEnd'] = strtotime($strtotime, $arrSet['endTime']);
			}
		}
		
		$this->Database->prepare("UPDATE tl_seminar_events %s WHERE id=?")->set($arrSet)->execute($dc->id);
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

//		$this->import('Seminar');
//
//		foreach ($session as $id)
//		{
//			$this->Seminar->generateFeed($id);
//		}

		$this->Session->set('seminar_feed_updater', null);
	}


	/**
	 * Schedule a calendar feed update
	 * 
	 * This method is triggered when a single event or multiple events are
	 * modified (edit/editAll), moved (cut/cutAll) or deleted (delete/deleteAll).
	 * Since duplicated events are unpublished by default, it is not necessary
	 * to schedule updates on copyAll as well.
	 */
	public function scheduleUpdate()
	{
		// Return if there is no ID 
		if (!CURRENT_ID || $this->Input->get('act') == 'copy')
		{
			return;
		}

		// Store the ID in the session
		$session = $this->Session->get('seminar_feed_updater');
		$session[] = CURRENT_ID;
		$this->Session->set('seminar_feed_updater', array_unique($session));
	}


	/**
	 * Return the link picker wizard
	 * @param object
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		$strField = 'ctrl_' . $dc->field . (($this->Input->get('act') == 'editAll') ? '_' . $dc->id : '');
		return ' ' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top; cursor:pointer;" onclick="Backend.pickPage(\'' . $strField . '\')"');
	}


	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_seminar_events::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}		

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}


	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
		// Check permissions to edit
		$this->Input->setGet('id', $intId);
		$this->Input->setGet('act', 'toggle');
		$this->checkPermission();

		// Check permissions to publish
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_seminar_events::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish event ID "'.$intId.'"', 'tl_seminar_events toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion('tl_seminar_events', $intId);
	
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_seminar_events']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_seminar_events']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_seminar_events SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_seminar_events', $intId);

		// Update the RSS feed (for some reason it does not work without sleep(1))
		sleep(1);
		$this->import('Seminar');
		$this->Seminar->generateFeed(CURRENT_ID);
	}
}

?>