<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/settings.php');

// echo ('admin path: ' . ADMIN_PATH . '<br>');
// echo ('project path: ' . PROJECT_PATH . '<br>');
// echo ('public path: ' . PUBLIC_PATH . '<br>');
//die();

function get_header() { 
	global	$conn;
	$page_title = isset($page_title) ? $page_title : 'Admin Panel';
	?>

	<!doctype html>

	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Vue - <?php echo $page_title; ?></title>

		<!-- bootstrap-vue -->
<!-- 	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap@next/dist/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/> -->
	
		<!-- boostrap -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="/admin/node_modules/bootstrap/dist/css/bootstrap.min.css">
		
		<!-- font awesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- izitoast -->
		<link rel="stylesheet" href="/admin/node_modules/izitoast/dist/css/izitoast.min.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css" integrity="sha256-xs2k744k81ISIOyl14txiKpaRncakLx29JiAve4063w=" crossorigin="anonymous" />

		<!-- app -->
		<link rel="stylesheet" href="/admin/resources/css/app.css">

	</head>

	<body>

		<div class="main-panel">

			<?php get_topNav(); ?>

			<div class="container-fluid">
				<div class="row">

<?php }

function get_topNav() { ?>

	<div class="top-nav navbar-dark bg-dark clearfix" role="complementary">
		<ul class="nav float-left">
		  <li class="nav-item">
		    <a class="nav-link" href="#">Dashboard</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#"><i class="fa fa-bell" aria-hidden="true"></i><span class="sr-only">Notifcations</span> <span class="badge badge-secondary">6</span></a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only">Search</span></a>
		  </li>
		</ul>
		<ul class="nav float-right">
			<li class="nav-item">
			  <a class="nav-link" href="/users">profile</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="#">Log out</a>
			</li>
		</ul>
	</div>

<?php }

function get_sideNav() { ?>

	<div class="col-sm-3 col-md-2 d-none d-sm-block sidebar" role="navigation">
		<ul class="nav nav-pills flex-column pl-4 pr-4">
			<li class="nav-item">
				<a class="nav-link active" href="/">Overview <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/pages">Pages</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Analytics</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Export</a>
			</li>
		</ul>
	</div>

<?php }

function get_publish_settings() { ?>

	<div class="card page-edit-card">
		<div class="card-body">

			<h6 class="text-center">Publish Settings</h6>
			<hr>

			<button 
				type="submit" 
				class="btn btn-info btn-block btn-sm" 
				id="submit">Save
			</button>
			
			<div class="mb-4"></div>

			<button 
				type="button" 
				class="btn btn-outline-danger btn-block btn-sm"
				data-toggle="modal"
				data-target="#confirm_delete_modal">Delete
			</button>

		</div>
	</div>

<?php }

function get_footer() { ?>
			
				</div> <!-- /main-panel -->
			</div> <!-- /row -->
		</div> <!-- container-fluid -->

		<div class="modal fade" id="confirm_delete_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_delete_modal_label" aria-hidden="true">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content text-center">
		      <div class="modal-header">
		        <h5 class="modal-title" id="confirm_delete_modal_label"><strong>DELETE PAGE</strong></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        This action cannot be undone. <br> Are you sure you want to delete?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
		        <button type="button" class="btn btn-outline-danger">Confirm Delete</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- jQuery -->
		<!-- <script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script> -->
		<script src="/admin/node_modules/jquery/dist/jquery.min.js"></script>

		<!-- vue -->
		<!-- <script src="https://unpkg.com/vue"></script> -->
		<script src="/admin/node_modules/vue/dist/vue.js"></script>

		<!-- axios -->
		<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
		<script src="/admin/node_modules/axios/dist/axios.min.js"></script>

		<!-- bootstrap-vue -->
<!-- 	<script src="//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
		<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script> -->

		<!-- popper -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

		<!-- izitoast -->
		<script src="/admin/node_modules/izitoast/dist/js/izitoast.min.js"></script>

		<!-- bootstrap -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
		<script src="/admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

	 	<script src="/admin/app.js"></script>

	 	<script>
	 		const module = '/admin/modules/';
	 	</script>

	</body>
	</html>

<?php }

?>