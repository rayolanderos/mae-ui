<?php 
function needs_alert(){
	/*TO DO: setup alert call */
	return false;
}

function get_average($month, $type){
	$avgs = $GLOBALS['baby_avgs']; 
	$gender = $GLOBALS['profile']['baby_gender'];
	$value = $avgs[0][$type][$gender];
	switch ($month) {
		case 0:
			$value = $avgs[0][$type][$gender];
			break;
		case 1:
			$value = ( ( $avgs[0][$type][$gender]*2 )+$avgs[3][$type][$gender] ) / 3;
			break;
		case 2:
			$value = ( ( $avgs[3][$type][$gender]*2 )+$avgs[0][$type][$gender] ) / 3;
			break;
		case 3:
			$value = $avgs[3][$type][$gender];
			break;
		case 4:
			$value = ( ( $avgs[3][$type][$gender]*2 )+$avgs[6][$type][$gender] ) / 3;
			break;
		case 5:
			$value = ( ( $avgs[6][$type][$gender]*2 )+$avgs[5][$type][$gender] ) / 3;
			break;
		case 6:
			$value = $avgs[6][$type][$gender];
			break;
		case 7:
			$value = ( ( $avgs[6][$type][$gender]*2 )+$avgs[9][$type][$gender] ) / 3;
			break;
		case 8:
			$value = ( ( $avgs[9][$type][$gender]*2 )+$avgs[6][$type][$gender] ) / 3;
			break;
		case 9:
			$value = $avgs[9][$type][$gender];
			break;
		case 10:
			$value = ( ( $avgs[9][$type][$gender]*2 )+$avgs[12][$type][$gender] ) / 3;
			break;
		case 11:
			$value = ( ( $avgs[12][$type][$gender]*2 )+$avgs[9][$type][$gender] ) / 3;
			break;
		case 12:
			$value = $avgs[12][$type][$gender];
			break;
		
		default:
			$value = $avgs[0][$type][$gender];
			break;
	}
	return $value;
}

function get_daily_totals($type = ""){
	$logs = get_mae_api($type);
	$today = date("Y-m-d");
	$count = 0;
	foreach ($logs as $key => $log) {
		if($log->date == $today)
			$count++;
	}
	return $count;	
}

function get_todays_stat($type = ""){
	$logs = get_mae_api($type);
	$today = date("Y-m-d");
	$stat = "";
	foreach ($logs as $key => $log) {
		if($log->date == $today)
			$stat = $log->value;
	}
	if($stat == "")
		$stat = '<sup><i class="fa fa-clock-o" aria-hidden="true"></i></sup>'.get_latest_stat($type);
	return $stat;	
}

function get_mae_api_monthly($type=""){
	$logs = get_mae_api($type);
	$result = array();
	$previous_age = "";
	foreach ($logs as $key => $log) {
		if($key<1){
			$previous_age = $log->age;
			$result[$previous_age] = $log->value;
		}
		else{
			if(isset($result[$log->age])){
				$old_value = $result[$log->age];
				$new_value = $log->value;
				$result[$log->age] = ($old_value + $new_value) / 2;
			}
			else{
				$result[$log->age] = $log->value;
			}
		}
	}
	ksort($result);
	return $result;
}

function get_latest_stat($type = ""){
	$logs = get_mae_api($type);

	//var_dump($logs);
	return $logs[0]->value;
}

function get_mae_api_limit ($type = "", $limit){
	$logs = get_mae_api($type);
	return array_slice($logs, 0, $limit, true);
}

function get_mae_api_day_limit ($type = "", $limit){
	$logs = get_mae_api($type);
	$result = array();
	$previous_date = "";
	foreach ($logs as $key => $log) {
		if($key<1){
			$previous_date = $log->date;
			$result[$previous_date] = 1;
		}
		else{
			if(count($result)<=$limit){
				if($previous_date == $log->date){
					$result[$previous_date]++;
				}
				else{
					$result[$log->date] = 1;
				}
				$previous_date = $log->date;
			}
			else{
				return $result;
			}
		}
	}
	return $result;
}

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

function get_friends($type = ""){
	
	$userId = $GLOBALS['api']['userId']["POST"];
	$params = "?userId=".$userId;
	if($type != "")
		$params .= "&type=".$type;
	
	//return $params; 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://mae-be.herokuapp.com/friends".$params,
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

function post_friend($type, $name, $phone, $email){
	$userId = $GLOBALS['api']['userId']["POST"];

	$body_data = array('userId'=>$userId,
		'type' => $type,
		'name' => $name,
		'email' => $email,
		'phone' => $phone);
	$body = json_encode($body_data);
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  	CURLOPT_URL => "http://mae-be.herokuapp.com/friends",
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

function format_date_chart($date){
	/* Make pretty as: Monday, March 1st, 2016 */

	$date = date_create($date);
	return date_format($date, 'D M j');

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