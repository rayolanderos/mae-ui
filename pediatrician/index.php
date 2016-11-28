<?php 
$page_id = 5; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');

//$result =  post_friend("pediatrician", "Dr. Angela May", "512-567-5678", "amay@medical.com", "Austin, TX");

$pediatrician = get_friends("pediatrician"); 
$friend = $pediatrician[0];

?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<div class="row">
				<div class="span8 user-details">
		            <div class="user-image">
		                <img id="dr-image" src="<?php echo $GLOBALS['root_url']?>/img/dr.jpg" class="img-circle">
		            </div>
		            <div class="user-info-block">
		                <div class="user-heading">
		                    <h3 id="dr-name" class="capitalize"><?php echo $friend->name; ?></h3>
		                    <span id="dr-city" class="help-block capitalize"><?php echo $friend->nickname; ?></span>
		                </div>
		                <ul class="navigation">
		                    <li class="active">
		                        <a data-toggle="tab" href="#information">
		                            <i class="fa fa-user"></i>
		                        </a>
		                    </li>
		                    <li>
		                        <a data-toggle="tab" href="#settings">
		                            <i class="fa fa-cogs"></i>
		                        </a>
		                    </li>
		                    <li>
		                        <a data-toggle="tab" href="#email">
		                            <i class="fa fa-envelope"></i>
		                        </a>
		                    </li>
		                </ul>
		                <div class="user-body">
		                    <div class="tab-content">
		                        <div id="information" class="tab-pane active">
		                            <h4>General Information</h4>
		                            <ul class="user-information">
		                            	<li><b><i class="fa fa-envelope" aria-hidden="true"></i> Email:</b> <span iclass="friend-email"><?php echo $friend->email; ?></a></li>
		                            	<li><b><i class="fa fa-phone" aria-hidden="true"></i> Phone:</b> <span class="friend-phone"><?php echo $friend->phone; ?></a></li>
		                            	<li><b><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</b> <span class="capitalize friend-address">2 Main St, Austin TX, 78705</a></li>
			                        </ul>
		                        </div>
		                        <div id="settings" class="tab-pane">
		                            <h4>Settings</h4>
		                            <form>
		                            	<div class="form-group">
						                	<label class="col-md-2 control-label">Name</label>  
						                	<div class="col-md-10 inputGroupContainer">
						                  		<div class="input-group">
						                    		<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
						                    		<input  name="name" placeholder="Name" class="form-control"  type="text" value="<?php echo $friend->name;?>">
						                  		</div>
						                	</div>
						              	</div>
						              	<div class="form-group">
						                	<label class="col-md-2 control-label">Nickname</label>  
						                	<div class="col-md-10 inputGroupContainer">
						                  		<div class="input-group">
						                    		<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
						                    		<input  name="nickname" placeholder="Address" class="form-control"  type="text" value="<?php echo $friend->nickname;?>">
						                  		</div>
						                	</div>
						              	</div>
						              	<div class="form-group">
						                	<label class="col-md-2 control-label">Email</label>  
						                	<div class="col-md-10 inputGroupContainer">
						                  		<div class="input-group">
						                    		<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
						                    		<input  name="phone" placeholder="Phone Number" class="form-control"  type="text" value="<?php echo $friend->phone;?>">
						                  		</div>
						                	</div>
						              	</div>
						              	<div class="form-group">
						                	<label class="col-md-2 control-label">Email</label>  
						                	<div class="col-md-10 inputGroupContainer">
						                  		<div class="input-group">
						                    		<span class="input-group-addon"><i class="" aria-hidden="true">@</i></span>
						                    		<input  name="email" placeholder="Email" class="form-control"  type="text" value="<?php echo $friend->email;?>">
						                  		</div>
						                	</div>
						              	</div>
						              	<div class="form-group">
							                <label class="col-md-8 control-label"></label>
							                <div class="col-md-12">
							                	<br>
							                  	<button type="submit" class="btn btn-success btn-lg pull-right" >Done <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
							                	<div class="clear"></div>
							                </div>
							            </div>
		                            </form>
		                        </div>
		                        <div id="email" class="tab-pane">
		                            <h4>Send Message</h4>
		                            <form>
		                            	<!-- Text area --> 
										<div class="form-group">
											<label class="col-md-2 control-label">Email your pediatrician</label>
											<div class="col-md-10 inputGroupContainer">
											  	<div class="input-group">
											    	<span class="input-group-addon txt"><i class="fa fa-envelope" aria-hidden="true"></i></span>
											    	<textarea class="form-control" name="comment" placeholder="Your Message" rows="7"></textarea>
											  	</div>
											</div>
										</div>
										<!-- Button -->
							              <div class="form-group">
							                <label class="col-md-8 control-label"></label>
							                <div class="col-md-12">
							                	<br>
							                 	<button type="submit" class="btn btn-success btn-lg pull-right" >Send <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
							                	<div class="clear"></div>
							                </div>
							              </div>

		                            </form>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
			</section>
		</div>
	</div>
</body>

</script>
</html>