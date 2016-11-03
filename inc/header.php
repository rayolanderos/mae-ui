<?php 

require_once('config.php'); ?>

<!doctype html>
<html>
<head>
	<title>M&auml;e - <?php echo $GLOBALS['pages'][$page_id]['title'];?></title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/font-awesome.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,300i,400,400i,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/<?php echo $GLOBALS['profile']['baby_gender'] ?>.css" />
	
	<script type='text/javascript' src='https://www.google.com/jsapi'></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/bootstrap.min.js"></script>
	<?php if($page_id==0): ?>
		<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/chart.js"></script>
	<?php elseif ($page_id == 1): ?>
		<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/stats.js"></script>
	<?php endif;?>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>
<body>
	<div class="navbar navbar-fixed-top m-header">
		<div class="navbar-inner m-inner">
			<div class="container-fluid">
				<a class="brand m-brand" href="<?php echo $GLOBALS['root_url'];?>">M&auml;e</a>
				
	            <form class="form-search m-search span5">
					<input type="text" placeholder="Type to search" class="span5 search-query">
				</form>

				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        </button>
		        
				<div class="nav-collapse collapse">

					<div class="btn-group pull-right">
				        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			          		<i class="icon-user"></i> <?php echo $GLOBALS['profile']['name'] ?>
			          		<span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu">
			          		<li><a href="#"><i class="icon-user"></i>Profile</a></li>
			          		<li><a href="#"><i class="icon-cog"></i>Settings</a></li>
	 		 				<li class="divider"></li>
			          		<li><a href="login.html"><i class="icon-off"></i>Logout</a></li>
				        </ul>
			      	</div>
	          	</div>
			</div>
		</div>
	</div>
	<div class="m-top"></div>
<?php ?>