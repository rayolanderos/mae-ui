<?php 
$page_id = 0; 

require_once('inc/header.php');
require_once('inc/sidebar.php');
?>
	
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1> Dashboard</h1>
				</div>
				<div class="row-fluid">

					<div class="alert alert-info">
						<button class="close" data-dismiss="alert">x</button>
						<strong>Warning!</strong> You have not logged your baby's weight in over 10 days.
						<a href="<?php echo $GLOBALS['root_url'];?>/logs">
							<span class="label label-important">Log something now</span>	
						</a>
					</div>

				</div>
				<div class="row-fluid">
					<div class="span4 m-widget">
						<div class="m-widget-header">
							<h3>Recent Logs</h3>
						</div>
						<div class="m-widget-body">
							<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>#0001</td>
										<td><a href="<?php echo $GLOBALS['root_url'];?>/logs?log_id=0001">Monday, October 10th</a></td>
										<td class="tr">
											<a href="<?php echo $GLOBALS['root_url'];?>/logs?log_id=0001" class="btn btn-primary">View</a>
										</td>
									</tr>
									<tr>
										<td>#0002</td>
										<td><a href="<?php echo $GLOBALS['root_url'];?>/logs?log_id=0001">Sunday, October 9th</a></td>
										<td class="tr">
											<a href="<?php echo $GLOBALS['root_url'];?>/logs?log_id=0001" class="btn btn-primary">View</a>
										</td>
									</tr>
									<tr>
										<td>#0003</td>
										<td><a href="<?php echo $GLOBALS['root_url'];?>/logs?log_id=0001">Saturday, October 8th</a></td>
										<td class="tr">
											<a href="<?php echo $GLOBALS['root_url'];?>/logs?log_id=0001" class="btn btn-primary">View</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="span8 m-widget">
						<div class="m-widget-header">
							<h3>Today stats</h3>
						</div>

						<div class="m-widget-body">
							<div class="row-fluid">
								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val">11 lbs</span>
									Weight
								</a>

								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val">20.5"</span>
									Height
								</a>

								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val">5</span>
									Diapers
								</a href="#">

								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val">14</span>
									Sleep Hours
								</a href="#">			
							</div>
						</div>
					</div>
				</div>

				<div class="row-fluid m-fluid">
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3>Baby's Sleep Hours</h3>
						</div>
						<div class="m-widget-body">
							<div id="bar-chart">

							</div>
						</div>
					</div>
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3>Baby's Weight</h3>
						</div>
						<div class="m-widget-body">
							<!-- <div class="row-fluid">
								<div class="btn-group" data-toggle="buttons-radio">
									<button data="data1" class="btn btn-chart active">Daily</button>
									<button data="data2" class="btn btn-chart">Weekly</button>
									<button data="data3" class="btn btn-chart">Monthly</button>
								</div>
							</div> -->

							<div id="line-chart">
								
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
</html>