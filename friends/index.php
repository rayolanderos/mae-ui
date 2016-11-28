<?php 
$page_id = 4; 
//$friend_count = 6;

require_once('../inc/header.php');
require_once('../inc/sidebar.php');


if(isset($_REQUEST['name']) ) {
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$nickname = $_REQUEST['nickname'];
	if($name != ""){
		$result =  post_friend("friend", $name, $phone, $email, $nickname);
		$log_saved = $result['success'];
	}

}


$friends = get_friends("friend"); 
$friend_count = count($friends);
//var_dump($friends);
?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1 class="pull-left inline"><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
					<a href="#" data-featherlight="../inc/friend.php" data-featherlight-type="ajax" id="btn-add-friend" class="btn btn-primary pull-right">Add a new friend <i class="fa fa-plus" aria-hidden="true"></i></a>
					<div class="clear"></div>
				</div>

				<div class="row">
				<?php  foreach ($friends as $key => $friend) { ?>
					<div id="friend-details-<?php echo $key;?>" class="span4 user-details friend-details">
			            <div class="user-image">
			                <img id="friend-image-<?php echo $key;?>" src="<?php echo $GLOBALS['root_url']?>/img/placeholder_user.png" class="img-circle friend-image">
			            </div>
			            <div class="user-info-block">
			                <div class="user-heading">
			                    <h3 id="friend-name-<?php echo $key;?>" class="capitalize friend-name"><?php echo $friend->name; ?></h3>
			                    <span id="friend-city-<?php echo $key;?>" class="help-block capitalize friend-city"><?php echo $friend->nickname; ?></span>
			                </div>
			                <ul class="navigation">
			                    <li class="active">
			                        <a data-toggle="tab" href="#friend-information-<?php echo $key;?>">
			                            <i class="fa fa-user"></i>
			                        </a>
			                    </li>
			                    <li>
			                        <a data-toggle="tab" href="#settings-<?php echo $key;?>">
			                            <i class="fa fa-cogs"></i>
			                        </a>
			                    </li>
			                    <li>
			                        <a data-toggle="tab" href="#email-friend-<?php echo $key;?>">
			                            <i class="fa fa-envelope"></i>
			                        </a>
			                    </li>
			                </ul>
			                <div id="friend-body-<?php echo $key;?>" class="user-body">
			                    <div class="tab-content">
			                        <div id="friend-information-<?php echo $key;?>" class="tab-pane active">
			                            <h4>General Information</h4>
			                            <ul id="friend-info-<?php echo $key;?>" class="user-information">
			                            	<li><b><i class="fa fa-envelope" aria-hidden="true"></i> Email:</b> <span id="friend-email-<?php echo $key;?>" class="friend-email"><?php echo $friend->email; ?></a></li>
			                            	<li><b><i class="fa fa-phone" aria-hidden="true"></i> Phone:</b> <span id="friend-phone-<?php echo $key;?>" class="friend-phone"><?php echo $friend->phone; ?></a></li>
			                            	<li><b><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</b> <span id="friend-address-<?php echo $key;?>" class="capitalize friend-address">2 Main St, Austin TX, 78705</a></li>
			                        	</ul>
			                        </div>
			                        <div id="settings-<?php echo $key;?>" class="tab-pane">
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
							                    		<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							                    		<input  name="nickname" placeholder="Nickname" class="form-control"  type="text" value="<?php echo $friend->nickname;?>">
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
			                        <div id="email-friend-<?php echo $key; ?>" class="tab-pane">
			                            <h4>Send Message</h4>
			                            <form>
			                            	<!-- Text area --> 
											<div class="form-group">
												<label class="col-md-2 control-label">Message</label>
												<div class="col-md-10 inputGroupContainer">
												  	<div class="input-group">
												    	<span class="input-group-addon txt"><i class="fa fa-envelope" aria-hidden="true"></i></span>
												    	<textarea class="form-control" name="comment" placeholder="Your Message" rows="4"></textarea>
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
			                        <div id="events" class="tab-pane">
			                            <h4>Events</h4>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
				

					
				    <?php 
				    if( ( ($key+1)%3==0 )&& ( ($key+1)<$friend_count) ) { ?>
				    	</div>
				    	<div class="row">
				    <?php }
			    } ?>    
			</div>
			</section>
		</div>
	</div>
</body>
<script type="text/javascript">
$.ajax({
  url: 'https://randomuser.me/api/?title=dr&nat=us&gender=male&results=<?php echo $friend_count;?>',
  dataType: 'json',
  success: function(data) {
  	var friends = data.results;
  	var friend;
  	$( ".friend-details" ).each(function( index ) {
	  	friend = friends[index];
	  	$(this).find(".friend-image").attr("src", friend.picture.large);
	    // $(this).find(".friend-name").html(friend.name.first + " " + friend.name.last);
	    // $(this).find(".friend-city").html(friend.location.city + ", "+friend.location.state);
	    $(this).find(".friend-address").html(friend.location.street + ", " + friend.location.city + ", TX " + friend.location.postcode);
	    // $(this).find(".friend-email").html(friend.email);
	    // $(this).find(".friend-phone").html(friend.cell);
	});
    
  }
});

</script>
</html>