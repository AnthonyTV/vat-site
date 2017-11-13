<?php 

include 'connection.php';
include 'core.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="myhome.css" type="text/css" />
<title><?php echo $title ; ?></title>
<style type="text/css">
<!--
.style1 {
	color: #ff6600;
	font-size: 24px;
}


-->
</style>
</head>

<?php
/*if(isset($_SESSION['show_login']) && !empty($_SESSION['show_login'])){
	if ($http_referer != 'http://localhost/new/show_login.php' ){
		
		//if(isset($_SESSION['show_login']) && !empty($_SESSION['show_login'])){
		$_SESSION['show_login'] = 0;
		//header('Location: '.$http_referer);
		}
}*/

$query_1 = "SELECT DISTINCT college FROM houses";  // select colleges available in database to be used on select list
	$result_1 = mysqli_query($conn, $query_1);
	
	
	while ($colleges = mysqli_fetch_assoc($result_1)){

		$universities[] = $colleges["college"];

	}

	$items_per_page = 3;

	if(isset($_GET['pg'])){

		$current_page = htmlspecialchars($_GET['pg']);

	}
	if(empty($current_page)){

		$current_page = 1;
	}


?>
<body bgcolor="#d3dce6">
	
	<header2>
    <div class="nav2">
	 <p align="justify" class="pheight" bgcolor="#26354A"><span class="logo2"> VAT OffCampus Life <span class="tagline2">| Online Accommodation</span></span></p>
	  
      <ul>
        <li class="home2"><a href="home.php">Home</a></li>
        <li class="About2"><a  href="aboutus.php">About</a></li>
        <li class="Contact2"><a href="contact.php">Contact</a></li>
        <!--li class="References2"><a href="#">Resources</a></li-->
	
        <li class="listings2"><a href="listing.php">   Landlords</a></li>
 </ul>


<?php if(empty($_SESSION['show_login'])){   ?>


	<div class="branding-title"><form action="home.php" method="GET">

			<input type="text" placeholder="type search here" name="search">
			<input type="submit" value="Search">	
		
		</form></div>

	<form action="<?php echo 'college.php';?>" method="GET">

			<select name="university">
				<option value="">Universities</option>
			<?php foreach($universities as $_university){?>
				<option value="<?php echo $_university; ?>"><?php echo $_university;?></option>
	
			<?php } ?>
			</select>

			<input type="submit" value="Submit">
		</form>

     


    
<?php

}
if(!loggedin()){
		
		if(!isset($_SESSION['show_login']) && empty($_SESSION['show_login'])){
		       
			//echo'<h7>&nbsp;</h7> <a href="signup.php">Sign Up</a> </div>';
			//include 'loginform.php';
			//$_SESSION['show_login'] = 0;
			//header('Location:show_login.php');
			
			echo '<a href="show_login.php">Log In</a>';

		}  
		echo '<a href="signup.php">Sign Up</a>';
	}else{
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM people WHERE id = '$user_id'";
		$query_run = mysqli_query($conn, $query);
		if($query_run){
			$result_people = mysqli_fetch_assoc($query_run);
			echo '<a href="profile.php?user_id='.$user_id.'">'."Profile".'</a>';
			}else{
			echo 'query failed';
		}
		echo '<a href="logout.php">Log Out</a>';
		
		
	

?>


	
<?php } ?>
</div></div>

  </header2>
