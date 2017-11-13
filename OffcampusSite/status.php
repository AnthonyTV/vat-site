<?php
include 'connection.php';
include 'core.php';

	$status = $_POST["status"];

	$house_id = $_POST['house_id'];
	
	$landlord_id = $_POST['landlord_id'];
	

	if($status == 'interested'){
		echo $people_id = $_POST['people_id'];
		 $query = "INSERT INTO `people_house` (`id`, `student_id`, `landlord_id`, `house_id`,`status`, `time`)  
			VALUES ('',$people_id,$landlord_id,$house_id,'$status', '')";
		
		if($query_run = mysqli_query($conn, $query)){
			
			header('Location: '.$http_referer);
		}else{
			echo 'query did not run';
		}


	}else if($status == 'accept'){
		echo $student_id = $_POST['student_id'];

		$query = "UPDATE `people_house` SET `status` = 'accept'
			 WHERE student_id = $student_id AND landlord_id = $landlord_id AND house_id = $house_id AND status = 'interested'";

		if($query_run = mysqli_query($conn, $query)){
			
			header('Location: '.$http_referer);
		}else{
			echo 'query did not run';
		}

	}else if($status == 'taken'){
		echo $student_id = $_POST['student_id'];

		$query = "UPDATE `people_house` SET `status` = 'taken'
			 WHERE student_id = $student_id AND landlord_id = $landlord_id AND house_id = $house_id AND status = 'accept'";

		if($query_run = mysqli_query($conn, $query)){
		
			$query = "UPDATE `houses` SET `occupied` = `occupied`+1
			 WHERE id = $house_id ";

			if($query_run = mysqli_query($conn, $query)){
				
				header('Location: '.$http_referer);
			}else{
				echo 'query 1 did not run';
			}
		}else{
			echo 'query 2 did not run';
		}

	}


?>
