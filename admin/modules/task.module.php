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


<script>

	// TODO - merge two method functions for todo update into one
	// checking for change, and updating value if changed.
	// look at vue watch method possibly will do it.

	const tasks = new Vue({
		el: '#tasks',
		data: {
			todos: []
		},
		// watch: {
		// 	todos: {
		// 		handler: function (val, oldVal) {
		// 			console.log(val + '' + oldVal);
		// 		},
		// 		deep: true
		// 	}
		// },
		// get todos on creation
		created() {
			axios.post(module+'task.module.php', { todos: this.todos })
				.then(response => {
					this.todos = response.data;
					console.log(response.data);
				})
				.catch(error => {
					this.errors.push(error);
					console.log(response.data);
				})
		},
		methods: {
			// update todo check
		    upd_checked: function (todo) {

		    	// ternary true/false switch
		    	this.todo = todo.checked == 1 ? this.todo = todo.checked = 0 : this.todo = todo.checked = 1;

		    	// create object of constants
			    const todo_info = {
			    	id: this.todo = todo.id,
			        checked: this.todo = todo.checked
			    };

				axios.post(module+'task.module.php', { upd_checked: todo_info })
				    .then(response => {
				        console.log(response.data);
				    })
				    .catch(error => {
				    	console.log('err');
				        console.log(error.message);
				    });
			},
			// update todo text
		    upd_text: function (todo) {

		    	// create object of constants
			    const todo_info = {
			    	id: this.todo = todo.id,
			        text: this.todo = todo._text
			    };

				axios.post(module+'task.module.php', { upd_text: todo_info })
				    .then(response => {
				        console.log(response.data);
				    })
				    .catch(error => {
				    	console.log('err');
				        console.log(error.message);
				    });
			}
		}
	})
</script>