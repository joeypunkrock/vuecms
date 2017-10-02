<?php
require_once('inc/global.inc.php');
get_header();
get_sideNav();
?>

<main class="col-sm-9 ml-sm-auto col-md-10 pt-3">

	<div class="card" id="tasks">
		<div class="card-body">
			
			<h4 class="card-title">Tasks</h4>

			<ul class="list-group checked-list-box">
			  <li class="list-group-item" 
			  	v-for="todo in todos"
			  	v-bind:check="todo.checked"
			  	:key="todo.id">
			  		<i class="fa fa-fw" 
			  			v-on:click="upd_checked(todo)"
			  			v-bind:class="[todo.checked == 1 ? 'fa-check-square-o' : 'fa-square-o']">
			  		</i>
			  		<input type="text" class="list-group-input" v-model="todo._text" v-on:change="upd_text(todo)">
				</li>
			</ul>

		</div>
	</div>

</main>

<?php
get_footer();
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
		    	this.todo = todo.checked == 1 ? this.todo = todo.checked = 0 : this.todo = todo.checked = 1

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