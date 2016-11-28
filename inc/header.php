<?php 
session_start(); 
require_once('config.php'); 
require_once('functions.php'); 
if($page_id == 6){
	if(isset($_REQUEST['fname']) ) {
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
		$feedback = $_REQUEST['feedback'];
		$provider = $_REQUEST['provider'];
		$childBirthDate =  $_REQUEST['childBirthDate'];
		$gender = $_REQUEST['gender'];
		
		if($fname != ""){
			$result = post_settings($fname, $lname, $phone, $email, $feedback, $provider, $childBirthDate, $gender);
			$log_saved = $result['success'];
			if($log_saved)
				header("Refresh:0");
		}

	}
}

$settings = get_settings();
$GLOBALS['profile']["username"] = "janedoe1";
$GLOBALS['profile']["name"] = $settings->first." ".$settings->last ;
$GLOBALS['profile']["email"] = $settings->email;
$GLOBALS['profile']["baby_birthdate"] = $settings->childBirthDate;
$GLOBALS['profile']["baby_gender"] = parse_gender($settings->gender);

$gender = $GLOBALS['profile']['baby_gender'];
?>
<!doctype html>
<html>
<head>
	<title>M&auml;e - <?php echo $GLOBALS['pages'][$page_id]['title'];?></title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/featherlight.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/font-awesome.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,300i,400,400i,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['root_url'];?>/css/<?php echo $gender; ?>.css" />

	<script type='text/javascript' src='https://www.google.com/jsapi'></script>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $GLOBALS['root_url'];?>/js/featherlight.js"></script>
	<?php if($page_id == 0 || $page_id ==1 ): 
	$logsSleep = get_mae_api_limit("sleep", 10);
	$logsDiapers = get_mae_api_day_limit("diaper", 10);
	$logsHeight = get_mae_api_monthly("height");
	$logsWeight = get_mae_api_monthly("weight");
	?>
	<script type="text/javascript">
		<?php if (  $gender == "girl" ): ?>
			var isGirl = true;
		<?php else : ?>
			var isGirl = false;
		<?php endif; ?>
		<?php 
		$avgs = $GLOBALS['baby_avgs']; ?>
		google.load('visualization', '1', {'packages': ['corechart']});

		google.setOnLoadCallback(drawChart);

		var style = 'stroke-color: #006E8E; stroke-opacity: 0.7; stroke-width: 4; fill-color: #8ED5CC; fill-opacity: 0.2';
		if(isGirl){
	    	style = 'stroke-color: #E53B60; stroke-opacity: 0.7; stroke-width: 4; fill-color: #F4CAC0; fill-opacity: 0.2';
	    }
		var dataWeight = [
			['Months', 'Your Baby', 'Average Baby'],
			<?php foreach ($logsWeight as $key => $logsWeight) { 
				echo "['".$key."', ".$logsWeight.", ".get_average($key, "weight")."],"."\n";
			} ?>
		];
		var dataHeight = [
			['Months', 'Your Baby', 'Average Baby'],
			<?php foreach ($logsHeight as $key => $logHeight) { 
				echo "['".$key."', ".$logHeight.", ".get_average($key, "height")."],"."\n";
			} ?>
		];
		var dataSleep = [
	      	['Day', 'Hours', { role: 'style' }],
	      	<?php foreach ($logsSleep as $key => $logSleep) { ?>
		      	['<?php echo format_date_chart($logSleep->date);?>', <?php echo $logSleep->value;?>, style],
		    <?php } ?>
	    ];
	    var dataDiapers = [
	      	['Day', 'Diapers', { role: 'style' }],
	      	<?php foreach ($logsDiapers as $key => $logDiaper) { ?>
		      	['<?php echo format_date_chart($key);?>', <?php echo $logDiaper;?>, style],
		    <?php } ?>
	    ];

	    $( window ).resize(function() {
		  	drawChart();
		});
		function drawChart() {

			drawLineChart();
			drawBarChart();

		}

		function drawLineChart(chartType) {


			var options = {
			  	colors:['#4A82B6','#B8C94F'], 
			  	chartArea: {width: '85%', height: '70%'},
				legend: {position: 'in'},
			   	vAxis: {
			   		textStyle: {fontName: 'Source Sans Pro'},
		          	title: 'Lbs',
		          	logScale: true
		        },
		        hAxis: {
		          	title: 'Months',
		          	logScale: false
		        }
			};
			var options2 = {
			  	colors:['#4A82B6','#B8C94F'], 
			  	chartArea: {width: '85%', height: '70%'},
				legend: {position: 'in'},
			   	vAxis: {
		          	title: 'Inches',
		          	logScale: true
		        },
		        hAxis: {
		          	title: 'Months',
		          	logScale: false
		        }
			};
			if(isGirl){
				options = {
				  	colors:['#00574F','#B8C94F'], 
				  	chartArea: {width: '85%', height: '70%'},
					legend: {position: 'in'},
				   	vAxis: {
			          	title: 'Lbs',
			          	logScale: true
			        },
			        hAxis: {
			          	title: 'Months',
			          	logScale: false
			        } 
				};
				options2 = {
				  	colors:['#00574F','#B8C94F'], 
				  	chartArea: {width: '85%', height: '70%'},
					legend: {position: 'in'},
				   	vAxis: {
			          	title: 'Inches',
			          	logScale: true
			        },
			        hAxis: {
			          	title: 'Months',
			          	logScale: false
			        } 
				};	
			}

			if(google) {
				var chart = new google.visualization.LineChart(document.getElementById('line-chart'));
				chartData1 = google.visualization.arrayToDataTable(dataWeight);
				chart.draw(chartData1, options);
				
				<?php if($page_id == 1 ): ?>
					var chart2 = new google.visualization.LineChart(document.getElementById('height-chart'));
					chartData2 = google.visualization.arrayToDataTable(dataHeight);
					chart2.draw(chartData2, options2);
				<?php endif; ?>
			}
		}

		function drawBarChart(chartType) {
			
			var options = { 
			  	legend: { position: "none" }
			};
			

			

			if(google) {
				var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
			
				dataSleep = google.visualization.arrayToDataTable(dataSleep);
				
				chart.draw(dataSleep, options);
				<?php if($page_id == 1 ): ?>
					var chart2 = new google.visualization.BarChart(document.getElementById('diapers-chart'));
					dataDiapers = google.visualization.arrayToDataTable(dataDiapers);
					chart2.draw(dataDiapers, options);
				<?php endif; ?>
			}
		}

		
		
	</script>
		
	<?php endif;?>

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>
<body>

	<?php 

	if( ( (strtolower($_SERVER['REQUEST_METHOD']) == 'post') && isset($_POST['password']) && ($_POST['password']==$GLOBALS['profile']['password']) ) || ( isset($_SESSION['con']) ) ): 
	//if( ( (strtolower($_SERVER['REQUEST_METHOD']) == 'post') && isset($_POST['password']) && ($_POST['password']==$GLOBALS['profile']['password']) ) ): 
		$_SESSION['con'] = true; 
	?>
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
<?php else: ?> 

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4 ">
				<div class="container-fluid m-login-container">
					<div class="page-header">
						<h2>M&auml;e <small>Login</small></h2>
					</div>

					<form class="form-horizontal" action=" " method="post">
						<input type="text" placeholder="Enter username or email" class="span12" id="input01" name="uname">
						<label></label>
						<input type="password" placeholder="Enter password" class="span12" id="input01" name="password">

			            <button type="submit" style="margin-top: 15px" class="btn btn-primary">	Login</button>
						
					</form>
				</div>			
			</div>
			<div class="span4"></div>
		</div>
	</div>

	</body>
</html>
<?php 
die();
endif; ?>




