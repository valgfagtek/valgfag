<?php
	class Database {
		public $database;
		private $host, $username, $password, $selectdb;
		
		function Initialize($h,$u,$p,$d){
			$this->host = $h;
			$this->username = $u;
			$this->password = $p;
			$this->selectdb = $d;
		}
		
		function Open(){
			$this->database = new mysqli($this->host, $this->username, $this->password, $this->selectdb);
		}
		
		function Close(){
			$this->database->close();
		}
		
		function SQuery($q){
			$this->Open();
			$qh = $this->database->prepare($q);
			$qh->execute();
	
			$ar = $qh->get_result();
			$result = $ar->fetch_array();
			
			$qh->free_result();
			
			$this->Close();
			return $result;
		}
		
		function Query($q){
			$qh = $this->database->prepare($q);
			$qh->execute();
	
			$ar = $qh->get_result();
			$result = $ar->fetch_array();
			
			$qh->free_result();
			return $result;
		}
	}
?>