<?php 
require_once('functions.php'); 
$result = array();

if( !isset($_POST['logId']) ) { 
	echo json_encode($result = array("success" => false, "message" => "No log id provided."));
}
else{
	echo json_encode(delete_mae_api($_POST['logId'])); 
}