<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Seminarverwaltung_location
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ModuleSeminarLocation'       => 'system/modules/seminarverwaltung_location/ModuleSeminarLocation.php',
	'ModuleSeminarLocationReader' => 'system/modules/seminarverwaltung_location/ModuleSeminarLocationReader.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_seminarlocation'         => 'system/modules/seminarverwaltung_location/templates',
	'sv_seminarlocation_list'     => 'system/modules/seminarverwaltung_location/templates',
	'sv_seminarlocation_seminars' => 'system/modules/seminarverwaltung_location/templates',
));
