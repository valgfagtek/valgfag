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
	
	// Initialize HTML by printing out <html> tag.
	// START HTML //
	$Content->OpenHTML();
	
		// START HEAD //
		$Content->OpenHead();
	
			// Set Title
			$Content->SetTitle("SecuriChat");
			
			// Load all CSS files here
			$CSS->LoadExt("http://fonts.googleapis.com/css?family=Patua+One");
			$CSS->Load("Main");
			$CSS->Load("Textbox");
			$CSS->Load("button");
	
		$Content->CloseHead();
		// END HEAD //
	
		// START BODY //
		$Content->OpenBody();
	
			// Call PrintPortal at Content to display portal.
			$Content->PrintPage("login");
	
		$Content->CloseBody();
		// END BODY //
	
	$Content->CloseHTML();
	// END HTML //
?>