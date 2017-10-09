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
require_once('db-connect.php');

//select site settings values
$configSQL = "SELECT * FROM tblConfig";
$configResult = mysqli_query($conn, $configSQL);
$configArray = array();

//assign settings into settingArray
while ($row = mysqli_fetch_assoc($configResult)) {
    $configArray[$row['confKey']] = $row['confVal'];
}

/*
*	@Assign file paths to PHP constants
*	__FILE__ returns the current path to this file
*	dirname() returns the path to the parent directory
*/
define("PROJECT_PATH", dirname(__FILE__));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("ADMIN_PATH", PROJECT_PATH . '/admin');

// maximum login attempts
define("MAX_ATTEMPTS", 5);
// timeout (in seconds) after max attempts are reached
define("LOGIN_TIMEOUT", 300);

define("SITENAME", $configArray["siteName"]);

// EMAIL SETTINGS
// SEND TEST EMAILS THROUGH FORM TO https://www.mail-tester.com GENERATED ADDRESS FOR SPAM SCORE
define("FROM_EMAIL", $configArray["fromEmail"]); // Webmaster email
define("FROM_NAME", $configArray["fromName"]); // "From name" displayed on email

?>