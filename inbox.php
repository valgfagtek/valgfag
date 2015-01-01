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

	//LOGIN CHECK 1	
	if(!$Account->Login_Check()){
		header("Location: index.php");
	}
	
	// Initialize HTML by printing out <html> tag.
	// START HTML //
	
	$Content->OpenHTML();
	
		// START HEAD //
		$Content->OpenHead();
	
			// Set Title
			$Content->SetTitle("SecuriChat - Inbox");
			
			// Load all CSS files here
			$CSS->LoadExt("http://fonts.googleapis.com/css?family=Patua+One");
			$CSS->Load("inbox");
			$CSS->Load("textbox");
			$CSS->Load("button");
			

			
			$Content->LoadExtJS("http://code.jquery.com/jquery-1.11.0.min.js");
	
		$Content->CloseHead();
		// END HEAD //
	
		// START BODY //
		$Content->OpenBody();
	
			// Call PrintPage at Content to display a page.
			$Content->PrintPage("inbox");
			
			// Initialize client-side variables
			$username = $_SESSION['username'];
			echo "<script>retrieveUsername('".$username."');</script>";
			
			
			// Initialize variables
			$i = 0;
			$messageArray = $Account->retrieveMessages($username);
			
			// BLOCKS
			if(count($messageArray)<1){echo "No messages for you. :'(";}
			while($i<=count($messageArray)-1){
			    $id = $messageArray[$i][0];
			    echo "<!-- BLOCK ".$id." -->";
                echo "<div class='block' id='".$id."' onClick='messageClicked(".$id.");'>";
                echo "<sender>".$messageArray[$i][1]."</sender>";
                echo '<messageTitle></messageTitle>';
                echo "<dateTime>".$messageArray[$i][5]."</dateTime>";
                echo "</div>";
                echo '<script>decryptTitle("'.$messageArray[$i][2].'", '.$id.');</script>';
                $i++;
			}
			
			echo _BREAK;
			echo "Logged in as ".$username;
		
			echo _BREAK;
			echo "<a href='logout.php'>Log Out</a>";
			// Here we close the DIV we opened up in the .html file
            echo "</div>";
            
	
		$Content->CloseBody();
		// END BODY //
	
	$Content->CloseHTML();
	// END HTML //
?>