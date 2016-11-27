<?php 

function get_mae_api($type = ""){
	
	$userId = $GLOBALS['api']['userId']["POST"];
	$params = "?userId=".$userId;
	if($type != "")
		$params .= "&type=".$type;
	
	//return $params; 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://mae-be.herokuapp.com/journals".$params,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET"
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$error = array("error" => true, "details" => $err);
		return $error;
	} else {
		$decoded = json_decode($response);
	 	return $decoded;
	}
	
}

function post_mae_api($type, $content){
	$userId = $GLOBALS['api']['userId']["POST"];

	$body_data = array('userId'=>$userId,
		'type' => $type,
		'value' => $content,
		'advice' => false,
		'source' => 'ui');
	$body = json_encode($body_data);
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  	CURLOPT_URL => "http://mae-be.herokuapp.com/journals",
	  	CURLOPT_RETURNTRANSFER => true,
	  	CURLOPT_ENCODING => "",
	  	CURLOPT_MAXREDIRS => 10,
	  	CURLOPT_TIMEOUT => 30,
	  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  	CURLOPT_HTTPHEADER => array('Content-Type: application/json'), 
	  	CURLOPT_POST => 1, 
		CURLOPT_POSTFIELDS => $body, 
		CURLOPT_RETURNTRANSFER => true, 
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$error = array("success" => false, "details" => $err);
		return $error;
	} else {
		$response = array("success" => true, "details" => $response);
	 	return $response;
	}
}

function delete_mae_api($logId){

    $url = "http://mae-be.herokuapp.com/journals/".$logId;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$error = array("success" => false, "details" => $err);
		return $error;
	} else {
		$response = array("success" => true, "details" => $response);
	 	return $response;
	}
}

function get_journal_type_icon($type){
	$icon = "";
	switch ($type) {
		case 'weight':
			$icon = "fa-balance-scale";
			break;
		case 'height':
			$icon = "fa-child";
			break;
		case 'bath':
			$icon = "fa-bath";
			break;
		case 'diaper':
			$icon = "fa-tint";
			break;
		case 'feeding':
			$icon = "fa-spoon";
		case 'sleep':
			$icon = "fa-bed";
			break;
		case 'journal':
			$icon = "fa-sticky-note-o";
			break;
		case 'ui':
			$icon = "fa-pencil";
			break;
		case 'alexa':
			$icon = "fa-volume-up";
			break;
		default:
			$icon = "fa-question";
			break;
	}
	return $icon;
}

function format_date($date){
	/* Make pretty as: Monday, March 1st, 2016 */

	$date = date_create($date);
	return date_format($date, 'l, F jS, Y');

}

function get_value_display($value, $type){
	$display = $value;
	switch($type){
		case 'weight':
			$display = "Baby's weight: <b>".$value." lbs</b>";
			break;
		case 'height':
			$display = "Baby's height: <b>".$value."'"."'</b>";
			break;
		case 'bath':
			$display = $value." minutes of bath time.";
			break;
		case 'diaper':
			$display = "Changed a <b>".$value." diaper</b>";
			break;
		case 'feeding':
			$display = $value;
		case 'sleep':
			$display = "Baby slept for ".$value." hours";;
			break;
		case 'journal':
			$display = get_excerpt($value);
			break;
		default:
			$display = get_excerpt($value);
			break;
	}
	return $display;
}

function get_excerpt($string){
	if(strlen($string) > 60)
		$string = substr($string,0, 57)."...";
	return $string;
}


?>