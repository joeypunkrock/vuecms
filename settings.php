<?php
/*
*  Global application settings
*/

/*
*	@set the workng environment
*	Options:
*		development
*		staging
*		production
*/
define("ENV", 'development');

/*
*	@Assign file paths to PHP constants
*	__FILE__ returns the current path to this file
*	dirname() returns the path to the parent directory
*/
define("PROJECT_PATH", dirname(__FILE__));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("ADMIN_PATH", PROJECT_PATH . '/admin');

require_once('db-connect.php');

?>