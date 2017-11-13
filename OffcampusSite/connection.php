<?php 

	$server = "localhost";
	$user_name = "root";
	$pass = "";
	$db =  'database';                               

	$conn = mysqli_connect($server, $user_name, $pass, $db);

	if(!$conn){
		d‪ie("Connection error: ".mysqli_connect_error());
	}else{
		//echo "Connection successful";
	}

?>
