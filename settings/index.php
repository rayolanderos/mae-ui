<?php 
$page_id = 6; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');

$settings = get_settings();

?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<form id="form-settings" class="form-horizontal" method="post" action="">

					<div class="form-group control-group">
						<label for="username" class="control-label">First Name</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="fname" id="name" placeholder="Enter your First Name" value="<?php echo $settings->first ?>">
							</div>
						</div>
					</div>
					<div class="form-group control-group">
						<label for="username" class="control-label">Last Name</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="lname" id="name" placeholder="Enter your Last Name" value="<?php echo $settings->last ?>">
							</div>
						</div>
					</div>
						
					<div class="form-group control-group">
						<label for="email" class="control-label">Your Email</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon "><i class="" aria-hidden="true">@</i></span>
								<input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?php echo $settings->email ?>">
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="username" class="control-label">Phone</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo $settings->phone ?>">
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="username" class="control-label">Provider</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-signal" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="provider" id="provider" placeholder="Enter your phone provider" value="<?php echo $settings->provider ?>">
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="username" class="control-label">Baby's Birthdate</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="childBirthDate" id="childBirthDate" placeholder="Enter your baby's birthdate" value="<?php echo $settings->childBirthDate ?>">
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="username" class="control-label">Baby's Gender</label>
						<div class="controls">
							<div class="input-group">
								<?php if ($settings->gender == "male") : ?>
									<span class="input-group-addon input-addon-special"><i class="fa fa-mars" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="male" checked name="gender"><span class="input-panel-text"> Boy </span></div>
									<span class="input-group-addon input-addon-special"><i class="fa fa-venus" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="female" name="gender"> <span class="input-panel-text">Girl </span></div>
								<?php else: ?>
									<span class="input-group-addon input-addon-special"><i class="fa fa-mars" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="male" name="gender"><span class="input-panel-text"> Boy </span></div>
									<span class="input-group-addon input-addon-special"><i class="fa fa-venus" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="female" checked name="gender"> <span class="input-panel-text">Girl </span> </div>
								<?php endif; ?>
								
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="username" class="control-label">Receive Immediate Feedback</label>
						<div class="controls">
							<div class="input-group">
								<?php if ($settings->immediateFeedback) : ?>
									<span class="input-group-addon input-addon-special"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="true" checked name="feedback"> <span class="input-panel-text">Yes </span></div>
									<span class="input-group-addon input-addon-special"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="false"  name="feedback"><span class="input-panel-text"> No </span> </div>
								<?php else: ?>
									<span class="input-group-addon input-addon-special"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="true"  name="feedback"> <span class="input-panel-text">Yes </span> </div>
									<span class="input-group-addon input-addon-special"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span><div class="input-panel">	<input type="radio" value="false" checked name="feedback"> <span class="input-panel-text">No</span> </div>
								<?php endif; ?>
								
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="password" class="control-label">Password</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" value="<?php echo $GLOBALS['profile']['password'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="confirm" class="control-label">Confirm Password</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm your Password">
							</div>
						</div>
					</div>

					<div class="form-group">
		                <label class="col-md-8 control-label"></label>
		                <div class="col-md-12">
		                	<br>
		                  	<button type="submit" class="btn btn-success btn-lg pull-right" >Save <i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
		                	<div class="clear"></div>
		                </div>
		            </div>
				</form>
			</section>
		</div>
	</div>
</body>
</html>