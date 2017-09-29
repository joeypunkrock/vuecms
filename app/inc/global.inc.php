<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];
require_once($doc_root.'/db-connect.php');

function get_header() { 
	global	$conn ?>

	<!doctype html>

	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Vue CMS</title>

		<!-- bootstrap-vue -->
<!-- 	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap@next/dist/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/> -->
	
		<!-- boostrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="/resources/css/app.css">

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
			  <a class="nav-link" href="/profile">profile</a>
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
				<a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Reports</a>
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

function get_footer() { ?>
			
				</div> <!-- /main-panel -->
			</div> <!-- /row -->
		</div> <!-- container-fluid -->

		<!-- jQuery -->
		<script
		  src="https://code.jquery.com/jquery-3.2.1.min.js"
		  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		  crossorigin="anonymous"></script>

		<!-- vue -->
		<script src="https://unpkg.com/vue"></script>
		<!-- axios -->
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<!-- bootstrap-vue -->
<!-- 	<script src="//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
		<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script> -->

		<!-- popper -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

		<!-- bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	 	<script src="/app/app.js"></script>

	</body>
	</html>

<?php }

?>