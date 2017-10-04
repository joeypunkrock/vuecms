<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/inc/global.inc.php');
get_header();
get_sideNav();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$pageId = isset($_GET['pageId']) ? $_GET['pageId'] : '';
?>

<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" id="page">

	<?php if($action == 'edit' || $action == 'add') { ?>

		<form class="editor" v-on:submit.prevent="updPage(pages)">

			<div class="row">
				<div class="col-md-10">
				
					<div class="card page-edit-card" data-page_id="<?php echo $pageId ?>">
						<div class="card-body">
							
							<h4><?php echo ucfirst($action); ?> {{pages.pageName}} page</h4>

							<div class="form-row pt-2">

								<div class="form-group col-md-6">
									<label for="pageName">Name</label>
									<input type="text" class="form-control" name="pageName" id="pageName" v-model="pages.pageName">
								</div>

								<div class="form-group col-md-6">
							    	<label for="pageUrl">Url</label>
							      	<div class="input-group mb-2 mb-sm-0">
							        	<div class="input-group-addon">www.website.com/</div>
							        	<input type="text" class="form-control" name="pageUrl" id="pageUrl" v-model="pages.pageUrl">
							    	</div>
							    </div>

							</div>

							<div class="form-row">
							
								<div class="form-group col">
									<label for="pageHeading">Heading</label>
									<input type="text" class="form-control form-control-lg" name="pageHeading" id="pageHeading" v-model="pages.pageHeading">
								</div>

							</div>

							<div class="form-row">
							
								<div class="form-group col">
									<label for="pageContent">Content</label>
									<textarea class="form-control tinymce" name="pageContent" id="pageContent" cols="30" rows="10" v-model="pages.pageContent"></textarea>
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
			
			<h4 class="card-title">Pages <a class="btn btn-outline-primary btn-sm ml-2" href="?action=add">Add New</a></h4>

			<ul class="list-group">
			  <li class="list-group-item" v-for="page in pages" :key="page.pageId">
					<ul class="nav">
					  <li class="nav-item">
					    <span class="nav-link pl-0" data-toggle="tooltip" data-placement="top" title="Edit Name"><input type="text" class="list-group-input" v-model="page.pageName" v-on:change="updPage(page)"></span>
					  </li>
					  <li class="nav-item">
					    <span class="nav-link" data-toggle="tooltip" data-placement="top" title="Edit Url">http://www.website.com/<input type="text" class="list-group-input" v-model="page.pageUrl" v-on:change="updPage(page)"></span>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" v-bind:href="'?pageId=' + page.pageId + '&action=edit'" data-toggle="tooltip" data-placement="top" title="Edit Page"><i class="fa fa-fw fa-pencil-square-o"><span class="sr-only">Edit Page</span></i></a>
					  </li>
					  <li class="nav-item">
					    <button type="button" class="nav-link btn btn-link" data-toggle="tooltip" data-placement="top" title="Delete Page"><i class="fa fa-fw fa-times" data-toggle="modal" data-target="#confirm_delete_modal"><span class="sr-only">Delete Page</span></i></button>
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
