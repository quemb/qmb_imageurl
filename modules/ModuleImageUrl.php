<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   QmbImageURL
 * @author    Nico Ziegler <nico@quemb.com>
 * @license   GNU/LGPL
 * @copyright quemb GbR <www.quemb.com>
 */


/**
 * Namespace
 */
namespace QmbImageUrl;


/**
 * Class ModuleImageUrl
 *
 * @copyright  quemb GbR
 * @author     Nico Ziegler
 * @package    Devtools
 */
class ModuleImageUrl
{
	public function replaceInsertTags($strTag)
	{
		$elements = explode('::', $strTag);

		if ($elements[0] == 'image_url')
		{
			$width = NULL;
			$height = NULL;
			$mode = '';
			$strFile = $elements[1];
			 
			// Take arguments
			if (strpos($elements[1], '?') !== false)
			{
				$arrChunks = explode('?', urldecode($elements[1]), 2);
				$strSource = \String::decodeEntities($arrChunks[1]);
				$strSource = str_replace('[&]', '&', $strSource);
				$arrParams = explode('&', $strSource);
				 
				foreach ($arrParams as $strParam)
				{
					list($key, $value) = explode('=', $strParam);
					 
					switch ($key)
					{
						case 'width':
							$width = $value;
							break;
							 
						case 'height':
							$height = $value;
							break;
							 
						case 'mode':
							$mode = $value;
							break;
					}
				}
				 
				$strFile = $arrChunks[0];
			}
	
			if (is_numeric($strFile))
			{
				$objFile = \FilesModel::findByPk($strFile);
	
				if ($objFile === NULL)
				{
					return FALSE;
				}
	
				$strFile = $objFile->path;
			}
			else
			{
				// Sanitize the path
				$strFile = str_replace('../', '', $strFile);
			}

			// Check the maximum image width
			if ($GLOBALS['TL_CONFIG']['maxImageWidth'] > 0 && $width > $GLOBALS['TL_CONFIG']['maxImageWidth'])
			{
				$width = $GLOBALS['TL_CONFIG']['maxImageWidth'];
				$height = NULL;
			}
				
			try {
				return \Image::get($strFile, $width, $height, $mode);
			} catch (\Exception $e) {
				return FALSE;
			}
		}
	}	
}
