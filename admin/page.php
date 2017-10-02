<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/inc/global.inc.php');
get_header();
get_sideNav();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$page_id = isset($_GET['page_id']) ? $_GET['page_id'] : '';
?>

<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" id="page">

	<?php if($action == 'edit' || $action == 'add') { ?>

	<form class="editor">

		<div class="row">
			<div class="col-md-10">
			
				<div class="card page-edit-card" :data-page_id="<?php echo $page_id ?>">
					<div class="card-body" v-for="page in pages" :key="page.page_id">
						
						<h4>Edit Page</h4>

						<div class="form-row pt-2">

							<div class="form-group col-md-6">
								<label for="page_name">Name</label>
								<input type="text" class="form-control" id="page_name" v-model="page.page_name" v-on:change="upd_page(page)">
							</div>

							<div class="form-group col-md-6">
						    	<label for="page_slug">Slug</label>
						      	<div class="input-group mb-2 mb-sm-0">
						        	<div class="input-group-addon">www.website.com/</div>
						        	<input type="text" class="form-control" id="page_slug" v-model="page.page_url">
						    	</div>
						    </div>

						</div>

					</div>
				</div>
		
			</div>

			<div class="col-md-2">

				<?php get_publish_settings(); ?>

			</div>
		</div>

		</form>

	<?php } else { ?>

	<div class="card">
		<div class="card-body">
			
			<h4 class="card-title">Pages <a class="btn btn-outline-primary btn-sm ml-2" href="#">Add New</a></h4>

			<ul class="list-group">
			  <li class="list-group-item" v-for="page in pages" :key="page.page_id">
					<ul class="nav">
					  <li class="nav-item">
					    <span class="nav-link pl-0" data-toggle="tooltip" data-placement="top" title="Edit Name"><input type="text" class="list-group-input" v-model="page.page_name" v-on:change="upd_page(page)"></span>
					  </li>
					  <li class="nav-item">
					    <span class="nav-link" data-toggle="tooltip" data-placement="top" title="Edit Slug">http://www.website.com/<input type="text" class="list-group-input" v-model="page.page_url" v-on:change="upd_page(page)"></span>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" v-bind:href="'pages?page_id=' + page.page_id + '&action=edit'" data-toggle="tooltip" data-placement="top" title="Edit Page"><i class="fa fa-fw fa-pencil-square-o"><span class="sr-only">Edit Page</span></i></a>
					  </li>
					  <li class="nav-item">
					    <button type="button" class="nav-link btn btn-link" data-toggle="tooltip" data-placement="top" title="Delete Page"><i class="fa fa-fw fa-times"><span class="sr-only">Delete Page</span></i></button>
					  </li>
					</ul>
				</li>
			</ul>

		</div>
	</div>

	<?php } ?>

</main>

<?php
get_footer();
include_once(ADMIN_PATH . '/modules/page.module.php');
?>
