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
*  @Update page info
*/
if (isset($_POST['updPage'])) {
	global	$conn;

	$data = $_POST['updPage'];

	//set vars from data
	$pageId = isset($data['pageId']) ? $data['pageId'] : '';
	$pageName = isset($data['pageName']) ? $data['pageName'] : '';
	$pageUrl = isset($data['pageUrl']) ? $data['pageUrl'] : '';

	//update task info in DB
	$sql = "UPDATE tblPages
			SET pageName = '$pageName' ,
				pageUrl = '$pageUrl'
			WHERE pageId = '$pageId'
			";
    $updPage = mysqli_query($conn,$sql);
	mysqli_close($conn);

    echo json_encode($pageName);
	exit();
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
    		    	pageUrl: page.pageUrl
    		    };

    		    //console.log(pageInfo);

	    	    // post request
	    		axios.post(module+'page.module.php', { updPage: pageInfo })
	    			.then(response => {
	    				moduleUpdated('Page', response.data);
	    			})
	    			.catch(error => {
	    				this.errors.push(error);
	    				console.log('err');
	    				console.log(response.data);
	    			})

			}
		}
	});
</script>