<?php

// Define the directory separator if not defined
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// Define the root of your site (in this case, the path to your project directory)
defined('SITE_ROOT') or define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'CMS_PHP' . DS . 'API');
//xammp/htdocs/cms_php/api/includes
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
//xammp/htdocs/cms_php/api/core
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

//load config file
require_once(INC_PATH.DS."config.php");

//load core classes
require_once(CORE_PATH.DS."post.php");
?>
