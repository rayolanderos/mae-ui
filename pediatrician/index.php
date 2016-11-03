<?php 
$page_id = 5; 

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
				<div class="span8 user-details">
		            <div class="user-image">
		                <img id="dr-image" src="<?php echo $GLOBALS['root_url']?>/img/placeholder_user.png" class="img-circle">
		            </div>
		            <div class="user-info-block">
		                <div class="user-heading">
		                    <h3 id="dr-name" class="capitalize">Dr. John Smith</h3>
		                    <span id="dr-city" class="help-block capitalize">Austin, TX</span>
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
		                    <li>
		                        <a data-toggle="tab" href="#events">
		                            <i class="fa fa-calendar"></i>
		                        </a>
		                    </li>
		                </ul>
		                <div class="user-body">
		                    <div class="tab-content">
		                        <div id="information" class="tab-pane active">
		                            <h4>General Information</h4>
		                            <ul id="dr-info" class="user-information">
		                            	<li><b><i class="fa fa-envelope" aria-hidden="true"></i> Email:</b> <span id="dr-email">johnsmith@example.com</a></li>
		                            	<li><b><i class="fa fa-phone" aria-hidden="true"></i> Phone:</b> <span id="dr-phone">512-792-5845</a></li>
		                            	<li><b><i class="fa fa-mobile-phone" aria-hidden="true"></i> Mobile:</b> <span id="dr-mobile">512-792-5845</a></li>
		                            	<li><b><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</b> <span id="dr-address" class="capitalize">2 Main St, Austin TX, 78705</a></li>
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
			</div>
			</section>
		</div>
	</div>
</body>
<script type="text/javascript">
$.ajax({
  url: 'https://randomuser.me/api/?title=dr&nat=us',
  dataType: 'json',
  success: function(data) {
  	var doctor = data.results[0];
    //console.log(data);
    $("#dr-image").attr("src", doctor.picture.large);
    $("#dr-name").html("Dr. " + doctor.name.first + " " + doctor.name.last);
    $("#dr-city").html(doctor.location.city + ", TX");
    $("#dr-address").html(doctor.location.street + ", " + doctor.location.city + ", TX " + doctor.location.postcode);
    $("#dr-email").html(doctor.email);
    $("#dr-mobile").html(doctor.cell);
  }
});

</script>
</html>