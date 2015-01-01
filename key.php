<?php
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

    $user = $_GET['u'];
    
    if(!isset($user)){echo "Error: No user specified.";return false;}
    
    $DB->Open();
    
    $qh = $DB->database->prepare("SELECT Public_Key FROM members WHERE username = ? LIMIT 1;");
    $qh->bind_param("s",$user);
	$qh->execute();
	$qh->store_result();
	$qh->bind_result($pubKey);
	$qh->fetch();

    if(!isset($pubKey)){echo "Error: User was not found."; return false;}
    echo $pubKey;
    
    $qh->free_result();
		
	$DB->Close();
    
?>