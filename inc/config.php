<?php 
$GLOBALS['root_url'] = "http://localhost/Sites/mae-theme";
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
)

?>