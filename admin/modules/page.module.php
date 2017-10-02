<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @get all pages
*/
if (isset($_POST['pages'])) {
	global $conn;

	$sql = "SELECT * FROM tbl_pages";

	if ($pages = mysqli_query($conn, $sql)) {

		// fetch associative array
		while ($row = mysqli_fetch_assoc($pages)) {
			$rows[] = $row;
		}
		// free result set
		mysqli_free_result($pages);
	}
	mysqli_close($conn);

	// return data
	$data = $rows;
	echo json_encode($data);
	exit();
    
}

?>