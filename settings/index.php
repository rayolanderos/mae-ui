<?php 
$page_id = 6; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<form id="form-settings" class="form-horizontal" method="post" action="#">

					<div class="form-group control-group">
						<label for="username" class="control-label">Your Name</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?php echo $GLOBALS['profile']['name'] ?>">
							</div>
						</div>
					</div>
						
					<div class="form-group control-group">
						<label for="email" class="control-label">Your Email</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon "><i class="fa fa-envelope-o fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?php echo $GLOBALS['profile']['email'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group control-group">
						<label for="username" class="control-label">Username</label>
						<div class="controls">
							<div class="input-group">
								<span class="input-group-addon"><i aria-hidden="true">@</i></span>
								<input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" value="<?php echo $GLOBALS['profile']['username'] ?>">
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
						<button type="button" class="btn btn-primary btn-lg btn-block save-button">Save</button>
					</div>
				</form>
			</section>
		</div>
	</div>
</body>
</html>