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
				$password);

			return $db;
			}

		catch(Exception $e) {
			die('Ereur : ' . $e->getMessage());

		}		

	}


?>