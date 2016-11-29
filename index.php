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
									<?php $logs = get_mae_api_limit("journal", 3); 
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
							<h3>Your Personality Report</h3>
						</div>
						<?php $personality = get_latest_health_stats(); ?>
						<div class="m-widget-body">
							<div class="row-fluid">
								<a href="javascript:void(0);" class="span3 m-stats-item" data-featherlight="./inc/personality.php?personality=agreeableness" data-featherlight-type="ajax">
									<span class="m-stats-val"><?php echo sprintf("%.2f%%", $personality->big5_agreeableness * 100);?></span>
									Agreeableness <i class="fa fa-question-circle" aria-hidden="true"></i>
								</a>
								<a href="javascript:void(0);" class="span3 m-stats-item" data-featherlight="./inc/personality.php?personality=conscientiousness" data-featherlight-type="ajax">
									<span class="m-stats-val"><?php echo sprintf("%.2f%%", $personality->big5_conscientiousness * 100);?></span>
									Conscientiousness <i class="fa fa-question-circle" aria-hidden="true"></i>
								</a>
								<a href="javascript:void(0);" class="span3 m-stats-item" data-featherlight="./inc/personality.php?personality=extraversion" data-featherlight-type="ajax">
									<span class="m-stats-val"><?php echo sprintf("%.2f%%", $personality->big5_extraversion * 100);?></span>
									Extraversion <i class="fa fa-question-circle" aria-hidden="true"></i>
								</a>
								<a href="javascript:void(0);" class="span3 m-stats-item" data-featherlight="./inc/personality.php?personality=openness" data-featherlight-type="ajax">
									<span class="m-stats-val"><?php echo sprintf("%.2f%%", $personality->big5_openness * 100);?></span>
									Openness <i class="fa fa-question-circle" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-subheader">
					<h2> Your Moods</h2>
				</div>
				<div class="row-fluid m-fluid">
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/anger.png"/> Anger <a href="#" data-featherlight="./inc/mood.php?mood=anger" data-featherlight-type="ajax"><sup><i class="fa fa-question-circle" aria-hidden="true"></i></sup></a></h3>
						</div>
						<div class="m-widget-body">
							<div id="chart-anger">

							</div>
						</div>
					</div>
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/vulnerability.png"/>Vulnerability <a href="#" data-featherlight="./inc/mood.php?mood=vulnerability" data-featherlight-type="ajax"><sup><i class="fa fa-question-circle" aria-hidden="true"></i></sup></a></h3>
						</div>
						<div class="m-widget-body">
							<div id="chart-vulnerability">

							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid m-fluid">
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/anxiety.png"/>Anxiety <a href="#" data-featherlight="./inc/mood.php?mood=anxiety" data-featherlight-type="ajax"><sup><i class="fa fa-question-circle" aria-hidden="true"></i></sup></a></h3>
						</div>
						<div class="m-widget-body">
							<div id="chart-anxiety">

							</div>
						</div>
					</div>
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/depression.png"/>Depression <a href="#" data-featherlight="./inc/mood.php?mood=depression" data-featherlight-type="ajax"><sup><i class="fa fa-question-circle" aria-hidden="true"></i></sup></a></h3>
						</div>
						<div class="m-widget-body">
							<div id="chart-depression">

							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid m-fluid">
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/self-consciousness.png"/>Self Consciousness <a href="" data-featherlight="./inc/mood.php?mood=self-consciousness" data-featherlight-type="ajax"><sup><i class="fa fa-question-circle" aria-hidden="true"></i></sup></a></h3>
						</div>
						<div class="m-widget-body">
							<div id="chart-self-consciousness">

							</div>
						</div>
					</div>
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/immoderation.png"/>Inmmoderation <a href="" data-featherlight="./inc/mood.php?mood=immoderation" data-featherlight-type="ajax"><sup><i class="fa fa-question-circle" aria-hidden="true"></i></sup></a></h3>
						</div>
						<div class="m-widget-body">
							<div id="chart-immoderation">

							</div>
						</div>
					</div>
					
				</div>
			</section>
		</div>
	</div>
</body>
</html>