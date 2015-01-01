<?php
    $receipent = $_POST['receipent'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if(!isset($receipent,$subject,$message)){header("Location: index.php"); return false;}
    
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

	//LOGIN CHECK 1	
	if(!$Account->Login_Check()){
	    echo "error 1";
		header("Location: index.php");
	}
	
	$tDate = date("d.m.Y");
	
	$Account->sendMessage("Anonymous User", $subject, $message, $receipent, $tDate);
	
	header("Location: index.php");
?>