<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @get all tasks
*/
if (isset($_POST['todos'])) {
	global $conn;

	$sql = "SELECT * FROM tbl_tasks";

	if ($todos = mysqli_query($conn, $sql)) {

		// fetch associative array
		while ($row = mysqli_fetch_assoc($todos)) {
			$rows[] = $row;
		}
		// free result set
		mysqli_free_result($todos);
	}
	mysqli_close($conn);

	// return data
	$data = $rows;
	echo json_encode($data);
	exit();
    
}

/*
*  @Update todo check
*/
if (isset($_POST['upd_checked'])) {
	global	$conn;

	$data = $_POST['upd_checked'];

	//set vars from data
	$id = isset($data['id']) ? $data['id'] : '';
	$checked = isset($data['checked']) ? $data['checked'] : '';

	//update task info in DB
	$sql = "UPDATE tbl_tasks SET checked = '$checked' WHERE id = '$id'";
    $upd_checked = mysqli_query($conn,$sql);
	mysqli_close($conn);
    //mysqli_free_result($upd_checked);

    echo json_encode($sql);
	exit();
}

/*
*  @Update todo text
*/
if (isset($_POST['upd_text'])) {
	global	$conn;

	$data = $_POST['upd_text'];

	//set vars from data
	$id = isset($data['id']) ? $data['id'] : '';
	$text = isset($data['text']) ? $data['text'] : '';

	//update task info in DB
	$sql = "UPDATE tbl_tasks SET _text = '$text' WHERE id = '$id'";
    $upd_text = mysqli_query($conn,$sql);
	mysqli_close($conn);
    //mysqli_free_result($upd_text);

    echo json_encode($sql);
	exit();
}

?>