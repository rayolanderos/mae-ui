<?php 
error_reporting(E_ALL);
date_default_timezone_set ("America/Mexico_City");
$GLOBALS['root_url'] = "http://maejournal.com/demo";
$GLOBALS['profile'] = array(
	"username" => "janedoe1",
	"name" => "Jane Doe",
	"email" => "janedoe1@gmail.com", 
	"password" => "password", 
	"age" => "35",
	"baby_birthdate" => "10/10/2016",
	"baby_name" => "John Doe", 
	"baby_gender" => "boy"
);
$GLOBALS['api'] = array(
	"url" =>"http://mae-be.herokuapp.com/journals", 
	"userId" => array(
		"GET" => "tester",
		"POST" => "amzn1.ask.account.AGHEHF4DTFSJQONSB2TECXGN4JB3RXUVTXYTBJQ5QV3MOLQYZ3Z6X33SGEXR4VP7VXONLPPIDK2GWBIAHG7DBYUFCPW5NWWZA52TGO3JXXLONE63AMI6ZLB66WRMYKA3RG7GIYR4A42VRFC7ENHSVWX2BHD5EYHOIC3ULK76VSXGHHVIVGTDLRO664JIE7PLIWVXTH44XSZ3AXA"
	)
);

$GLOBALS['pages'] = array(
	array(
		"id" => 0,
		"title" => "Home", 
		"slug" => "home", 
		"url" => $GLOBALS['root_url'], 
		"icon" => "fa-home", 
		"active" => true
	),
	array(
		"id" => 1,
		"title" => "Baby Stats", 
		"slug" => "stats",
		"url" => $GLOBALS['root_url']."/stats",
		"icon" => "fa-heartbeat", 
		"active" => true
	),
	array(
		"id" => 2,
		"title" => "My Logs", 
		"slug" => "logs",
		"url" => $GLOBALS['root_url']."/logs",
		"icon" => "fa-clipboard", 
		"active" => true
	),
	array(
		"id" => 3,
		"title" => "Media", 
		"slug" => "media",
		"url" => $GLOBALS['root_url']."/media",
		"icon" => "fa-camera", 
		"active" => false
	),
	array(
		"id" => 4,
		"title" => "My Friends", 
		"slug" => "friends",
		"url" => $GLOBALS['root_url']."/friends",
		"icon" => "fa-users", 
		"active" => true
	),
	array(
		"id" => 5,
		"title" => "My Pediatrician", 
		"slug" => "pediatrician",
		"url" => $GLOBALS['root_url']."/pediatrician",
		"icon" => "fa-stethoscope", 
		"active" => true
	),
	array(
		"id" => 6,
		"title" => "My Settings", 
		"slug" => "settings",
		"url" => $GLOBALS['root_url']."/settings",
		"icon" => "fa-gears", 
		"active" => true
	)
); 
// Birth		Weight	6.7  - 8.1 pounds	6.5  - 7.8 pounds
//  			Length	19.1 - 20.1 inches	18.9 - 19.8 inches
// 3 months		Weight	13.0 - 15.2 pounds	11.8 - 14.0 pounds
//  			Length	23.6 - 24.7 inches	23.0 - 24.1 inches
// 6 months		Weight	16.2 - 18.8 pounds	14.8 - 17.5 pounds
//  			Length	26.1 - 27.2 inches	25.3 - 26.5 inches
// 9 months		Weight	18.2 - 21.1 pounds	16.7 - 19.7 pounds
//  			Length	27.7 - 28.9 inches	27.0 - 28.3 inches
// 12 months	Weight	19.8 - 22.9 pounds	18.2 - 21.4 pounds
//  			Length	29.2 - 30.5 inches	28.5 - 29.8 inches

$GLOBALS['baby_avgs'] = array(
	0 => array(
		"weight" => array( 
			"boy" => 7.4, 
			"girl" => 7.15
		), 
		"length" => array( 
			"boy" => 19.6, 
			"girl" => 19.4
		)
	), 
	3 => array(
		"weight" => array( 
			"boy" => (13.0 + 15.2)/2, 
			"girl" => (11.8 + 14.0)/2
		), 
		"length" => array( 
			"boy" => (23.6 + 24.7)/2, 
			"girl" => (23.0 + 24.1)/2
		)
	), 
	6 => array(
		"weight" => array( 
			"boy" => (16.2 + 18.8)/2, 
			"girl" => (14.8 + 17.5)/2
		), 
		"length" => array( 
			"boy" => (26.1 + 27.2)/2, 
			"girl" => (25.3 + 26.5)/2
		)
	), 
	9 => array(
		"weight" => array( 
			"boy" => (18.2 + 21.1)/2, 
			"girl" => (16.7 + 19.7)/2
		), 
		"length" => array( 
			"boy" => (27.7 + 28.9)/2, 
			"girl" => (27.0 + 28.3)/2
		)
	), 
	12 => array(
		"weight" => array( 
			"boy" => (19.8 + 22.9)/2, 
			"girl" => (8.2 + 21.4)/2
		), 
		"length" => array( 
			"boy" => (29.2 + 30.5)/2, 
			"girl" => (28.5 + 29.8)/2
		)
	), 
); 



?>