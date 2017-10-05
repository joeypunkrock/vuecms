<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @get page/pages info
*/
if (isset($_POST['getPages'])) {
	global	$conn;

	$elemId = isset($_POST['getPages']) ? $_POST['getPages'] : '';

	// if we have a page id select the single page data. Else get all pages
	if($elemId != '') {
		$sql = "SELECT * FROM tblPages WHERE pageId = '$elemId'";
	} else {
		$sql = "SELECT * FROM tblPages";
	}

	// get data
	if ($getPages = mysqli_query($conn, $sql)) {

		if($elemId != '') { // single
			$rows = mysqli_fetch_assoc($getPages);
		} else { // multiple
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
*  @update page
*/
if (isset($_POST['updPage'])) {
	global	$conn;

	$data = $_POST['updPage'];

	// set vars from data
	$pageId = isset($data['pageId']) ? mysqli_real_escape_string($conn, $data['pageId']) : '?';
	$pageName = isset($data['pageName']) ? mysqli_real_escape_string($conn, $data['pageName']) : '';
	$pageUrl = isset($data['pageUrl']) ? mysqli_real_escape_string($conn, $data['pageUrl']) : '';
	$pageHeading = isset($data['pageHeading']) ? mysqli_real_escape_string($conn, $data['pageHeading']) : '';
	$pageContent = isset($data['pageContent']) ? mysqli_real_escape_string($conn, $data['pageContent']) : '';

	$set = "
		SET pageName = '${pageName}',
			pageUrl = '${pageUrl}',
			pageHeading = '${pageHeading}',
			pageContent = '${pageContent}'
	";

	// check if we are updating an existing record or adding a new one
	if ($pageId != '?') {
		$sql = "UPDATE tblPages $set WHERE pageId = '$pageId' ";
	} else {
		$sql = "INSERT INTO tblPages $set ";
	}
    $updPage = mysqli_query($conn, $sql);

	$newId = mysqli_insert_id($conn); // get id of added record
	mysqli_close($conn);

	// send back data
	if (!$updPage) {
		$response = mysqli_error($conn);
	} else {
	    $response = array( 'pageId' => "$pageId", 'newId' => $newId, 'pageName' => "$pageName" );
	}

    echo json_encode($response);
	exit();
}

/*
*  @delete page
*/
if (isset($_POST['delPage'])) {
	global	$conn;

	// set var from data
	$pageId = $_POST['delPage'];

	// delete record
	$sql = "DELETE FROM tblPages WHERE pageId = '$pageId'";

    $delPage = mysqli_query($conn,$sql);
	mysqli_close($conn);

	// send back data
	if (!$delPage) {
		echo json_encode(mysqli_error($conn));
		exit();
	} else {
	    echo json_encode($sql);
		exit();
	}

}

?>

<script>
	const pages = new Vue({
		el: '#page',
		data: {
			pages: {} // object array of data
		},
		// get all pages after DOM render
		mounted() {
			// get single page id to see if we are on a single edit page
			const pageId = $('.page-edit-card').data('page_id') ? $('.page-edit-card').data('page_id') : '';

		    // post request
			axios.post(module+'page.module.php', { getPages: pageId })
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
			// update/add page element
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
    					//if new page or updated existing
    					console.log(response.data);
    					if(response.data.pageId == '?') { // if new page. ? = new id
    						swal('Page'+createdTitle, page.pageName+createdText, 'success')
							.then(function () {
								window.location.search += '&pageId='+response.data.newId; // reload page with new id
							});
    					} else {
    						moduleUpdated('Page', page.pageName);
    					}
	    			})
	    			.catch(error => {
	    				//this.errors.push(error);
	    				this.pages = error.data;
	    				console.log(error.data);
	    				//swal('Error!', error, 'error');
	    			})

			},
			// delete page element
		    delElem: function (page) {

		    	console.log(page.pageId);

		    	// warning message
		    	swal({
		    	  title: deleteWarningTitle,
		    	  text: deleteWarningText,
		    	  type: 'warning',
		    	  showCancelButton: true,
		    	  confirmButtonColor: '#3085d6',
		    	  cancelButtonColor: '#d33',
		    	  confirmButtonText: 'Yes, delete it!'
		    	}).then(function () {

		    	    // post request
		    		axios.post(module+'page.module.php', { delPage: page.pageId })
		    			.then(response => {
							swal(deletedTitle, page.pageName+deletedText, 'error')
							.then(function () {
								window.location.search = '/pages';
							});
		    			})
		    			.catch(error => {
		    				this.errors.push(error);
		    				swal('Error!', response.data, 'error');
		    			})

		    	})

			}
		}
	});
</script>