<?php 

	define('HOST', 'localhost'); // Database host name ex. localhost
	define('USER', 'mastetnr_tradebull'); // Database user. ex. root ( if your on local server)
	define('PASSWORD', 'TradeBull.Io@#2021'); // user password  (if password is not set for user then keep it empty )
	define('DATABASE', 'mastetnr_tradebullio'); // Database Database name

	function DB()
	{
		try {
			$db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
			return $db;
		} catch (PDOException $e) {
			return "Error!: " . $e->getMessage();
			die();
		}
	}
	$email = $_POST['email'];
	$password = $_POST['password'];


		$conn = DB(); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		
     $sql = "update credentials set password = '$password' where email = '$email'";
	$conn->prepare($sql)->execute(); 
	
	?>