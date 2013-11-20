<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Qmb_imageurl
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'QmbImageUrl',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'QmbImageUrl\ModuleImageUrl' => 'system/modules/qmb_imageurl/modules/ModuleImageUrl.php',
));
