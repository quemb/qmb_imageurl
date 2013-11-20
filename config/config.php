<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   QmbImageURL
 * @author    Nico Ziegler
 * @license   GNU/LGPL
 * @copyright quemb GbR
 */


/**
 * HOOKS
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('QmbImageUrl\\ModuleImageUrl', 'replaceInsertTags');