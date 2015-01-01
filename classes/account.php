<?php
	// GLOBAL DEFINES //
	include_once "shared/defines.php";
	////////////////////
	
	// GLOBAL CLASS LOADER //
	include_once "classes/db.php";
	/////////////////////////

	$DB = new Database();

	class Account{
		function sec_session_start(){
			$session_name = 'techial_secure_mail';
			$secure = false;
			$httponly = true;
			if(ini_set('session.use_only_cookies', 1) == false) {
				return false;
			}
			
			$cookieParams = session_get_cookie_params();
			session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
			
			session_name($session_name);
			session_start();
			session_regenerate_id();
		}
		
		function Login($u, $p){
			if(!isset($u,$p)){return false;}
			global $DB;
			$DB->Open();
			
			$qh = $DB->database->prepare("SELECT ID, password, salt FROM members WHERE username = ? LIMIT 1;");
			$qh->bind_param("s",$u);
			
			$qh->execute();
			
			$qh->store_result();
			$qh->bind_result($uid,$db_pass,$salt);
			$qh->fetch();
			
			$success = 0;
			if($qh->num_rows == 1){
				$p = hash('sha512', $p . $salt);
				if($p == $db_pass) {
					$success = 1;
					//echo "Login successful!";
					
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					
					$u = preg_replace("/[^a-zA-Z0-9_\-]+/","",$u);
					$_SESSION['user_id'] = $uid;
					$_SESSION['username'] = $u;
					$_SESSION['login_string'] = hash("sha512", $p . $user_browser);
				} else {
					//echo "Login failed!";
				}
			}else{
				//echo "Login failed!";
			}
			
			$qh->free_result();
			$now = time();
			$ip = $_SERVER['REMOTE_ADDR'];
			$ih = $DB->database->prepare("INSERT INTO login_attempts(successful, user, time, IP) VALUES (?,?,'$now','$ip')");
			$ih->bind_param("is",$success,$u);
			$ih->execute();
			
			$ih->free_result();
			
			$DB->Close();
			
			if($success){
				return true;
			}else{
				return false;
			}
		}
		
		function Login_Check(){
			global $DB;
			
			$DB->Open();
			if(isset($_SESSION['user_id'],$_SESSION['username'],$_SESSION['login_string'])) {
				$uid = $_SESSION['user_id'];
				$u = $_SESSION['username'];
				$login_string = $_SESSION['login_string'];
				$user_browser = $_SERVER['HTTP_USER_AGENT'];
				
				if($qh = $DB->database->prepare("SELECT password FROM members WHERE ID = ? LIMIT 1;")) {
					$qh->bind_param('i',$uid);
					$qh->execute();
					$qh->store_result();
					$qh->bind_result($password);
					$qh->fetch();
					
					
					if($qh->num_rows == 1) {
						$login_check = hash("sha512", $password . $user_browser);
						if($login_check == $login_string) {
							return true;
						} else {
							return false;
						}
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
			$DB->Close();
		}
		
		function LogOut(){
			if(isset($_SESSION['user_id'],$_SESSION['username'],$_SESSION['login_string'])) {
				$_SESSION = array();
				if (ini_get("session.use_cookies")) {
					$params = session_get_cookie_params();
					setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]);
				}
				session_destroy();
				
				if(isset($_SESSION['user_id'],$_SESSION['username'],$_SESSION['login_string'])) {
					return false;
				} else {
					return true;
				}
			}else{
				return true;
			}
		}
		
		function Register($u, $p, $pubKey, $msg){
			if(!isset($u,$p)){return false;}
			
			global $DB;
			
			$DB->Open();
			
			$qh = $DB->database->prepare("SELECT * FROM members WHERE username = ? LIMIT 1;");
			$qh->bind_param("s",$u);
			$qh->execute();
			$qh->store_result();
			$qh->fetch();
			
			if($qh->num_rows > 0) {
				return false;
			}
			
			$salt = hash('sha512',uniqid(mt_rand(), true));
			$p = hash('sha512', $p . $salt);
			
			
			$qh = $DB->database->prepare("INSERT INTO members(username, password, salt, Public_Key) VALUES (?,?,?,?);");
			
			$qh->bind_param("ssss",$u, $p, $salt, $pubKey);
			$qh->execute();
			
			$tDate = date("d.m.Y");
			$this->sendMessage("Admins", $msg, $msg, $u, $tDate);
			
			$DB->Close();
			return true;
		}
		
		function retrieveMessages($username, $index = 0){
		    if(!isset($username)){return false;}
		    
		    global $DB;
		    
		    $DB->Open();
		    
		    $qh = $DB->database->prepare("SELECT * FROM messages WHERE receipent = ? LIMIT 15 OFFSET ".$index.";");
		    $qh->bind_param("s",$username);
			$qh->execute();
		    
		    $ar = $qh->get_result();
			$result = $ar->fetch_all();
			
			$qh->free_result();
			$ar->free_result();
			
			$DB->Close();
		    
		    return $result;
		}
		
        function retrieveMessage($id){
		    if(!isset($id)){return false;}
		    
		    global $DB;
		    
		    $DB->Open();
		    
		    $qh = $DB->database->prepare("SELECT content FROM messages WHERE id = ? LIMIT 1;");
		    $qh->bind_param("i",$id);
			$qh->execute();
		    
		    $ar = $qh->get_result();
			$result = $ar->fetch_array();
			
			$qh->free_result();
			$ar->free_result();
			
			$DB->Close();
		    
		    return $result[0];
		}
		
		function sendMessage($sender, $title, $msg, $receipent, $date){
		    if(!isset($sender, $title, $msg, $receipent, $date)){return false;}
		    
		    global $DB;
		    
		    $DB->Open();
		    
            $qh = $DB->database->prepare("INSERT INTO messages(sender, title, content, receipent, date) VALUES(?,?,?,?,?);");
            $qh->bind_param("sssss",$sender,$title,$msg,$receipent,$date);
			$qh->execute();
			
			$qh->free_result();
			
			$DB->Close();
		    
		    return true;
		}
	}
?>