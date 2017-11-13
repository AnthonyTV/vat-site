

<?php
$title = 'Upload';

include 'header.php';
?>


<?php


echo '<table></table>';

if(isset($_GET['user_id']) && !empty(isset($_GET['user_id']) && !empty($_GET['user_id'])) && isset($_GET['image_src']) && !empty($_GET['image_src'])){

	$user_id = $_GET['user_id'];
	$image_src = $_GET['image_src'];
echo '<img src="'.$image_src.'" width="150" height="150"<br>';
}




	$target_dir = "uploads/";
	$target_file = $target_dir.basename(@$_FILES["fileToUpload"]["name"]);
	$uploadloadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

	// check if image is not fake

	if(isset($_POST["submit"])){

		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false){
			echo "File is an image - ".$check["mime"].".";
			$uploadOk = 1;
		}else{
			echo "File is not an image.";
			$uploadOK = 0;
		}


	// check if file exists already

	if(file_exists($target_file)){

		echo "1The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.";
				$query = "UPDATE people SET profile_image ='".$target_file."'WHERE id = $user_id";
				$query_run = mysqli_query($conn, $query);
				if($query_run){
				 echo "2The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.";
				die();	

				}else{
					echo 'query_failed';
					//header("Location: $httpreferer");
					}
		}
	// check file size 

	if($_FILES["fileToUpload"]["size"] > 500000){
	
		echo "your file is too large";
		$uploadOk = 0;
	}

	// Allow certain formats

	if($imageFileType != "jpg" && 
	   $imageFileType != "png" && 
	   $imageFileType != "jpeg" &&
	   $imageFileType != "gif"){

		echo "Sorry, only JPG, JPEG, PNG and GIF are allowed.";
		$uploadOK = 0;
	}

	// check if uploadOk is set to 0 by an error

	if($uploadOk == 0){
		echo "Sorry your file was not uploaded";
		}else{

	// if everything is ok try to upload the file
			if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
		
				echo "1The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.";
				$query = "UPDATE people SET profile_image ='".$target_file."'WHERE id = $user_id";
				$query_run = mysqli_query($conn, $query);
				if($query_run){
				 echo "2The file ".basename($_FILES["fileToUpload"]["name"])." has been uploaded.";	

				}else{
					echo 'query_failed';
					//header("Location: $httpreferer");
					}
			}else{
				echo "Sorry, there was an error uploading your file.";
			}
	}


	}
//}

	?>



<form action="upload.php" method="POST" enctype="multipart/form-data">
		Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
		<input type="submit" value="Change Profile Picture" name="submit"/*>

</form>


<?php //include 'bottom.php'; ?>

