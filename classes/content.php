<?php	
	class Content {
		var $settings_file_ext = ".html";
		function PrintPage($file){
			echo file_get_contents("html/".$file.$this->settings_file_ext, FILE_USE_INCLUDE_PATH);
		}
		
		function OpenHTML(){
			echo "<html>\n";
		}
		
		function CloseHTML(){
			echo "</html>\n";
		}
		
		function OpenHead(){
			echo "<head>\n";
		}
		
		function CloseHead(){
			echo "</head>\n";
		}
		
		function OpenBody(){
			echo "<body>\n";
		}
		
		function CloseBody(){
			echo "\n</body>\n";
		}
		
		function SetTitle($title){
			echo "<title>".$title."</title>\n";
		}
		
		function Display($text){
			echo $text;
		}
		
		function openDiv($div){
		    echo "<div id='".$div."'>";
		}
		
		function closeDiv(){
		    echo "</div>";
		}
		
		function LoadJS($file){
		    echo "<script src='".$file.".js'></script>\n";
		}
		
		function LoadExtJS($file){
		    echo "<script src='".$file."'></script>\n";
		}
	}
?>