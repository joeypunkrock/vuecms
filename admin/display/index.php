<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/inc/global.inc.php');
get_header();
get_sideNav();
?>

<main class="col-sm-9 ml-sm-auto col-md-10 pt-3">

	<div class="card" id="tasks">
		<div class="card-body">
			
			<h4 class="card-title">Tasks</h4>

			<ul class="list-group checked-list-box">
			  <li class="list-group-item" 
			  	v-for="task in tasks"
			  	v-bind:check="task.taskChecked"
			  	:key="task.taskId">
			  		<i class="fa fa-fw" 
			  			v-on:click="updChecked(task)"
			  			v-bind:class="[task.taskChecked == 1 ? 'fa-check-square-o' : 'fa-square-o']">
			  		</i>
			  		<input type="text" class="list-group-input" v-model="task.taskText" v-on:change="updText(task)">
				</li>
			</ul>

		</div>
	</div>

</main>

<?php
get_footer();
include_once(ADMIN_PATH . '/modules/task.module.php');
?>

<script>
	iziToast.info({
        id: 'saveReminder',
        title: 'Welcome back Joey',
        position: 'topRight',
        transitionIn: 'bounceInLeft'
    });
</script>