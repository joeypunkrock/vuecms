<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');
$_POST = json_decode(file_get_contents('php://input'), true);

/*
*  @get all tasks
*/
if (isset($_POST['tasks'])) {
	global $conn;

	$sql = "SELECT * FROM tblTasks";

	if ($tasks = mysqli_query($conn, $sql)) {

		// fetch associative array
		while ($row = mysqli_fetch_assoc($tasks)) {
			$rows[] = $row;
		}
		// free result set
		mysqli_free_result($tasks);
	}
	mysqli_close($conn);

	// return data
	$data = $rows;
	echo json_encode($data);
	exit();
    
}

/*
*  @Update task check
*/
if (isset($_POST['updChecked'])) {
	global	$conn;

	$data = $_POST['updChecked'];

	//set vars from data
	$taskId = isset($data['taskId']) ? $data['taskId'] : '';
	$taskChecked = isset($data['taskChecked']) ? $data['taskChecked'] : '';

	//update task info in DB
	$sql = "UPDATE tblTasks SET taskChecked = '$taskChecked' WHERE taskId = '$taskId'";
    $updChecked = mysqli_query($conn,$sql);
	mysqli_close($conn);

    echo json_encode($updChecked);
	exit();
}

/*
*  @Update task text
*/
if (isset($_POST['updText'])) {
	global	$conn;

	$data = $_POST['updText'];

	//set vars from data
	$taskId = isset($data['taskId']) ? $data['taskId'] : '';
	$taskText = isset($data['taskText']) ? $data['taskText'] : '';

	//update task info in DB
	$sql = "UPDATE tblTasks SET taskText = '$taskText' WHERE taskId = '$taskId'";
    $updText = mysqli_query($conn,$sql);
	mysqli_close($conn);
    //mysqli_free_result($upd_text);

    echo json_encode($sql);
	exit();
}

?>


<script>

	// task - merge two method functions for task update into one
	// checking for change, and updating value if changed.
	// look at vue watch method possibly will do it.

	const tasks = new Vue({
		el: '#tasks',
		data: {
			tasks: []
		},
		// watch: {
		// 	tasks: {
		// 		handler: function (val, oldVal) {
		// 			console.log(val + '' + oldVal);
		// 		},
		// 		deep: true
		// 	}
		// },
		// get tasks on creation
		created() {
			axios.post(module+'task.module.php', { tasks: this.tasks })
				.then(response => {
					this.tasks = response.data;
					console.log(response.data);
				})
				.catch(error => {
					this.errors.push(error);
					console.log(response.data);
				})
		},
		methods: {
			// update task check
		    updChecked: function (task) {

		    	// ternary true/false switch
		    	this.task = task.taskChecked == 1 ? this.task = task.taskChecked = 0 : this.task = task.taskChecked = 1;

		    	// create object of constants
			    const taskInfo = {
			    	taskId: this.task = task.taskId,
			        taskChecked: this.task = task.taskChecked
			    };

				axios.post(module+'task.module.php', { updChecked: taskInfo })
				    .then(response => {
				        console.log(response.data);
				        moduleUpdated('Task', '');
				    })
				    .catch(error => {
				    	console.log('err');
				        console.log(error.message);
				    });
			},
			// update task text
		    updText: function (task) {

		    	// create object of constants
			    const taskInfo = {
			    	taskId: this.task = task.taskId,
			        taskText: this.task = task.taskText
			    };

				axios.post(module+'task.module.php', { updText: taskInfo })
				    .then(response => {
				        console.log(response.data);
				        moduleUpdated('Task', '');
				    })
				    .catch(error => {
				    	console.log('err');
				        console.log(error.message);
				    });
			}
		}
	})
</script>