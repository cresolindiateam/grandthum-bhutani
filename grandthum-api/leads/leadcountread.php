<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Leadcount.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new Leadcount($db);

$items->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $items->read();



if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["leadcount"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($item); 
        $itemDetails=array(
            "id" => $id,
            "type" => $type,
            "created_at"=>$created_at
                 
	    ); 
       array_push($itemRecords["leadcount"], $itemDetails);
    }    
    http_response_code(200);     
    echo json_encode($itemRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
} 