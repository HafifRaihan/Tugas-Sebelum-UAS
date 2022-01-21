<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nodemcu_log";

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'createDB':
                createDB();
                break;
            case 'select':
                select();
                break;
        }
    }

    function select() {
        echo "Function for test.";
        exit;
    }
	
	function createDB() {
		global $servername, $username, $password, $dbname;
		
		// Create Data Base ***************************
		$link = new mysqli($servername, $username, $password);

		// Connect to MySQL
		if ($link->connect_error) {
			die("Could not connect: " . $conn->connect_error);
		}

		// Make my_db the current database
		$db_selected = mysqli_select_db($link, $dbname);

		if (!$db_selected) {
		  // If we couldn't, then it either doesn't exist, or we can't see it.
		  $sql = "CREATE DATABASE ".$dbname."";
		  if (mysqli_query($link,$sql )) {
			  echo "Database ".$dbname." created successfully\n";
		  } else {
			  echo 'Error creating database: ' . mysqli_error() . "\n";
		  }
		}else{
			echo $dbname." database already exist\n";
		}
		//mysqli_close($link);
		$link->close();
		
		echo "<br>";
		
		// Create Table ***************************
		// Create connection
		$tablename ="station1";
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$query = "SELECT id FROM ".$tablename."";
		$result = $conn->query($query);
		
		if(empty($result)) {
			// sql to create table
			$sql = "CREATE TABLE ".$tablename." (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			suhu DOUBLE NOT NULL,	kelembaban DOUBLE NOT NULL,
			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

			if ($conn->query($sql) === TRUE) {
			  echo "Table ".$tablename." created successfully";
			} else {
			  echo "Error creating table: " . $conn->error;
			}
		}else{
			echo $tablename." table already exist\n";
		}
		$conn->close();
	   
        exit;
    }
?>