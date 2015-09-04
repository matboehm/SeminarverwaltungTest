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
$GLOBALS['TL_DCA']['tl_module']['palettes']['seminar']    = '{title_legend},name,headline,type;{config_legend},sv_seminar;{redirect_legend},sv_jumpTo;{template_legend:hide},sv_stemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarcalendar']   		= '{title_legend},name,headline,type;sv_jumpTo;sv_jumpToBuchen;{config_legend},sv_seminar_category,perPage;{template_legend:hide},sv_cal_template;cal_startDay;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarcalendarlist'] 		= '{title_legend},name,headline,type;{config_legend},sv_seminar_category,cal_noSpan,cal_format,cal_ignoreDynamic,cal_order,sv_jumpTo,sv_jumpToBuchen,cal_limit,perPage;{template_legend:hide},sv_template,imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarcategory']   = '{title_legend},name,headline,type;sv_jumpTo;{config_legend},sv_seminar_category,perPage;{template_legend:hide},sv_category_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarlist']   = '{title_legend},name,headline,type;sv_jumpTo;sv_jumpToBuchen;{config_legend},sv_seminar_category,perPage;{template_legend:hide},sv_seminar_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminareventlist']   = '{title_legend},name,headline,type;sv_jumpTo,sv_jumpToBuchen;{config_legend},perPage;{template_legend:hide},sv_seminar_template,sv_seminarevent_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarlist_all_cat']  	= '{title_legend},name,headline,type;sv_jumpTo;sv_jumpToBuchen;{config_legend},perPage;{template_legend:hide},sv_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarreader'] 			= '{title_legend},name,headline,type;sv_jumpToBuchen;{config_legend},sv_seminar_category;{template_legend:hide},sv_stemplate;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/*
 * Neue Buchungsformulare 
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarbooking'] = '{title_legend},name,type,sv_show_recurring,sv_booking,sv_seminarbooking_template;{config_legend},sv_bccMail,sv_fromText,sv_shortText,sv_messageText;{expert_legend:hide},guests,cssID,space';

/*
$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarbooking_seminar'] = '{title_legend},name,type,sv_seminar,sv_show_recurring,sv_booking,sv_seminarbooking_template;{config_legend},sv_bccMail,sv_fromText,sv_shortText,sv_messageText;{expert_legend:hide},guests,cssID,space';
*/

/*
 * Start - Veraltete Buchungsformulare 
 */
/*
$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarbuchung_einzeln'] 	= '{title_legend},name,type,sv_booking,sv_seminarbooking_template;{config_legend},sv_bccMail,sv_fromText,sv_shortText,sv_messageText;{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['palettes']['seminarbuchung'] = '{title_legend},name,type,sv_show_recurring,sv_booking,sv_seminarbooking_template;{config_legend},sv_bccMail,sv_fromText,sv_shortText,sv_messageText;{expert_legend:hide},guests,cssID,space';
*/
/*
 * Ende - Veraltete Buchungsformulare 
 */

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['enclosure'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['enclosure'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'filesOnly'=>true, 'mandatory'=>false)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['headline'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['headline'],
	'exclude'                 => true,
	'inputType'               => 'inputUnit',
	'options'									=> array('h1','h2','h3','h4','h5','h6'),
	'eval'                    => array('rgxp'=>'alnum') 
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio'), 
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_jumpToBuchen'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_jumpToBuchen'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio') 
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_seminar_category'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_seminar_category'],
	'exclude'                 => true,
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('tl_module_seminar', 'getSeminarCategory'),
	'eval'                    => array('mandatory'=>true, 'multiple'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_show_recurring'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_show_recurring'],
	'default'                 => '0',
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_seminar'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_seminar'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminar'),
	'save_callback'           => array(array('tl_module_seminar', 'saveSeminar')),
	'eval'                    => array('mandatory'=>false, 'multiple'=>false, 'includeBlankOption'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_limit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_limit'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_template'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminarEventTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_stemplate'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_stemplate'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminarDetailsTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_category_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_category_template'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminarCategoryTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_seminar_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_seminar_template'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminarTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_seminarevent_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_seminarevent_template'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminarevent_Templates'),
	'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_seminarbooking_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_seminarbooking_template'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getSeminarbooking_Templates'),
	'eval'                    => array('tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['sv_showQuantity'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_showQuantity'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);
//
// calendar configuration
//
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_cal_readerModule'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_cal_readerModule'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getReaderModules'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_cal_template'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_cal_template'],
	'default'                 => 'event_full',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_seminar', 'getCalendarTemplates'),
	'eval'                    => array('tl_class'=>'w50')
);

//
// booking configuration
//
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_bccMail'] = array
(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_bccMail'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'rgxp'=>'emails', 'unique'=>false, 'decodeEntities'=>true, 'feEditable'=>true, 'feViewable'=>true, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_fromText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_fromText'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_shortText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_shortText'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_messageText'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_messageText'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'textarea',
	'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['sv_booking'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['sv_booking'],
	'default'                 => '1',
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr')
);
/**
 * Class tl_module_seminar
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Gerd Regnery 2011-2013
 * @author     Gerd Regnery
 * @package    seminarverwaltung
 */
class tl_module_seminar extends Backend
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
	public function getSeminar()
	{
		if (!$this->User->isAdmin && !is_array($this->User->seminars))
		{
			return array();
		}

		$arrSeminars = array();
		$objSeminars = $this->Database->execute("SELECT id, title FROM tl_seminar WHERE published=1 ORDER BY title");

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
	public function saveSeminar($varValue, DataContainer $dc)
	{
		if ($varValue === '')
		{
			$varValue = null;
		}

		return $varValue;
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
	/**
	 * Return all event templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getCalendarTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_cal_', $intPid);
	}
	/**
	 * Return all event templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getSeminarDetailsTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_seminarevent_', $intPid);
	}

	/**
	 * Return all event templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getSeminarCategoryTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_seminarcategory_', $intPid);
	}

	/**
	 * Return all event templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getSeminarTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_seminar_', $intPid);
	}

	/**
	 * Return all event templates as array
	 * @param object
	 * @return array
	 */
	public function getSeminarevent_Templates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_seminarevent_', $intPid);
	}

	/**
	 * Return all booking templates as array
	 * @param object
	 * @return array
	 */
	public function getSeminarbooking_Templates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_seminarbooking_', $intPid);
	}

	/**
	 * Return all event templates as array
	 * @param object
	 * @return array
	 */
	public function getSeminarEventTemplates(DataContainer $dc)
	{
		$intPid = $dc->activeRecord->pid;

		if ($this->Input->get('act') == 'overrideAll')
		{
			$intPid = $this->Input->get('id');
		}

		return $this->getTemplateGroup('sv_evt_', $intPid);
	}

}

?>