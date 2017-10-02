<?php
require_once('inc/global.inc.php');
get_header();
get_sideNav();
?>

<main class="col-sm-9 ml-sm-auto col-md-10 pt-3">

	<div class="card" id="pages">
		<div class="card-body">
			
			<h4 class="card-title">Pages</h4>

			<ul class="list-group checked-list-box">
			  <li class="list-group-item" 
			  	v-for="page in pages"
			  	:key="page.page_id">
					<ul class="nav">
					  <li class="nav-item">
					    <span class="nav-link pl-0"><input type="text" class="list-group-input" v-model="page.page_name" v-on:change="upd_page(page)"></span>
					  </li>
					  <li class="nav-item">
					    <span class="nav-link">www.website.com/<input type="text" class="list-group-input" v-model="page.page_url" v-on:change="upd_page(page)"></span>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="/" data-toggle="tooltip" data-placement="top" title="Edit Page"><i class="fa fa-fw fa-pencil-square-o"><span class="sr-only">Edit Page</span></i></a>
					  </li>
					  <li class="nav-item">
					    <button type="button" class="nav-link btn btn-link" data-toggle="tooltip" data-placement="top" title="Delete Page"><i class="fa fa-fw fa-times"><span class="sr-only">Delete Page</span></i></button>
					  </li>
					</ul>
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
		el: '#pages',
		data: {
			pages: []
		},
		// get pages on creation
		created() {
			axios.post(module+'page.module.php', { pages: this.pages })
				.then(response => {
					this.pages = response.data;
					console.log(response.data);
				})
				.catch(error => {
					this.errors.push(error);
					console.log(response.data);
				})
		}
	})
</script>