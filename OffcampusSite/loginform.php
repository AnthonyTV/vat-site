<?php		
$title = "Log In";
include 'header.php';
		


	if(isset($_POST['username']) && isset($_POST['password'])){

		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		$password_hash = md5($password);
		
		
		if(!empty($username) && !empty($password)){
			
		  $query = "SELECT id FROM people WHERE username = '".mysqli_real_escape_string($conn, $username).
				"' AND password = '".mysqli_real_escape_string($conn,	$password_hash)."' "; 
			if($query_run = mysqli_query($conn, $query)){
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows == 0){
					echo 'Invalid password/username combination';
				}else if($query_num_rows == 1){

					
					$result = mysqli_fetch_assoc($query_run);
					$user_id = $result['id'];
					$_SESSION['user_id'] = $user_id;
					
					$_SESSION['show_login'] = 0;

					header('Location:home.php');

					

				}
			
			}else{
				echo "query did not run";
			}
		
		}else{
			echo "You must supply username and pasword";
		}
		
	}


?>




	<!--form action="<?php //echo $current_file;?>" method="POST">

		<label for="username">Username:</label><input type="text" name="username" id="username">
		<label for="password">Password:</label><input type="password" name="password" id="password">
		<input type="submit" value="Log In">


	</form-->

<link rel="stylesheet"href="listing.css" />
<link rel="stylesheet"href="responsive.css" />


 	<div><p>Login below if you already  have an account.</p> <p>If you are new and you are a landlord <a href="contact.php"><strong>contact us</strong></a>  to add your listing and if you are a student please <a href="signup.php"><strong>sign up</strong></a></p></div><br>
      <form action="<?php echo $current_file ; ?>" method='POST'>
    <div id="listing" class="container4">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button type="submit">Login</button>
    <!--input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container4" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div-->
</form><br>
        <footer>
        <p>&copy; 2017 All rights reserved. VAT Off-Campus life </p>
      </footer>
 


