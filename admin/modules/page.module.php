<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @get page/pages info
*/
if (isset($_POST['pages'])) {
	global $conn;

	$data = $_POST['pages'];
	$page_id = isset($data['page_id']) ? $data['page_id'] : '';

	// if we have a page id select the single page data. Else get all pages
	if($page_id != '') {
		$sql = "SELECT * FROM tbl_pages WHERE page_id = '$page_id'";
	} else {
		$sql = "SELECT * FROM tbl_pages";
	}

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

<script>
	const page = new Vue({
		el: '#page',
		data: {
			pages: []
		},
		// get all pages after DOM render
		mounted() {
			// get single page id to see if we are on a single edit page
			const page_id = $('.page-edit-card').data('page_id') ? $('.page-edit-card').data('page_id') : '';

	    	// create object of constants
		    const page_info = {
		    	page_id: page_id
		    };

		    // post request
			axios.post(module+'page.module.php', { pages: page_info })
				.then(response => {
					this.pages = response.data;
					console.log(response.data);
				})
				.catch(error => {
					this.errors.push(error);
					console.log(response.data);
				})
		},
	});
</script>