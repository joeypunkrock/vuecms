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
include_once(ADMIN_PATH . '/modules/task.module.php');
?>