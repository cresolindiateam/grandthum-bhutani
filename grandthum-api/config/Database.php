<?php
class Database{
	
	  private $host  = 'p3nlmysql31plsk.secureserver.net:3306';
    private $user  = 'grandthum';
    private $password   = "~x3xKp84";
    private $database  = "bhutani_grandthum"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>