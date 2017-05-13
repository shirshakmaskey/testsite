<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * System Initialization File
 **/
	define('CI_VERSION', '3.0');

/*
 * ------------------------------------------------------
 *  Load the framework constants
 * ------------------------------------------------------
 */
	if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/constants.php'))
	{
		require_once(APPPATH.'config/'.ENVIRONMENT.'/constants.php');
	}

	require_once(APPPATH.'config/constants.php');

/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
	require_once(BASEPATH.'core/Common.php');


/*
 * ------------------------------------------------------
 * Security procedures
 * ------------------------------------------------------
 */

if ( ! is_php('5.4'))
{
	ini_set('magic_quotes_runtime', 0);

	if ((bool) ini_get('register_globals'))
	{
		$_protected = array(
			'_SERVER',
			'_GET',
			'_POST',
			'_FILES',
			'_REQUEST',
			'_SESSION',
			'_ENV',
			'_COOKIE',
			'GLOBALS',
			'HTTP_RAW_POST_DATA',
			'system_path',
			'application_folder',
			'view_folder',
			'_protected',
			'_registered'
		);

		$_registered = ini_get('variables_order');
		foreach (array('E' => '_ENV', 'G' => '_GET', 'P' => '_POST', 'C' => '_COOKIE', 'S' => '_SERVER') as $key => $superglobal)
		{
			if (strpos($_registered, $key) === FALSE)
			{
				continue;
			}

			foreach (array_keys($$superglobal) as $var)
			{
				if (isset($GLOBALS[$var]) && ! in_array($var, $_protected, TRUE))
				{
					$GLOBALS[$var] = NULL;
				}
			}
		}
	}
}


/*
 * ------------------------------------------------------
 *  Start the timer... tick tock tick tock...
 * ------------------------------------------------------
 */
	$BM =& load_class('Benchmark', 'core');
	$BM->mark('total_execution_time_start');
	$BM->mark('loading_time:_base_classes_start');


/*
 * ------------------------------------------------------
 *  Instantiate the config class
 * ------------------------------------------------------
 *
 * Note: It is important that Config is loaded first as
 * most other classes depend on it either directly or by
 * depending on another class that uses it.
 *
 */
	$CFG =& load_class('Config', 'core');

	// Do we have any manually set config items in the index.php file?
	if (isset($assign_to_config) && is_array($assign_to_config))
	{
		foreach ($assign_to_config as $key => $value)
		{
			$CFG->set_item($key, $value);
		}
	}

/*
 * ------------------------------------------------------
 * Important charset-related stuff
 * ------------------------------------------------------
 *
 * Configure mbstring and/or iconv if they are enabled
 * and set MB_ENABLED and ICONV_ENABLED constants, so
 * that we don't repeatedly do extension_loaded() or
 * function_exists() calls.
 *
 * Note: UTF-8 class depends on this. It used to be done
 * in it's constructor, but it's _not_ class-specific.
 *
 */
	$charset = strtoupper(config_item('charset'));
	ini_set('default_charset', $charset);

	if (extension_loaded('mbstring'))
	{
		define('MB_ENABLED', TRUE);
		// mbstring.internal_encoding is deprecated starting with PHP 5.6
		// and it's usage triggers E_DEPRECATED messages.
		@ini_set('mbstring.internal_encoding', $charset);
		// This is required for mb_convert_encoding() to strip invalid characters.
		// That's utilized by CI_Utf8, but it's also done for consistency with iconv.
		mb_substitute_character('none');
	}
	else
	{
		define('MB_ENABLED', FALSE);
	}

	// There's an ICONV_IMPL constant, but the PHP manual says that using
	// iconv's predefined constants is "strongly discouraged".
	if (extension_loaded('iconv'))
	{
		define('ICONV_ENABLED', TRUE);
		// iconv.internal_encoding is deprecated starting with PHP 5.6
		// and it's usage triggers E_DEPRECATED messages.
		@ini_set('iconv.internal_encoding', $charset);
	}
	else
	{
		define('ICONV_ENABLED', FALSE);
	}

	if (is_php('5.6'))
	{
		ini_set('php.internal_encoding', $charset);
	}

/*
 * ------------------------------------------------------
 *  Load compatibility features
 * ------------------------------------------------------
 */

	require_once(BASEPATH.'core/compat/mbstring.php');
	require_once(BASEPATH.'core/compat/hash.php');
	require_once(BASEPATH.'core/compat/password.php');
	require_once(BASEPATH.'core/compat/standard.php');

/*
 * ------------------------------------------------------
 *  Instantiate the UTF-8 class
 * ------------------------------------------------------
 */
	$UNI =& load_class('Utf8', 'core');


/*
 * ------------------------------------------------------
 *  Instantiate the output class
 * ------------------------------------------------------
 */
	$OUT =& load_class('Output', 'core');


/*
 * -----------------------------------------------------
 * Load the security class for xss and csrf support
 * -----------------------------------------------------
 */
	$SEC =& load_class('Security', 'core');

/*
 * ------------------------------------------------------
 *  Load the Input class and sanitize globals
 * ------------------------------------------------------
 */
	$IN	=& load_class('Input', 'core');

/*
 * ------------------------------------------------------
 *  Load the Language class
 * ------------------------------------------------------
 */
	$LANG =& load_class('Lang', 'core');


//CUSTOMIZATION FOR CI CONTROLLER AND LOADER	
if (file_exists(APPPATH.'config/autoload.php'))
{ 
	include(APPPATH.'config/autoload.php');
}

if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/autoload.php'))
{
	include(APPPATH.'config/'.ENVIRONMENT.'/autoload.php');
}

function _ci_prep_filename($filename, $extension)
{
	if ( ! is_array($filename))
	{
		return array(strtolower(str_replace(array($extension, '.php'), '', $filename).$extension));
	}
	else
	{
		foreach ($filename as $key => $val)
		{
			$filename[$key] = strtolower(str_replace(array($extension,'.php'),'', $val).$extension);
		}

		return $filename;
	}
}	

$_ci_file_paths =	array(APPPATH, BASEPATH);
foreach (_ci_prep_filename($autoload['helper'], '_helper') as $helper)
{
	foreach ($_ci_file_paths as $path)
		{  
			if (file_exists($path.'helpers/'.$helper.'.php'))
			{   include_once($path.'helpers/'.$helper.'.php');
				log_message('info', 'Helper loaded: '.$helper);
				break;
			}
		}
}

foreach ($_ci_file_paths as $path)
{ 
	$dir =  $path."language/".$_SESSION['lang'].'/';
	if (file_exists($dir)){
	   $d  =  dir($dir);
	   while($filename   =  $d->read() ){
	   	    if($filename!="." and $filename!=".." and $filename!="index.html"){
	             include_once($dir.$filename);
				 log_message('info', 'Language loaded: '.$filename);
	   	    }
	   }
	   $d->close(); 
	}
}

if (isset($autoload['libraries']) && count($autoload['libraries']) > 0)
{
	// Load the database driver.
	if (in_array('database', $autoload['libraries']))
	{
		$autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
	}

	foreach ($autoload['libraries'] as $library)
	{   
		foreach ($_ci_file_paths as $path)
			{  
				if (file_exists($path.'libraries/'.$library.'.php'))
				{   include_once($path.'libraries/'.$library.'.php');
					log_message('info', 'Libraries loaded: '.$library);
					break;
				}
			}
	}
}	