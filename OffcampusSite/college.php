

<?php


	
	$university = htmlspecialchars($_GET['university']);  // use get method to get name of university from link or select list
	$title = $university ;                                // title of page 

	include 'header.php';
	

	//echo "<table><tr><h1></h1><br>";


	if(loggedin()){

			if(isset($_GET['show']) && !empty($_GET['show'])){
	
				if($_GET['show'] == 'true'){


		
					if(isset($_GET['suburb']) && !empty($_GET['suburb'])&& isset($_GET['university']) && !empty($_GET['university'])){
	
						$suburb = htmlspecialchars($_GET['suburb']);
			
						echo "<table><tr><h1> ".ucfirst($suburb)." listings </h2>";

						echo "<table><tr><h2>Locate your preferred area below:</h2>";


	  	 	
						$query = "SELECT * FROM houses WHERE college = '".mysqli_real_escape_string($conn, $university)
							."' AND address LIKE '%".
							mysqli_real_escape_string($conn,$suburb)."%'";
						$query_run = mysqli_query($conn, $query);

			 			display_house($query,$university,'college','college.php?');

					}
				}
			}


	

?>

<?php 
 if(isset($_GET['university']) && !empty($_GET['university']) 
	&& isset($_GET['suburb']) && !empty($_GET['suburb']) 
	&& !isset($_GET['show']) && empty($_GET['show'])){ 



		$suburb = htmlspecialchars($_GET['suburb']);

		$query = "SELECT * FROM suburbs WHERE suburb_name = '".$suburb."'";
		$query_run = mysqli_query($conn, $query);
		$result_suburb = mysqli_fetch_assoc($query_run);

	
		$heading = $result_suburb['suburb_name'];
		$paragraph = $result_suburb['suburb_statement'];
		$view_listings = "college.php?university=".$university."&suburb=".$result_suburb['suburb_name']."&show=true";
	
?>

		<div>
           	  <h3><a href="#"><?php echo ucfirst($heading); ?></a></h3>
           	  
			  <div class="img"><img src="images/img.jpg" alt="" /></div>
			  <div class="mtptxt">
	  <p> <?php echo $paragraph; ?> </p>
	  <br />
	  </div>	  
			  <p class="date"><a href="<?php echo $view_listings; ?>"><img src="images/eye.png" alt="" />View listings </a> </p><br/>
						  
			</div>
	</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</td></tr></table>
<?php		

	}
?><?php 

	if(isset($_GET['university']) && !empty($_GET['university'])
	 && !isset($_GET['suburb']) && empty($_GET['suburb']) 
	 && !isset($_GET['show']) && empty($_GET['show'])){ 

		$query = "SELECT * FROM universities WHERE university_name = '".$university."'";
		$query_run = mysqli_query($conn, $query);

		if($query_run){
	
			$result_university = mysqli_fetch_assoc($query_run);
?>


			<td height="319" class="bodyText5">
			  <div class="main-description">
			    <h2>About the <?php echo $result_university['university_name']; ?></h2>
			    <p><?php echo $result_university['university_statement'];?> Life at the <a href="#" ><?php echo $university; ?></a>.</p>
			  </div>
			  <p class="date"></p>
			  <div>

			<h2>Residential suburbs near the <?php echo $result_university['university_name']; ?></h2>

<?php

			$query = "SELECT * FROM suburbs WHERE suburb_college = '".$university."'";
			$query_run = mysqli_query($conn, $query);

			if($query_run){

				while($result_suburbs = mysqli_fetch_assoc($query_run)){

					echo'
					<h3><a href="college.php?university='.$university.'&suburb='.$result_suburbs['suburb_name'].'">'
					.ucfirst($result_suburbs['suburb_name']).'</a></h3>';

				}
				echo 'Click the links to know about each surbub and accomodation available there.';
			}
		}
		echo '</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			</td></tr></table>';
	}
?>

<?php
}else{
	 echo 'Please Log In to access more information'; 
	}
?>
<?php include 'footer.php'; ?>



