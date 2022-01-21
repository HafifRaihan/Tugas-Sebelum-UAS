<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/nodemcu_log.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Nodemcu_log($db);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// The request is using the POST method
		$data = json_decode(file_get_contents("php://input"));
		if(!isset($data->suhu) or !isset($data->kelembaban)){
			die('NULL data detected');
		}
		$item->id = $data->id;
		$item->suhu = $data->suhu;
		$item->kelembaban = $data->kelembaban;
		$item->created_at = date('Y-m-d H:i:s');
		
	} 
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
		$item->id = isset($_GET['id']) ? $_GET['id'] : die('wrong structure!');
		$item->suhu = isset($_GET['suhu']) ? $_GET['suhu'] : die('wrong structure!');
		$item->kelembaban = isset($_GET['kelembaban']) ? $_GET['kelembaban'] : die('wrong structure!');
		$item->created_at = date('Y-m-d H:i:s');
	}else {
		die('wrong request method');
	}
    
    if($item->updateDataLog()){
        echo json_encode("Log Data ".$item->id ." updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>