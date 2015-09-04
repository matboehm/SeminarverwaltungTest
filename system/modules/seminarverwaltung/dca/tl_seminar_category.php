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
 * Table tl_seminar_category
 */
$GLOBALS['TL_DCA']['tl_seminar_category'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_seminar'),
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('tl_seminar_category', 'checkPermission'),
			array('tl_seminar_category', 'generateFeed')
		),
		'onsubmit_callback' => array
		(
			array('tl_seminar_category', 'scheduleUpdate')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
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
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_category']['edit'],
				'href'                => 'table=tl_seminar',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_category']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'button_callback'     => array('tl_seminar_category', 'editHeader'),
				'attributes'          => 'class="edit-header"'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_category']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
				'button_callback'     => array('tl_seminar_category', 'copyCalendar')
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_category']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
				'button_callback'     => array('tl_seminar_category', 'deleteCalendar')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_seminar_category']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('allowComments', 'protected', 'makeFeed'),
		'default'                     => '{title_legend},title,alias;sv_jumpTo_category,sv_jumpTo;{teaser_legend:hide},teaser;{text_legend:hide},details;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'allowComments'               => 'notify,sortOrder,perPage,moderate,bbcode,requireLogin,disableCaptcha',
		'protected'                   => 'groups',
		'makeFeed'                    => 'format,language,source,maxItems,feedBase,alias,description'
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_seminar_category', 'generateAlias')
			)
		),
		'sv_jumpTo_category' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['sv_jumpTo_category'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio') 
		),
		'sv_jumpTo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['sv_jumpTo'],
			'exclude'                 => true,
			'inputType'               => 'pageTree',
			'eval'                    => array('fieldType'=>'radio') 
		),
		'teaser' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['teaser'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
		), 
		'details' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['details'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
		),
		'protected' => array
		(
		    	'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['protected'],
		    	'exclude'                 => true,
		    	'filter'                  => true,
		    	'inputType'               => 'checkbox',
		    	'eval'                    => array('submitOnChange'=>true)
		),
		'groups' => array
		(
		    	'label'                   => &$GLOBALS['TL_LANG']['tl_seminar_category']['groups'],
		    	'exclude'                 => true,
		    	'inputType'               => 'checkbox',
		    	'foreignKey'              => 'tl_member_group.name',
		    	'eval'                    => array('mandatory'=>true, 'multiple'=>true)
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
class tl_seminar_category extends Backend
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
	 * Check permissions to edit table tl_seminar
	 */
	public function checkPermission()
	{
		//return;

		if ($this->User->isAdmin)
		{
			return;
		}

		// Set root IDs
		if (!is_array($this->User->seminars) || empty($this->User->seminars))
		{
			$root = array(0);
		}
		else
		{
			$root = $this->User->seminars;
		}

		$GLOBALS['TL_DCA']['tl_seminar_category']['list']['sorting']['root'] = $root;

		// Check permissions to add archives
		if (!$this->User->hasAccess('create', 'seminarp'))
		{
			$GLOBALS['TL_DCA']['tl_seminar_category']['config']['closed'] = true;
		}
		// Check current action
		switch (Input::get('act'))
		{
			case 'create':
			case 'select':
				// Allow
				break;

			case 'edit':
				// Dynamically add the record to the user profile
				if (!in_array(Input::get('id'), $root))
				{
					$arrNew = $this->Session->get('new_records');

					if (is_array($arrNew['tl_seminar_category']) && in_array(Input::get('id'), $arrNew['tl_seminar_category']))
					{
						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							$objUser = $this->Database->prepare("SELECT seminars, seminarp FROM tl_user WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->id);

							$arrNewp = deserialize($objUser->seminarp);

							if (is_array($arrNewp) && in_array('create', $arrNewp))
							{
								$arrNews = deserialize($objUser->seminars);
								$arrNews[] = Input::get('id');

								$this->Database->prepare("UPDATE tl_user SET seminars=? WHERE id=?")
											   ->execute(serialize($arrNews), $this->User->id);
							}
						}

						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							$objGroup = $this->Database->prepare("SELECT seminars, seminarp FROM tl_user_group WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->groups[0]);

							$arrNewp = deserialize($objGroup->seminarp);

							if (is_array($arrNewp) && in_array('create', $arrNewp))
							{
								$arrNews = deserialize($objGroup->seminars);
								$arrNews[] = Input::get('id');
								$this->Database->prepare("UPDATE tl_user_group SET news=? WHERE id=?")
											   ->execute(serialize($arrNews), $this->User->groups[0]);
							}
						}

						// Add new element to the user object
						$root[] = Input::get('id');
						$this->User->seminars = $root;
					}
				}
				// No break;

			case 'copy':
			case 'delete':
			case 'show':
				if (!in_array(Input::get('id'), $root) || (Input::get('act') == 'delete' && !$this->User->hasAccess('delete', 'seminarp')))
				{
					$this->log('Not enough permissions to '.Input::get('act').' news archive ID "'.Input::get('id').'"', 'tl_seminar_category checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
				$session = $this->Session->getData();
				if (Input::get('act') == 'deleteAll' && !$this->User->hasAccess('delete', 'seminarp'))
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
				if (strlen(Input::get('act')))
				{
					$this->log('Not enough permissions to '.Input::get('act').' news archives', 'tl_seminar_category checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}

	/**
	 * Auto-generate the news alias if it has not been set yet
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

		$objAlias = $this->Database->prepare("SELECT id FROM tl_seminar_category WHERE alias=?")
								   ->execute($varValue);

		// Check whether the news alias exists
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

		$this->import('Seminar');

		foreach ($session as $id)
		{
			$this->Seminar->generateFeed($id);
		}

		$this->Session->set('seminar_feed_updater', null);
	}


	/**
	 * Schedule a calendar feed update
	 * 
	 * This method is triggered when a single calendar or multiple seminars
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
		$result = ($this->User->isAdmin || count(preg_grep('/^tl_seminar_category::/', $this->User->alexf)) > 0) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : '';
//		$this->log('Result:'.$result,__METHOD__,'INFO');
		return $result;
//		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
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
		return ($this->User->isAdmin || $this->User->hasAccess('create', 'seminarp')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
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
		return ($this->User->isAdmin || $this->User->hasAccess('delete', 'seminarp')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
}

?>