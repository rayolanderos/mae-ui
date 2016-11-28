<?php 
$page_id = 1; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');

?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<div class="row-fluid">
					<div class="span12 m-widget">
						<div class="m-widget-header">
							<h3>How is the baby doing today?</h3>
						</div>

						<div class="m-widget-body">
							<div class="row-fluid">
								<a href="#" class="span2 m-stats-item">
									<span class="m-stats-val"><?php echo get_daily_totals("diaper");?></span>
									Diapers
								</a>
								<a href="#" class="span2 m-stats-item">
									<span class="m-stats-val"><?php echo get_todays_stat("weight");?> lbs</span>
									Weight
								</a>
								<a href="#" class="span2 m-stats-item">
									<span class="m-stats-val"><?php echo get_todays_stat("height");?>"</span>
									Height
								</a>

								<a href="#" class="span2 m-stats-item">
									<span class="m-stats-val"><?php echo get_todays_stat("sleep");?></span>
									Sleep Hours
								</a href="#">	
								<a href="#" class="span2 m-stats-item">
									<span class="m-stats-val"><?php echo get_daily_totals("journal");?></span>
									Journals
								</a>	
								<a href="#" class="span2 m-stats-item">
									<span class="m-stats-val"><?php echo get_daily_totals();?> entries</span>
									Total
								</a>	
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
							<h3>Baby's Weight compared</h3>
						</div>
						<div class="m-widget-body">
							<div id="line-chart">
								
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid m-fluid">
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3>Baby's Daily Diapers</h3>
						</div>
						<div class="m-widget-body">
							<div id="diapers-chart">

							</div>
						</div>
					</div>
					<div class="span6 m-widget">
						<div class="m-widget-header">
							<h3>Baby's Height compared</h3>
						</div>
						<div class="m-widget-body">
							<div id="height-chart">
								
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

	</div>
</body>
</html>