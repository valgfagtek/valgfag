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
	
	$Account->sec_session_start();
	
    $username = $_SESSION['username'];
    $id = intval($_GET['id']);
    
    if(!isset($_GET['id'])){echo "Error: No ID specified."; return false;}
    if(!isset($username)){echo "Error: Not logged in."; return false;}
    //if(!$Account->Login_Check()){echo "Error: Not logged in."; return false;}
    
    
    $DB->Open();
    
    $qh = $DB->database->prepare("SELECT receipent FROM messages WHERE id = ? LIMIT 1;");
    $qh->bind_param("i",$id);
	$qh->execute();
		    
	$ar = $qh->get_result();
	$result = $ar->fetch_array();
    
    if(strtolower($result[0])!=strtolower($username)){echo "Error: Message not found."; return false;} // Trick them into thinking message doesn't exist. 
    $message = $Account->retrieveMessage($id);
    if(!isset($message)){echo "Error: Message not found."; return false;}
    echo $message;
    
    $qh->free_result();
	$ar->free_result();
		
	$DB->Close();
?>