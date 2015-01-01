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
	$pubKey = $_POST['pubkey'];
	$msg = $_POST['message'];
	
	
	if(isset($user) && isset($pass)) {
		if($Account->Register($user, $pass, $pubKey, $msg)) {
			$Account->Login($user, $pass);
		}
	}
	
	header("Location: index.php");
?>