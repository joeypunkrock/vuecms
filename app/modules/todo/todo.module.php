<?php
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @retrieve results from ajax request
*/
if (isset($_POST['upd_check'])) {
	echo $_POST['upd_check'];
	exit();
}

?>