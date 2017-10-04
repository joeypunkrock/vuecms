<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @get page/pages info
*/
if (isset($_POST['getPages'])) {
	global	$conn;

	$data = $_POST['getPages'];
	$elemId = isset($data['pageId']) ? $data['pageId'] : '';

	// if we have a page id select the single page data. Else get all pages
	if($elemId != '') {
		$sql = "SELECT * FROM tblPages WHERE pageId = '$elemId'";
	} else {
		$sql = "SELECT * FROM tblPages";
	}

	if ($getPages = mysqli_query($conn, $sql)) {

		if($elemId != '') {
			$rows = mysqli_fetch_assoc($getPages);
		} else {
			// fetch associative array
			while ($row = mysqli_fetch_assoc($getPages)) {
				$rows[] = $row;
			}
		}

		// free result set
		mysqli_free_result($getPages);
	}
	mysqli_close($conn);

	// return data
	echo json_encode($rows);
	exit();
}

/*
*  @Update page
*/
if (isset($_POST['updPage'])) {
	global	$conn;

	$data = $_POST['updPage'];

	// set vars from data
	$pageId = isset($data['pageId']) ? $data['pageId'] : '';

	$set = "
		SET pageName = '". mysqli_real_escape_string($conn, $data['pageName']) ."',
			pageUrl = '". mysqli_real_escape_string($conn, $data['pageUrl']) ."',
			pageHeading = '". mysqli_real_escape_string($conn, $data['pageHeading']) ."',
			pageContent = '". mysqli_real_escape_string($conn, $data['pageContent']) ."'
	";

	if ($pageId != '') {
		// update pasge info in DB
		$sql = "UPDATE tblPages
				$set
				WHERE pageId = '$pageId'
				";
	} else {
		// add in DB
		$sql = "INSERT INTO tblPages
				$set
				";
	}
    $updPage = mysqli_query($conn,$sql);
	mysqli_close($conn);

	// send back data
	if (!$updPage) {
		echo json_encode(mysqli_error($conn));
		exit();
	} else {
	    echo json_encode($data['pageName']);
		exit();
	}

}

?>

<script>
	const pages = new Vue({
		el: '#page',
		data: {
			pages: {}
		},
		// get all pages after DOM render
		mounted() {
			// get single page id to see if we are on a single edit page
			const pageId = $('.page-edit-card').data('page_id') ? $('.page-edit-card').data('page_id') : '';

	    	// create object of constants
		    const pageInfo = {
		    	pageId: pageId
		    };

		    // post request
			axios.post(module+'page.module.php', { getPages: pageInfo })
				.then(response => {
					this.pages = response.data;
					console.log(response.data);
				})
				.catch(error => {
					this.errors.push(error);
					console.log(response.data);
				})
		},
		methods: {
			// update page element
		    updPage: function (page) {

    	    	// create object of constants
    		    const pageInfo = {
    		    	pageId: page.pageId,
    		    	pageName: page.pageName,
    		    	pageUrl: page.pageUrl,
    		    	pageHeading: page.pageHeading,
    		    	pageContent: page.pageContent
    		    };

	    	    // post request
	    		axios.post(module+'page.module.php', { updPage: pageInfo })
	    			.then(response => {
	    				// check for sql error responses
	    				if (response.data.indexOf("error") >= 0 || response.data.indexOf("warning")  >= 0) {
	    					swal('Oops!', response.data, 'error');
	    				} else {
	    					moduleUpdated('Page', response.data);
	    					//console.log(response.data);
	    				}
	    			})
	    			.catch(error => {
	    				this.errors.push(error);
	    				swal('Error!', response.data, 'error');
	    			})

			}
		}
	});
</script>