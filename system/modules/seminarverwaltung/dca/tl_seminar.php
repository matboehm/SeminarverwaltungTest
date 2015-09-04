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
 * Seminar Configuration
 **/
$GLOBALS['TL_DCA']['Seminar']['facilitator'] = 'Seminarleiter';
$GLOBALS['TL_DCA']['Seminar']['organizer'] = 'Seminarveranstalter';
 
$this->loadLanguageFile('tl_content');

/**
 * Table tl_seminar
 */
$GLOBALS['TL_DCA']['tl_seminar'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_seminar_category',
		'ctable'                      => array('tl_seminar_events'),
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('tl_seminar', 'checkPermission'),
			array('tl_seminar', 'generateFeed')
		),
		'onsubmit_callback' => array
		(
			array('tl_seminar', 'scheduleUpdate')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'flag'                    => 1,
			'fields'                  => array('title'),
			'headerFields'            => array('title','tstamp','protected','published'),
			'panelLayout'             => 'filter;search,limit',
			'child_record_callback'   => array('tl_seminar', 'listSeminars')
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
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
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['edit'],
				'href'                => 'table=tl_seminar_events',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'button_callback'     => array('tl_seminar', 'editHeader'),
				'attributes'          => 'class="edit-header"'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['copy'],
				'href'                => 'act=paste&mode=copy',//'act=copy',
				'icon'                => 'copy.gif',
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['cut'],
				'href'                => 'act=paste&mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
				'button_callback'     => array('tl_seminar', 'deleteCalendar')
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
				'button_callback'     => array('tl_seminar', 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('addImage','source','protected'),
		'default'                     => '{title_legend},title,alias,intern,author;{teaser_legend:hide},teaser;{text_legend},details,specials;{image_legend:hide},addImage;{organizer_legend:hide},organizer,facilitator;{source_legend:hide},source;jumpToBooking;{seminardata_legend},location,duration,cost,currency,reducedcost,places,places_min,last_request_days,last_request_direction,email,showalways;{protected_legend:hide},protected;{expert_legend:hide},cssClass;{publish_legend},published,start,stop'
//		'default'                     ==>
//'{title_legend},title,alias,internal,pid;organizergroup,organizer,location;facilitatorgroup,facilitator;cost,reducedcost,currency,sponsorship;
//{protected_legend:hide},protected;{teaser_legend:hide},teaser;{text_legend},details,specials;{source_legend:hide},source;{expert_legend:hide},cssClass;
//{publish_legend},published,start,stop;{dates_legend},dates'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'protected'                   => 'groups',
		'addImage'                    => 'singleSRC,alt,size,imagemargin,imageUrl,fullsize,caption,floating',
		'source_internal'             => 'sv_jumpTo',
		'source_article'              => 'articleId',
		'source_external'             => 'url,target',
		'dates'				  		  => 'dates'
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_seminar', 'generateAlias')
			)
		),
		'intern' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['intern'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>32, 'tl_class'=>'w50')
		),
		'pid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['pid'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_seminar_category.title',
			'eval'                    => array('mandatory'=>true, 'multiple'=>false, fieldType=>'radio')
		),
		'author' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['author'],
			'default'                 => BackendUser::getInstance()->id,
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_user.name',
			'eval'                    => array('doNotCopy'=>false, 'chosen'=>true, 'mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'organizergroup' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['organizergroup'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			'options_callback'		  => array('tl_seminar','selectOrganizerGroup'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'organizer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['organizer'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
			'options_callback'		  => array('tl_seminar','selectOrganizer'),
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'includeBlankOption'=>true, 'tl_class'=>'w50')
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
		'facilitatorgroup' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['facilitatorgroup'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			'options_callback'		  => array('tl_seminar','selectFacilitatorGroup'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'facilitator' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['facilitator'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'		  => array('tl_seminar','selectFacilitator'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'jumpToBooking' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['jumpToBooking'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio')
		), 
		'teaser' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['teaser'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
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
		'addImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['addImage'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true)
		),
		'alt' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['alt'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['size'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => $GLOBALS['TL_CROP'],
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50')
		),
		'imagemargin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imagemargin'],
			'exclude'                 => true,
			'inputType'               => 'trbl',
			'options'                 => array('px', '%', 'em', 'ex', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'imageUrl' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imageUrl'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
			'wizard' => array
			(
				array('tl_seminar', 'pagePicker')
			)
		),
		'fullsize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fullsize'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12')
		),
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['caption'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50')
		),
		'floating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['floating'],
			'exclude'                 => true,
			'inputType'               => 'radioTable',
			'options'                 => array('above', 'left', 'right', 'below'),
			'eval'                    => array('cols'=>4, 'tl_class'=>'w50'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC']
		),
		'duration' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['duration'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'cost' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['cost'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>128, 'tl_class'=>'w50')
		),
		'reducedcost' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['reducedcost'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>20, 'tl_class'=>'w50')
		),
		'currency' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['currency'],
			'default'				  => '€',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'sponsorship' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['sponsorship'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'source' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['source'],
			'default'                 => 'default',
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'radio',
			'options'                 => array('default', 'internal', 'article', 'external'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_seminar'],
			'eval'                    => array('submitOnChange'=>true, 'helpwizard'=>true)
		),
		'sv_jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['sv_jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio')
		),
		'articleId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['articleId'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_seminar', 'getArticleAlias'),
			'eval'                    => array('mandatory'=>true)
		),
		'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'target' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['target'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12')
		), 	
		'places' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['places'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'rgxp'=>'digit', 'tl_class'=>'w50')
		),
		'places_min' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['places_min'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'rgxp'=>'digit', 'tl_class'=>'w50')
		),
		'last_request_days' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['last_request_days'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50 wizard')
		),
		'last_request_direction' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['last_request_direction'],
			'exclude'                 => true,
			'default'                 => 'before',			
			'inputType'               => 'radio',
			'options'				  => array('before','after'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_seminar'],
			'eval'                    => array('submitOnChange'=>true, 'helpwizard'=>true,'tl_class'=>'w50 wizard')
		),
		'membergroup' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['membergroup'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			'foreignKey'              => 'tl_member_group.name',
			//'options_callback'		  => array('tl_seminar','selectMemberGroup'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'email' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['email'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50','rgxp'=>'emails')
		),
		'showalways' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['showalways'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50')
		),
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['cssClass'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50')
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 2,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['start'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['stop'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard')
		),
		'dates' => array
 		(
 			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar']['dates'],
 			'exclude'                 => true,
 			'search'                  => true,
 			'inputType'               => 'dcaWizard',
 			'foreignTable'			  => 'tl_seminar_events',
 			'eval'                    => array('mandatory'=>false)
 		)
	)
);


