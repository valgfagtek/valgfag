<?php
	// GLOBAL CLASS LOADER //
	include_once "classes/content.php";
	include_once "classes/db.php";
	include_once "classes/arrayProcess.php";
	include_once "classes/account.php";
	include_once "classes/CssLoader.php";
	/////////////////////////
	
	// SETTINGS LOADER //
	include_once "configs/dbConfig.php";
	
	# Open Classes
	$Content = new Content;
	$DB = new Database;
	$AP = new arrayProcess;
	$Account = new Account;
	$CSS = new Css;
	
	// INITIALIZE //
	$DB->Initialize($host, $username, $password, $selectdb);
?>