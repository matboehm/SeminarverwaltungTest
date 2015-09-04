<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
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
 * @copyright  Gerd Regnery 2011-2013
 * @author     Gerd Regnery
 * @package    seminarverwaltung
 * @license    commercial
 * @filesource
 */

$this->loadLanguageFile('tl_page');
/**
 * Table tl_content
 */
// Seminare zu Kategorie(n)
 $GLOBALS['TL_DCA']['tl_content']['palettes']['seminarlist'] = '{type_legend},type,sv_jumpTo;{seminardata_legend},seminar_category,seminar_template,seminar_sort,seminar_limit,seminar_perPage,sv_show_recurring;{seminareventsdata_legend},svcal_format,svcal_order;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
// Einzelseminar
$GLOBALS['TL_DCA']['tl_content']['palettes']['seminar'] = '{type_legend},type,sv_jumpTo;{seminardata_legend},seminar_category,seminar_choice,seminar_template,seminar_sort,seminar_limit,seminar_perPage,sv_show_recurring;{seminareventsdata_legend},svcal_format,svcal_order;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';


$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_noSpan'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_noSpan'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_startDay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_startDay'],
	'default'                 => 1,
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array(0, 1, 2, 3, 4, 5, 6),
	'reference'               => &$GLOBALS['TL_LANG']['DAYS'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_format'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_format'],
	'default'                 => 'cal_month',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_seminar', 'getFormats'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_content'],
	'eval'                    => array('tl_class'=>'clr w50'),
	'wizard' => array
	(
		array('tl_content_seminar', 'hideStartDay')
	),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_ignoreDynamic'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_ignoreDynamic'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_order'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_order'],
	'default'                 => 'ascending',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('ascending', 'descending'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_limit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_limit'],
	'default'				  => '0',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'clr w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_showQuantity'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_showQuantity'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['svcal_perPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['svcal_perPage'],
	'default'				  => '0',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);


