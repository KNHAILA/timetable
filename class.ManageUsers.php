<?php
	include_once('class.database.php');
	
	class ManageUsers{
		public $link;
		
		function __construct(){
			$db_connection = new dbConnection();
			$this->link = $db_connection->connect();
			return $this->link;
		}
		
		
		
		function LoginUsers($username, $password){
			$query = $this->link->query("SELECT * FROM responsable WHERE login='$username' AND password='$password'");
			$rowCount = $query->rowCount();
			return $rowCount;
		}

				
		
	}
	
?>