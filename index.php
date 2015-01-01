<?php
	$DEV_MODE = 1;
	
	////////// DEV MODE //////////
	if($DEV_MODE){
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
	}
	//////////////////////////////
	
	// GLOBAL DEFINES //
	include_once "shared/defines.php";
	////////////////////
	
	// GLOBAL CLASS LOADER //
	include_once "classes/content.php";
	include_once "classes/db.php";
	include_once "classes/arrayProcess.php";
	include_once "classes/account.php";
	include_once "classes/CssLoader.php";
	/////////////////////////

	// Load ClassMaster
	include_once "shared/classMaster.php";
	
	$Account->sec_session_start();
	
	if($Account->Login_Check()){
		include_once("inbox.php");
	} else {
		include_once("loginregister.php");
	}
?>