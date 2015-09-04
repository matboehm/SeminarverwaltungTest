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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarlocation']   = '{title_legend},name,headline,type,sv_seminar_category,sv_jumpTo_location;{config_legend},perPage;{template_legend:hide},sv_seminarlocation_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarlocation_reader']   = '{title_legend},name,headline,type,sv_seminar_category,sv_jumpTo;{config_legend},perPage;{template_legend:hide},sv_seminarlocation_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_seminarlocation_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_seminarlocation_template'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminarlocation', 'getSeminarMemberTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_jumpTo_location'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_jumpTo_location'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio'), 
);

/*
 * Class tl_module_seminar
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Gerd Regnery 2011-2013
 * @author     Gerd Regnery
 * @package    seminarverwaltung
 */
class tl_module_seminarlocation extends tl_module_seminar
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
	 * Return all event templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getSeminarMemberTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_seminarlocation', $intPid);
	}
}

?>