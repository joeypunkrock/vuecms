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
			  	v-bind:check="todo.check"
			  	:key="todo.id">
			  		<i class="fa fa-fw" 
			  			v-on:click="upd_check(todo)" 
			  			v-bind:class="[todo.check ? todo.checkedClass : todo.uncheckedClass]">
			  		</i>
			  		<input type="text" class="list-group-input" v-model="todo.text">{{todo.check}}
				</li>
			</ul>

		</div>
	</div>

</main>

<?php
get_footer();
?>

<script>
	const tasks = new Vue({
	  el: '#tasks',
	  data: {
	    todos: [
	      { id: 1, text: 'Drink coffee', check: true, checkedClass: 'fa-check-square-o', uncheckedClass: 'fa-square-o' },
	      { id: 2, text: 'Learn Vue', check: false, checkedClass: 'fa-check-square-o', uncheckedClass: 'fa-square-o' },
	      { id: 3, text: 'Build something awesome', check: false, checkedClass: 'fa-check-square-o', uncheckedClass: 'fa-square-o' }
	    ]
	  },
	  methods: {
  	    upd_check: function (todo) {

  	    	//ternary true/false switch
  	    	this.todo = todo.check ? this.todo = todo.check = false : this.todo = todo.check = true;

  	    	const check = this.todo = todo.check;
			axios.post('/app/modules/todo/todo.module.php', { upd_check: check })
			    .then(function (response) {
			        console.log(response.data);
			    })
			    .catch(function (error) {
			    	console.log('err');
			        console.log(error.message);
			    });
  	    }
	  }
	})
</script>