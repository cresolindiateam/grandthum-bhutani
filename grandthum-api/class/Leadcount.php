<?php
class Leadcount{   
    
    private $itemsTable = "lead_counts";      
    public $id;
    public $type;
    public $created_at;
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read(){	
		if($this->id) {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable."  WHERE id = ?");
			$stmt->bind_param("i", $this->id);					
		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable);		
	

		}		
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
}
?>