<?php
	
	function db_connect() 
	{
		try {

			$host = "localhost";
			$dbname = "BDD";
			$user = "root";
			$password = "root";
			
			$db = new PDO
			(
				"mysql:host=$host;dbname=$dbname",
				$user,
				$password,
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			return $db;
			}

		catch(Exception $e) {
			die('Ereur : ' . $e->getMessage());

		}		

	}

?>