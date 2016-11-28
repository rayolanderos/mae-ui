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
					<?php if ( needs_alert() ) : ?>
					<div class="alert alert-info">
						<button class="close" data-dismiss="alert">x</button>
						<strong>Warning!</strong> You have not logged your baby's weight in over 10 days.
						<a href="<?php echo $GLOBALS['root_url'];?>/logs">
							<span class="label label-important">Log something now</span>	
						</a>
					</div>
					<?php endif; ?>
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
									<?php $logs = get_mae_api_limit("journal", 5); 
									foreach ($logs as $key => $log) { ?>
										<tr>
											<td><?php echo str_pad($key, 4, '0', STR_PAD_LEFT); ?></td>
											<td><a href="<?php echo $GLOBALS['root_url'].'/logs?log_id='.$log->id;?>"><?php echo format_date($log->date);?></a></td>
											<td class="tr">
												<a href="<?php echo $GLOBALS['root_url'].'/logs?log_id='.$log->id;?>" class="btn btn-primary">View</a>
											</td>
										</tr>
									<?php } ?>
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
									<span class="m-stats-val"><?php echo get_todays_stat("weight");?> lbs</span>
									Weight
								</a>

								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val"><?php echo get_todays_stat("height");?>"</span>
									Height
								</a>

								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val"><?php echo get_daily_totals("diaper");?> </span>
									Diapers
								</a href="#">

								<a href="#" class="span3 m-stats-item">
									<span class="m-stats-val"><?php echo get_todays_stat("sleep");?></span>
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