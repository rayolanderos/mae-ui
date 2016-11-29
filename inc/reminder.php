<?php 

require_once('config.php'); 
require_once('functions.php'); 

if(needs_alert()){
	$response = trigger_alert();
	echo $response;
}

?>