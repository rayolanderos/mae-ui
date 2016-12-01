<?php 

function needs_alert(){
	$logs = get_mae_api($type="journal");
	$log = $logs[0];
	$treshold = strtotime("-10 days");
	
	$last = strtotime($log->date);

	if($last<=$treshold)
		return true; 
	else
		return false;
}

function trigger_alert(){
	$userId = $GLOBALS['api']['userId']["POST"];

	$body_data = array('userId'=>$userId);
	$body = json_encode($body_data);
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  	CURLOPT_URL => "http://mae-be.herokuapp.com/reminder",
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

function get_average($month, $type){
	$avgs = $GLOBALS['baby_avgs']; 
	$gender = $GLOBALS['profile']['baby_gender'];
	$value = $avgs[0][$type][$gender];
	switch ($month) {
		case 0:
			$value = $avgs[0][$type][$gender];
			break;
		case 1:
			$value = ( ( $avgs[0][$type][$gender] * 2 )+$avgs[3][$type][$gender] ) / 3;
			break;
		case 2:
			$value = ( ( $avgs[3][$type][$gender] * 2 )+$avgs[0][$type][$gender] ) / 3;
			break;
		case 3:
			$value = $avgs[3][$type][$gender];
			break;
		case 4:
			$value = ( ( $avgs[3][$type][$gender] * 2 )+$avgs[6][$type][$gender] ) / 3;
			break;
		case 5:
			$value = ( ( $avgs[6][$type][$gender] * 2 )+$avgs[5][$type][$gender] ) / 3;
			break;
		case 6:
			$value = $avgs[6][$type][$gender];
			break;
		case 7:
			$value = ( ( $avgs[6][$type][$gender] * 2 )+$avgs[9][$type][$gender] ) / 3;
			break;
		case 8:
			$value = ( ( $avgs[9][$type][$gender] * 2 )+$avgs[6][$type][$gender] ) / 3;
			break;
		case 9:
			$value = $avgs[9][$type][$gender];
			break;
		case 10:
			$value = ( ( $avgs[9][$type][$gender] * 2 )+$avgs[12][$type][$gender] ) / 3;
			break;
		case 11:
			$value = ( ( $avgs[12][$type][$gender] * 2 )+$avgs[9][$type][$gender] ) / 3;
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

function get_mae_api_single($id){
	
	//return $params; 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://mae-be.herokuapp.com/journals/".$id,
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
		$stat = '<sup><i class="fa fa-clock-o" aria-hidden="true"></i></sup> '.get_latest_stat($type);
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

function get_settings(){
	
	$userId = $GLOBALS['api']['userId']["POST"];
	$params = "?userId=".$userId;
	
	//return $params; 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://mae-be.herokuapp.com/settings".$params,
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


function get_health_report(){
	
	$userId = $GLOBALS['api']['userId']["POST"];
	$params = "?userId=".$userId;
	
	//return $params; 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://mae-be.herokuapp.com/report".$params,
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

function get_mood_report(){
	/* Moods:
	* anger
	* anxiety
	* depression
	* immoderation
	* self_consciousness
	* vulnerability
    */
	$report = get_health_report();
	$reversed = $report; //array_reverse($report);
	$mood_report = array();
	foreach ($reversed as $key => $entry) {
		$mood_report[] = array( 
			"date" => format_date($entry->date),
			"anger" => $entry->facet_anger, 
			"anxiety" => $entry->facet_anxiety, 
			"depression" => $entry->facet_depression, 
			"immoderation" => $entry->facet_immoderation, 
			"self_consciousness" => $entry->facet_self_consciousness, 
			"vulnerability" => $entry->facet_vulnerability
		);
	}

	return $mood_report;
}

function get_latest_health_stats(){
	/* Types:
	* agreeableness
	* conscientiousness
	* extraversion
	* openness
	*/
	$report = get_health_report();
	$report = array_reverse($report);
	$report = $report[0];

	return $report;
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

function post_friend($type, $name, $phone, $email, $nickname){
	$userId = $GLOBALS['api']['userId']["POST"];

	$body_data = array('userId'=>$userId,
		'type' => $type,
		'name' => $name,
		'email' => $email,
		'nickname' => $nickname,
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

function post_settings($fname, $lname, $phone, $email, $feedback, $provider, $childBirthDate, $gender){
	$userId = $GLOBALS['api']['userId']["POST"];

	$body_data = array('userId'=>$userId,
		'first' => $fname,
		'last' => $lname,
		'email' => $email,
		'phone' => $phone,
		'provider' => $provider, 
		'immediateFeedback' => (bool)$feedback ,
		'childBirthDate' => $childBirthDate ,
		'gender' => $gender );
	//var_dump($body_data);
	$body = json_encode($body_data);
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  	CURLOPT_URL => "http://mae-be.herokuapp.com/settings",
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

function get_value_display_long($value, $type){
	if($type == "journal")
		return $value; 
	else
		return get_value_display($value, $type);
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

function parse_gender($gender){
	if($gender == "male")
		return "boy";
	else
		return "girl";
}

function get_personality_name($personality){
	switch ($personality) {
		case 'agreeableness':
			return "Agreeableness";
			break;
		case 'conscientiousness':
			return "Conscientiousness";
			break;
		case 'extraversion':
			return "Extraversion";
			break;
		case 'openness':
			return "Openness";
			break;
		default:
			return "Unknown";
			break;
	}
	return "Unknown";
}

function get_personality_meaning($personality){
	switch ($personality) {
		case 'agreeableness':
			return "is a person's tendency to be compassionate and cooperative toward others";
			break;
		case 'conscientiousness':
			return "is a person's tendency to act in an organized or thoughtful way.";
			break;
		case 'extraversion':
			return "is a person's tendency to seek stimulation in the company of others.";
			break;
		case 'openness':
			return "is the extent to which a person is open to experiencing a variety of activities.";
			break;
		default:
			return "Unknown";
			break;
	}
	return "Unknown";
}

function get_personality_descriptors($personality, $level){
	switch ($personality) {
		case 'agreeableness':
			if($level == "low"){
				return array(
					"Self-focused" => "You are more concerned with taking care of yourself than taking time for others.",
					"Contrary" => 	"You do not shy away from contradicting others.",
					"Proud" =>	"You hold yourself in high regard and are satisfied with who you are.",
					"Compromising" =>	"You are comfortable using every trick in the book to get what you want.", 
					"Hard-hearted" =>	"You think people should generally rely more on themselves than on others.",
					"Cautious of others" =>	"You are wary of other people's intentions and do not trust easily."
				);
			}
			else{
				return array(
					"Altruistic" =>	"You feel fulfilled when helping others and will go out of your way to do so.",
					"Accommodating" =>	"You are easy to please and try to avoid confrontation.",
					"Modest" =>	"You are uncomfortable being the center of attention.",
					"Uncompromising" =>	"You think it is wrong to take advantage of others to get ahead.",
					"Empathetic" =>	"You feel what others feel and are compassionate toward them.",
					"Trusting of others" =>	"You believe the best of others and trust people easily."
				);
			}
			break;
		case 'conscientiousness':
			if($level == "low"){
				return array(
					"Content" => "You are content with your level of accomplishment and do not feel the need to set ambitious goals.",
					"Bold" => "You would rather take action immediately than spend time deliberating making a decision.",
					"Carefree" => "You do what you want, disregarding rules and obligations.",
					"Unstructured" => "You do not make a lot of time for organization in your daily life.",
					"Intermittent" => "You have a hard time sticking with difficult tasks for a long period of time.",
					"Self-doubting" => "You frequently doubt your ability to achieve your goals."
				);
			}
			else{
				return array(
					"Driven" => "You set high goals for yourself and work hard to achieve them.",
					"Deliberate" => "You carefully think through decisions before making them.",
					"Dutiful" => "You take rules and obligations seriously, even when they are inconvenient.",
					"Organized" => "You feel a strong need for structure in your life.",
					"Persistent" => "You can tackle and stick with tough tasks.",
					"Self-assured" => "You feel you have the ability to succeed in the tasks you set out to do."
				);
			}
			break;
		case 'extraversion':
			if($level == "low"){
				return array(
					"Laid-back" => "You appreciate a relaxed pace in life.",
					"Demure" => "You prefer to listen than to talk, especially in group settings.",
					"Solemn" => "You are generally serious and do not joke much.",
					"Calm-seeking" => "You prefer activities that are quiet, calm, and safe.",
					"Reserved" => "You are a private person and do not let many people in.",
					"Independent" => "You have a strong desire to have time to yourself."
				);
			}
			else{
				return array(
					"Energetic" => "You enjoy a fast-paced, busy schedule with many activities.",
					"Assertive" => "You tend to speak up and take charge of situations, and you are comfortable leading groups.",
					"Cheerful" => "You are a joyful person and share that joy with the world.",
					"Excitement-seeking" => "You are excited by taking risks and feel bored without lots of action going on.",
					"Outgoing" => "You make friends easily and feel comfortable around other people.",
					"Sociable" => "You enjoy being in the company of others."
				);
			}
			break;
		case 'openness':
			if($level == "low"){
				return array(
					"Consistent" => "You enjoy familiar routines and prefer not to deviate from them.",
					"Unconcerned with art" => "You are less concerned with artistic or creative activities than most people.",
					"Dispassionate" => "You do not frequently think about or openly express your emotions.",
					"Down-to-earth" => "You prefer facts over fantasy.",
					"Concrete" => "You prefer dealing with the world as it is, rarely considering abstract ideas.",
					"Respectful of authority" => "You prefer following with tradition to maintain a sense of stability."
				);
			}
			else{
				return array(
					"Adventurous" => "You are eager to experience new things.",
					"Appreciative of art" => "You enjoy beauty and seek out creative experiences.",
					"Emotionally aware" => "You are aware of your feelings and how to express them.",
					"Imaginative" => "You have a wild imagination.",
					"Philosophical" => "You are open to and intrigued by new ideas and love to explore them.",
					"Authority-challenging" => "You prefer to challenge authority and traditional values to help bring about change."
				);
			}
			break;
		default:
			return "Unknown";
			break;
	}
	return "Unknown";
}

function get_mood_name($mood){
	switch ($mood) {
		case 'anger':
			return "Anger";
			break;
		case 'anxiety':
			return "Anxiety";
			break;
		case 'immoderation':
			return "Immoderation";
			break;
		case 'depression':
			return "Depression";
			break;
		case 'self-consciousness':
			return "Self Consciousness";
			break;
		case 'vulnerability':
			return "Vulnerability";
			break;
		default:
			return "Unknown";
			break;
	}
	return "Unknown";
}


function get_mood_facet($mood, $level){
	switch ($mood) {
		case 'anger':
			if($level == "low")
				return "Mild-tempered";
			else
				return "Fiery";
			break;
		case 'anxiety':
			if($level == "low")
				return "Self-assured";
			else
				return "Prone to worry";
			break;
		case 'immoderation':
			if($level == "low")
				return "Self-controlled";
			else
				return "Hedonistic";
			break;
		case 'depression':
			if($level == "low")
				return "Content";
			else
				return "Melancholy";
			break;
		case 'self-consciousness':
			if($level == "low")
				return "Confident";
			else
				return "Self-conscious";
			break;
		case 'vulnerability':
			if($level == "low")
				return "Calm under pressure";
			else
				return "Susceptible to stress";
			break;
		default:
			return "Unknown";
			break;
	}
	return "Unknown";
}

function get_mood_descriptor($mood, $level){
	switch ($mood) {
		case 'anger':
			if($level == "low")
				return "It takes a lot to get you angry.";
			else
				return "You have a fiery temper, especially when things do not go your way.";
			break;
		case 'anxiety':
			if($level == "low")
				return "You tend to feel calm and self-assured.";
			else
				return "You tend to worry about things that might happen.";
			break;
		case 'immoderation':
			if($level == "low")
				return "You have control over your desires, which are not particularly intense.";
			else
				return "You feel your desires strongly and are easily tempted by them.";
			break;
		case 'depression':
			if($level == "low")
				return "You are generally comfortable with yourself as you are.";
			else
				return "You think quite often about the things you are unhappy about.";
			break;
		case 'self-consciousness':
			if($level == "low")
				return "You are hard to embarrass and are self-confident most of the time.";
			else
				return "You are sensitive about what others might be thinking of you.";
			break;
		case 'vulnerability':
			if($level == "low")
				return "You handle unexpected events calmly and effectively.";
			else
				return "You are easily overwhelmed in stressful situations.";
			break;
		default:
			return "Unknown";
			break;
	}
	return "Unknown";
}


?>