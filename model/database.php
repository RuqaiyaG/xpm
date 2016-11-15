<?php
	//database connection details
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'pmproject';

	try
	{
		$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		$error_message = $e->getMessage();
		include('../view/database_error.php');
		exit();
	}
?>