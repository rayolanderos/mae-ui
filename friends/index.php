<?php 
$page_id = 4; 
$friend_count = 6;

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<div class="row">
				<?php for ($i=0; $i<$friend_count ; $i++): ?>
					<div id="friend-details-<?php echo $i;?>" class="span4 user-details friend-details">
			            <div class="user-image">
			                <img id="friend-image-<?php echo $i;?>" src="<?php echo $GLOBALS['root_url']?>/img/placeholder_user.png" class="img-circle friend-image">
			            </div>
			            <div class="user-info-block">
			                <div class="user-heading">
			                    <h3 id="friend-name-<?php echo $i;?>" class="capitalize friend-name">Dr. John Smith</h3>
			                    <span id="friend-city-<?php echo $i;?>" class="help-block capitalize friend-city">Austin, TX</span>
			                </div>
			                <ul class="navigation">
			                    <li class="active">
			                        <a data-toggle="tab" href="#information-friend-<?php echo $i;?>">
			                            <i class="fa fa-user"></i>
			                        </a>
			                    </li>
			                    <li>
			                        <a data-toggle="tab" href="#settings-<?php echo $i;?>">
			                            <i class="fa fa-cogs"></i>
			                        </a>
			                    </li>
			                    <li>
			                        <a data-toggle="tab" href="#email-friend<?php echo $i;?>">
			                            <i class="fa fa-envelope"></i>
			                        </a>
			                    </li>
			                    <li>
			                        <a data-toggle="tab" href="#events-friend<?php echo $i;?>">
			                            <i class="fa fa-calendar"></i>
			                        </a>
			                    </li>
			                </ul>
			                <div id="friend-body-<?php echo $i;?>" class="user-body">
			                    <div class="tab-content">
			                        <div id="friend-information-<?php echo $i;?>" class="tab-pane active">
			                            <h4>General Information</h4>
			                            <ul id="friend-info-<?php echo $i;?>" class="user-information">
			                            	<li><b><i class="fa fa-envelope" aria-hidden="true"></i> Email:</b> <span id="friend-email-<?php echo $i;?>" class="friend-email">johnsmith@example.com</a></li>
			                            	<li><b><i class="fa fa-phone" aria-hidden="true"></i> Phone:</b> <span id="friend-phone-<?php echo $i;?>" class="friend-phone">512-792-5845</a></li>
			                            	<li><b><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</b> <span id="friend-address-<?php echo $i;?>" class="capitalize friend-address">2 Main St, Austin TX, 78705</a></li>
			                        	</u>
			                        </div>
			                        <div id="settings" class="tab-pane">
			                            <h4>Settings</h4>
			                        </div>
			                        <div id="email" class="tab-pane">
			                            <h4>Send Message</h4>
			                            <form>

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
			    if( ( ($i+1)%3==0 )&& ( ($i+1)<$friend_count) ): ?>
			    	</div>
			    	<div class="row">
			    <?php endif;
			    endfor; ?>    
			</div>
			</section>
		</div>
	</div>
</body>
<script type="text/javascript">
$.ajax({
  url: 'https://randomuser.me/api/?title=dr&nat=us&results=<?php echo $friend_count;?>',
  dataType: 'json',
  success: function(data) {
  	var friends = data.results;
  	var friend;
  	$( ".friend-details" ).each(function( index ) {
	  	friend = friends[index];
	  	$(this).find(".friend-image").attr("src", friend.picture.large);
	    $(this).find(".friend-name").html(friend.name.first + " " + friend.name.last);
	    $(this).find(".friend-city").html(friend.location.city + ", "+friend.location.state);
	    $(this).find(".friend-address").html(friend.location.street + ", " + friend.location.city + ", TX " + friend.location.postcode);
	    $(this).find(".friend-email").html(friend.email);
	    $(this).find(".friend-phone").html(friend.cell);
	});
    
  }
});

</script>
</html>