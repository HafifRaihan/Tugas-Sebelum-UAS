<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/nodemcu_log.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Nodemcu_log($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleLogData();

    if($item->created_at != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "suhu" => $item->suhu,
            "kelembaban" => $item->kelembaban,
            "created_at" => $item->created_at
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Data not found.");
    }
?>