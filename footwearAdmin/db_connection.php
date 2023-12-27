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
			$this->password='';
			$this->db_name="kamhandb";					
			
		}else{
			
			//for Live
			$this->localhost="localhost";
			$this->username="kamhan_usr";
			$this->password='hM9v$h281';
			$this->db_name="kamhandb";

		}
		
		
		$conn = new mysqli($this->localhost,$this->username,$this->password,$this->db_name) or die("Connection failed");		
		return $conn;
	}

}
?>