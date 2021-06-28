<?php
	session_start();
	$username_session = $_SESSION["username_session"];
	if($username_session != ""){
		session_unset();
		session_destroy();
		header('Location: ../index.php');
	}
?>