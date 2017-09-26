<?php
require_once('inc/global.inc.php');
get_header();
get_sideNav();
?>

<main class="col-sm-9 ml-sm-auto col-md-10 p-4">

	<div id="userInfo">

		<div class="row">

			<div class="col-md-8">
				
				<div class="card">

					<div class="card-body">

					  <h4 class="card-title">Edit Profile</h4>

					  <form class="pt-2 editor">
					    <div class="form-row">
					    	<div class="form-group col-md-4">
				    			<label for="user_company">Company <small>(Disabled)</small></label>
				    			<input type="text" class="form-control" id="user_company" placeholder="First Name" value="ATTAIN Digital" readonly>
					    	</div>
							<div class="form-group col-md-4">
								<label for="user_username">Username</label>
								<input type="text" class="form-control" id="user_username" placeholder="Username" v-model="user_username">
							</div>
					    	<div class="form-group col-md-4">
								<label for="user_email">Email Address</label>
								<input type="text" class="form-control" id="user_email" placeholder="Email Address" v-model="user_email">
					    	</div>
					    </div>
				        <div class="form-row">
				    		<div class="form-group col">
			    				<label for="user_firstName">First Name</label>
			    				<input type="text" class="form-control" id="user_firstName" placeholder="First Name" v-model="user_firstName">
				    		</div>
				        	<div class="form-group col">
			    				<label for="user_lastName">Last Name</label>
			    				<input type="text" class="form-control" id="user_lastName" placeholder="Last Name" v-model="user_lastName">
				        	</div>
				        </div>
				        <button type="submit" class="btn btn-info pull-right" data-container="body" data-toggle="popover" data-placement="left" data-content="Remember to save your changes!">Update Profile</button>
				        <div class="clearfix"></div>
					  </form>

					</div>

				</div>

			</div>
			
			<div class="col-md-4">
				
				<div class="card card-user">

				  <div class="image">
				  	<img class="card-img-top" src="http://lorempixel.com/600/500" alt="Card image cap">
				  </div>

				  <div class="card-body">

				  	<div class="author">
			            <img class="avatar border-gray" src="http://i.pravatar.cc/150?img=69" alt="...">
						<h4 class="title">{{ user_firstName }} {{ user_lastName }}<br>
							<small>{{ user_username }}</small>
						</h4>
	                </div>
	                <br>
				    <p class="card-text text-center pl-2">{{ user_email }}</p>
				    <hr>

				    <div class="text-center">
	                    <button href="#" class="btn btn-transparent"><i class="fa fa-facebook-square"></i></button>
	                    <button href="#" class="btn btn-transparent"><i class="fa fa-twitter"></i></button>
	                    <button href="#" class="btn btn-transparent"><i class="fa fa-google-plus-square"></i></button>
	                </div>

				  </div>

				</div>

			</div>

		</div>

	</div>

</main>

<?php
get_footer();
?>