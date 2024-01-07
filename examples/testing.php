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
		$conn = DB(); 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$name="fsfs";
		$email="a@gmil.com";
		$trd_roompwd='fwefwefw';
		$phone='fwfwfwefwefwe';
     $sql = "INSERT INTO credentials (name,email,password,phone) VALUES ('$name','$email','$trd_roompwd','$phone')";
	$conn->prepare($sql)->execute(); 