$GLOBALS['TL_DCA']['tl_content']['fields']['seminar_perPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['seminar_perPage'],
	'default'				  => '0',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['seminar_limit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['seminar_limit'],
	'default'				  => '0',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'clr w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['seminar_category'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['seminar_category'],
	'reference'               => &$GLOBALS['TL_LANG']['CTE'],
	'default'                 => '',
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('tl_content_seminar', 'getSeminarCategory'),
	'eval'                    => array('mandatory'=>true, 'multiple'=>true, 'submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['seminar_choice'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['seminar_choice'],
	'reference'               => &$GLOBALS['TL_LANG']['CTE'],
	'default'                 => '',
	'exclude'                 => true,
	'filter'                  => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_seminar', 'getSeminar'),
	'eval'                    => array('mandatory'=>false, 'multiple'=>true, 'includeBlankOption'=>true, 'blankOptionLabel'=>&$GLOBALS['TL_LANG']['tl_page']['dns_mode']['inherit'])
);

$GLOBALS['TL_DCA']['tl_content']['fields']['seminar_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['seminar_template'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_seminar', 'getSeminarDetailsTemplates'),
	'eval'                    => array('mandatory'=>false, 'multiple'=>false)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['sv_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['sv_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio') 
);
$GLOBALS['TL_DCA']['tl_content']['fields']['seminar_sort'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['seminar_sort'],
	'reference'				  => &$GLOBALS['TL_LANG']['CTE'],
	'default'				  => 'sv_sort_none',
	'exclude'                 => true,
	'inputType'               => 'radio',
	'options'				  => array('sv_sort_none','sv_sort_date_asc','sv_sort_date_desc','sv_sort_alpha_asc','sv_sort_alpha_desc'),
	'eval'                    => array('tl_class'=>'clr w50') 
);

$GLOBALS['TL_DCA']['tl_content']['fields']['sv_show_recurring'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['sv_show_recurring'],
	'default'                 => '0',
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'tl_class'=>'clr')
);

/**
 * Class tl_content_seminar
 *
 * @copyright  Gerd Regnery 2011-2013
 * @author     Gerd Regnery
 * @package    seminarverwaltung
 */
class tl_content_seminar extends Backend
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
	 * Get all seminars and return them as array
	 * @return array
	 */
	public function getSeminarCategory()
	{
		if (!$this->User->isAdmin && !is_array($this->User->seminars))
		{
			return array();
		}

		$arrSeminars = array();
		$objSeminars = $this->Database->execute("SELECT id, title FROM tl_seminar_category ORDER BY title");

		while ($objSeminars->next())
		{
			if ($this->User->isAdmin || $this->User->hasAccess($objSeminars->id, 'seminars'))
			{
				$arrSeminars[$objSeminars->id] = $objSeminars->title;
			}
		}

		return $arrSeminars;
	}

	/**
	 * Get all seminars and return them as array
	 * @return array
	 */
	public function getSeminar(DataContainer $dc)
	{
		if (!$this->User->isAdmin && !is_array($this->User->seminars))
		{
			return array();
		}

		$arrCategories = deserialize($dc->activeRecord->seminar_category);
		
		//print_r($arrCategories);
		$arrSeminars = array();
		if (empty($arrCategories)) {
			$objSeminars = $this->Database->execute("SELECT id, title FROM tl_seminar ORDER BY title");
		} else {
			$objSeminars = $this->Database->execute("SELECT id, title FROM tl_seminar WHERE  pid IN (".implode(',',$arrCategories).") ORDER BY title");
		}

		$arrSeminars[0] = '-';
		while ($objSeminars->next())
		{
			if ($this->User->isAdmin || $this->User->hasAccess($objSeminars->id, 'seminars'))
			{
				$arrSeminars[$objSeminars->id] = $objSeminars->title;
			}
		}

		return $arrSeminars;
	}

	/**
	 * Return all event templates as array
	 * @param object
	 * @return array
	 */
	public function getSeminarDetailsTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_ce_seminar_', $intPid);
	}
	/**
	 * Return the calendar formats depending on the module type
	 * @return array
	 */
	public function getFormats(DataContainer $dc)
	{
		if ($dc->activeRecord->type == 'eventmenu')
		{
			return array('sv_day', 'sv_month', 'sv_year');
		}

		return array
		(
			'sv_list'     => array('sv_day', 'sv_month', 'sv_year', 'sv_all'),
			'sv_upcoming' => array('next_7', 'next_14', 'next_30', 'next_90', 'next_180', 'next_365', 'next_two', 'next_all'),
			'sv_past'     => array('past_7', 'past_14', 'past_30', 'past_90', 'past_180', 'past_365', 'past_two', 'past_all')
		);
	}


	/**
	 * Hide the start day drop-down if not applicable
	 * @return string
	 */
	public function hideStartDay()
	{
		return '
  <script>
  var enableStartDay = function() {
    var e1 = $("ctrl_sv_startDay").getParent("div");
    var e2 = $("ctrl_sv_order").getParent("div");
    if ($("ctrl_sv_format").value == "sv_day") {
      e1.setStyle("display", "block");
      e2.setStyle("display", "none");
	} else {
      e1.setStyle("display", "none");
      e2.setStyle("display", "block");
	}
  };
  window.addEvent("domready", function() {
    if ($("ctrl_sv_startDay")) {
      enableStartDay();
      $("ctrl_sv_format").addEvent("change", enableStartDay);
    }
  });
  </script>';
	}

	/**
	 * Get all event reader modules and return them as array
	 * @return array
	 */
	public function getReaderModules()
	{
		$arrModules = array();
		$objModules = $this->Database->execute("SELECT m.id, m.name, t.name AS theme FROM tl_module m LEFT JOIN tl_theme t ON m.pid=t.id WHERE m.type='seminarreader' ORDER BY t.name, m.name");

		while ($objModules->next())
		{
			$arrModules[$objModules->theme][$objModules->id] = $objModules->name . ' (ID ' . $objModules->id . ')';
		}

		return $arrModules;
	}

}
?>