/**
 * Class tl_seminar
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2011
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Controller
 */
class tl_seminar extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
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
  		$sql = "SELECT organizergroup FROM tl_seminar WHERE id=?";
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
  		$sql = "SELECT facilitatorgroup FROM tl_seminar WHERE id=?";
  	    $result = $this->getMemberList ($sql, $pageid, $GLOBALS['TL_DCA']['Seminar']['facilitator']);
    }
  	return $result;  	
  }

	/**
	 * Check permissions to edit table tl_seminar
	 */
	public function checkPermission()
	{
		return;
		// HOOK: comments extension required
		if (!in_array('comments', $this->Config->getActiveModules()))
		{
			unset($GLOBALS['TL_DCA']['tl_seminar']['fields']['allowComments']);
		}
		return;
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

		$GLOBALS['TL_DCA']['tl_seminar']['list']['sorting']['root'] = $root;

		// Check permissions to add seminars
		if (!$this->User->hasAccess('create', 'seminarp'))
		{
			$GLOBALS['TL_DCA']['tl_seminar']['config']['closed'] = true;
		}

		// Check current action
		switch ($this->Input->get('act'))
		{
			case 'create':
			case 'select':
				// Allow
				break;

			case 'edit':
				// Dynamically add the record to the user profile
				if (!in_array($this->Input->get('id'), $root))
				{
					$arrNew = $this->Session->get('new_records');

					if (is_array($arrNew['tl_seminar']) && in_array($this->Input->get('id'), $arrNew['tl_seminar']))
					{
						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							$objUser = $this->Database->prepare("SELECT seminars, seminarp FROM tl_user WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->id);

							$arrCalendarp = deserialize($objUser->seminarp);

							if (is_array($arrCalendarp) && in_array('create', $arrCalendarp))
							{
								$arrCalendars = deserialize($objUser->seminars);
								$arrCalendars[] = $this->Input->get('id');

								$this->Database->prepare("UPDATE tl_user SET seminars=? WHERE id=?")
											   ->execute(serialize($arrCalendars), $this->User->id);
							}
						}

						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							$objGroup = $this->Database->prepare("SELECT seminars, seminarp FROM tl_user_group WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->groups[0]);

							$arrCalendarp = deserialize($objGroup->seminarp);

							if (is_array($arrCalendarp) && in_array('create', $arrCalendarp))
							{
								$arrCalendars = deserialize($objGroup->seminars);
								$arrCalendars[] = $this->Input->get('id');

								$this->Database->prepare("UPDATE tl_user_group SET seminars=? WHERE id=?")
											   ->execute(serialize($arrCalendars), $this->User->groups[0]);
							}
						}

						// Add new element to the user object
						$root[] = $this->Input->get('id');
						$this->User->seminars = $root;
					}
				}
				// No break;

			case 'cut':
			case 'copy':
			case 'delete':
			case 'show':
				if (!in_array($this->Input->get('id'), $root) || ($this->Input->get('act') == 'delete' && !$this->User->hasAccess('delete', 'seminarp')))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' calendar ID "'.$this->Input->get('id').'"', 'tl_seminar checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
				$session = $this->Session->getData();
				if ($this->Input->get('act') == 'deleteAll' && !$this->User->hasAccess('delete', 'seminarp'))
				{
					$session['CURRENT']['IDS'] = array();
				}
				else
				{
					$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $root);
				}
				$this->Session->setData($session);
				break;

			default:
				if (strlen($this->Input->get('act')))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' seminars', 'tl_seminar checkPermission', TL_ERROR);
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

		$objAlias = $this->Database->prepare("SELECT id FROM tl_seminar WHERE alias=?")
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
		return ($this->User->isAdmin || count(preg_grep('/^tl_seminar::/', $this->User->alexf)) > 0) ? '<a href="'.$this->addToUrl($href.'&id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : '';
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
		return ($this->User->isAdmin || $this->User->hasAccess('create', 'seminarp')) ? '<a href="'.$this->addToUrl($href.'&id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
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
		return ($this->User->isAdmin || $this->User->hasAccess('delete', 'seminarp')) ? '<a href="'.$this->addToUrl($href.'&id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
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
	public function listSeminars($arrRow) {
    return '<div class="cte_type ' . $key . '"><strong>' . $arrRow['title'] . '</strong> - ' . $arrRow['intern'] . '</div>
<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h52' : '') . ' block">
' . (($arrRow['details'] != '') ? $arrRow['details'] : $arrRow['teaser']) . '
</div>' . "\n";
	}
 
	/**
	 * Return the link picker wizard
	 * @param DataContainer
	 * @return string
	 */
	public function pagePicker(DataContainer $dc)
	{
		$strField = 'ctrl_' . $dc->field . (($this->Input->get('act') == 'editAll') ? '_' . $dc->id : '');
		return ' ' . $this->generateImage('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer" onclick="Backend.pickPage(\'' . $strField . '\')"');
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
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_seminar::published', 'alexf'))
		{
			return '';
		}

		$href .= '&tid='.$row['id'].'&state='.($row['published'] ? '' : 1);

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
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_seminar::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish event ID "'.$intId.'"', 'tl_seminar toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion('tl_seminar', $intId);
	
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_seminar']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_seminar']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_seminar SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_seminar', $intId);

		// Update the RSS feed (for some reason it does not work without sleep(1))
		sleep(1);
		$this->import('Seminar');
		$this->Seminar->generateFeed(CURRENT_ID);
	}
 
}

?>