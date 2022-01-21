<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/nodemcu_log.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Nodemcu_log($db);
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$data = json_decode(file_get_contents("php://input"));
		$item->id = $data->id;
	}elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
		$item->id = isset($_GET['id']) ? $_GET['id'] : die('wrong structure!');
	}else {
		die('wrong request method');
	}  
    
    if($item->deleteLogData()){
        echo json_encode("Data deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
?>