<?php
	// GLOBAL DEFINES //
	include_once "shared/defines.php";
	////////////////////
	
	// GLOBAL CLASS LOADER //
	include_once "classes/account.php";
	/////////////////////////

	// Load ClassMaster
	include_once "shared/classMaster.php";
	
	$Account->sec_session_start();
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	
	if(isset($user) && isset($pass)) {
		$Account->LogIn($user, $pass);
	}
	
	header("Location: index.php");
?>