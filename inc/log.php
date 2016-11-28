<?php
require_once('config.php'); 
require_once('functions.php'); 
if (isset($_GET['id'])) : 
	$log = get_mae_api_single($_GET['id']);
?>
<div class="panel panel-default ">
  <div class="panel-heading">
  	<h3> <?php echo format_date($log->date); ?> </h3> 
  	<h4 > <?php echo ucfirst($log->type); ?> <i class="fa <?php echo get_journal_type_icon($log->type);?>" aria-hidden="true"></i> </h4>
  	<br/>
  </div>
  	
  <div class="panel-body">
    <div class="well">
    	<?php echo get_value_display_long($log->value, $log->type); ?>
    </div>
  </div>
</div>
<?php 
else: 
	echo 'No log was found'; 
endif; 
?>