<?php
	////////// DEV MODE //////////
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	//////////////////////////////
	
	// GLOBAL DEFINES //
	include_once "shared/defines.php";
	////////////////////
	
	// GLOBAL CLASS LOADER //
	include_once "classes/account.php";
	/////////////////////////

	// Load ClassMaster
	include_once "shared/classMaster.php";
	
	$Account->sec_session_start();
	
	$Account->LogOut();
	
	header("Location: index.php");
?>