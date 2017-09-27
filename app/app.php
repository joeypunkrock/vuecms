<?php
$doc_root = $_SERVER['DOCUMENT_ROOT'];
require_once($doc_root.'/app/inc/global.inc.php');
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
			  	v-bind:check="todo.dataChecked"
			  	v-on:click="check">
			  		<i class="fa fa-fw fa-square-o"></i><input type="text" class="list-group-input" v-model="todo.text">
				</li>
			</ul>

		</div>
	</div>

</main>

<?php
get_footer();
?>

<script>
	var tasks = new Vue({
	  el: '#tasks',
	  data: {
	    todos: [
	      { text: 'Drink coffee', dataChecked: 'true' },
	      { text: 'Learn Vue', dataChecked: 'false' },
	      { text: 'Build something awesome', dataChecked: 'false' }
	    ]
	  },
	  methods: {
	  	check: function() {
	  		console.log('hi');
	  	}
	  }
	})
</script>