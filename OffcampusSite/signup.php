

<?php 
$title = 'Sign Up';
include 'header.php';

?>

<?php
	

	echo "<h1>Sign Up</h1>";

	if(!loggedin()){

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
			$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
			$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
			$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
			$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
			$password_again = trim(filter_input(INPUT_POST, 'password_again', FILTER_SANITIZE_STRING));
			$college = trim(filter_input(INPUT_POST, 'college', FILTER_SANITIZE_STRING));
			$sex = trim(filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING));
			$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
			$age = trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT));

			$password_hash = md5($password);
		
			if(!empty($name) && !empty($lastname) && !empty($username) && !empty($password) && !empty($password_again) && !empty($college) && !empty($sex) 					&& !empty($email) && !empty($age)){
				
				if($_POST['address'] != ''){

					echo 'Bad Form';
				
				}else {

					if($password != $password_again){
						echo "Passwords do not match";
					}else{

						$query = "SELECT username FROM people WHERE username = '".mysqli_real_escape_string($conn, $username)."'";
						$query_run = mysqli_query($conn, $query);
						if(mysqli_num_rows($query_run) == 1){
							echo "The username $username already exists";
						}else{
						
							$query = "INSERT INTO people VALUES ('NULL','".mysqli_real_escape_string($conn, $name)."','"
								.mysqli_real_escape_string($conn, $lastname)."','"
								.mysqli_real_escape_string($conn, $username)."','"
								.mysqli_real_escape_string($conn, $password_hash)."','Student','"
								.mysqli_real_escape_string($conn, $sex)."','"
								.mysqli_real_escape_string($conn, $college)."','"
								.mysqli_real_escape_string($conn, $email)."','download.png','"
								.mysqli_real_escape_string($conn, $age)."')";
							if($query_run = mysqli_query($conn, $query)){
								header('Location: home.php');
							}else{
		 						echo "Register unsuccessful";
							}
						}
					 
					}
				}
			}else{
				echo "All fields are required";
			}
	
		
		}
	}
?>

<form action="signup.php" method="post">
	<label for="name">Name:</label><input type="text" name="name" id="name" value="<?php if(!empty($name)){ echo $name;} ?>"><br><br><br>
	<label for="lastname">Lastname:</label><input type="text" name="lastname" id="lastname" value="<?php if(!empty($lastname)){ echo $lastname; }?>"><br><br><br>
	<label for="email">Email:</label><input type="text" name="email" id="email" value="<?php if(!empty($email)){ echo $email; }?>"><br><br><br>
	<label for="username">Username:</label><input type="text" name="username" id="username" value="<?php if(!empty($username)){echo $username;} ?>"><br><br><br>
	<label for="password">Password:</label><input type="password" name="password" id="password" ><br><br><br>
	<label for="password_again">Password again:</label><input type="password" name="password_again" id="password_again"><br><br><br>
	<!---- protection from spam attack --------------------------------------------------------------------------------------------->
	<div style="display:none"><label for="address">Address:</label><input type="text" name="address" id="address">Please leave field blank</div>
	
	<label>College:</label>
	<select name="college" >
		<option value="">Select College</option>
		<option value="Chinhoyi University of Zimbabwe">Chinhoyi University of Technology</option>
		<!--option value="MIdlandls State University">MIdlandls State University</option-->
		<option value="National University of Science and Technology">National University of Science and Technology</option>
		<option value="University of Zimbabwe">University of Zimbabwe</option>
		
	</select><br><br><br>
	
	<label>Sex:</label>
	<select name="sex">
		<option value=""></option>
		<option value="Female">Female</option>
		<option value="Male">Male</option>
	</select><br><br><br>
	<label for="age">Age:</label><input type="text" name="age" id="age" value="<?php if(!empty($age)){echo $age;} ?>"><br><br><br>
	<input type="submit" value="Sign Up">

</form>
<?php include 'footer.php'; ?>
