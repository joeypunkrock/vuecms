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

		<!-- bootstrap switch -->
		<link rel="stylesheet" href="/admin/node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">

<!-- 		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		<script>
			tinymce.init({
			selector: '.tinymce'
			});
		</script> -->

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

function get_publishSettings() { ?>

	<div class="card page-edit-card">
		<div class="card-body text-center">

			<h6>Publish Settings</h6>
			<hr>

			<button 
				type="submit" 
				class="btn btn-info btn-block btn-sm mb-2"
				name="submit"
				id="submit">Save
			</button>

			<input type="checkbox" name="live" id="live" v-model="pages.live">
		
			<button 
				type="button" 
				class="btn btn-outline-danger btn-block btn-sm mt-4"
				v-on:click="delElem(pages)">Delete
			</button>

		</div>
	</div>

<?php }

function get_footer() { ?>
			
				</div> <!-- /main-panel -->
			</div> <!-- /row -->
		</div> <!-- container-fluid -->

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

		<!-- sweetalert -->
		<script src="/admin/node_modules/sweetalert/dist/sweetalert.min.js"></script>

		<!-- bootstrap -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
		<script src="/admin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- bootstrap Switch -->
		<script src="/admin/node_modules/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>

	 	<script src="/admin/app.js"></script>

	 	<script>
	 		const module = '/admin/modules/';
	 	</script>

	</body>
	</html>

<?php }

?>