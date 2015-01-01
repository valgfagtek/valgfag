<?php
	class Css {
		function Load($file){
			echo "<link rel='stylesheet' type='text/css' href='shared/css/".$file.".php'/>\n";
		}
		
		function LoadExt($file){
			echo "<link href='".$file."' rel='stylesheet' type='text/css'>\n";
		}
	}
?>