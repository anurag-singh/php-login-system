<?php
	define ('_HOST_NAME', 'localhost');
	define ('_DB_USER', 'root');
	define ('_DB_PASS', '');
	define ('_DB_NAME', 'interview');
	
	class Database {
		
		public $db;
		public function __construct() {
			$this->db = new mysqli (_HOST_NAME, _DB_USER, _DB_PASS, _DB_NAME);
			if(mysqli_connect_errno()) {
				echo "ERROR: Could not connect to DB";
				exit;
			}
		}
	}
	// $conn = new mysqli (_HOST_NAME, _DB_USER, _DB_PASS, _DB_NAME);
	// if($conn->connect_error) {
	// 	die ("Connection Failed:"). $conn->connect_error;
	// }
	// # Create Database
	// $createDB = "CREATE DATABASE IF NOT EXISTS interview";
	// if($conn->query($createDB) === TRUE) {
	// 	echo "DB created</br>";
	// }
	// else {
	// 	die ("ERROR: DB not cerated". $conn->error);
	// }
	// $createTB = "CREATE TABLE IF NOT EXISTS users (
	// 				userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	// 				name VARCHAR(30) NOT NULL,
	// 				email VARCHAR(50) NOT NULL,
	// 				password VARCHAR(50) NOT NULL,
	// 				reg_date TIMESTAMP
	// 			)";
	// if ($conn->query($createTB) === TRUE) {
	// 	echo "TABLE Created";
	// }
	// else {
	// 	die("Table not Created. </br>" . "ERROR: ". $conn->error);
	// }
?>