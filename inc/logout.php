<?php 
 session_start();

    // Deleting all content in $_SESSION
    $_SESSION = array();

// Destroying the session
session_destroy();

if(!isset($_SESSION['con'])):
	echo "you've been logged out!";
endif;

?>