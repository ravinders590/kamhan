<?php 
/**
 * DB config
 */
class Databaseconfig 
{

private $localhost;
private $username;
private $password;
private $db_name;

	protected function connect(){

		if ($_SERVER['SERVER_NAME'] == 'localhost') {

			$this->localhost="localhost";
			$this->username="root";
			$this->password="";
			$this->db_name="stonekamhan_db";					
			
		}else{
			
			//for Live
			$this->localhost="localhost";
			$this->username="stonekamhan_user";
			$this->password="3cIb$46x5";
			$this->db_name="stonekamhan_db";

		}

		$conn = new mysqli($this->localhost,$this->username,$this->password,$this->db_name) or die("Connection failed");
		return $conn;
	}

}
?>