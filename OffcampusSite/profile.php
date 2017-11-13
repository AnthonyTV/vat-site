<?php 
$title = 'Profile';
include 'header.php'; 

?>
<?php
	
	if(isset($_GET['user_id']) && !empty($_GET['user_id'])){        // checks if user id is set and not empty
		
		$user_id = htmlspecialchars($_GET['user_id']);
		$student_id = $user_id;
		
		$query = "SELECT * FROM people WHERE id = '".mysqli_real_escape_string($conn, $user_id)."'";
		$query_run = mysqli_query($conn, $query);

		if ($query_run){
			$result = mysqli_fetch_assoc($query_run);
			
			}else{
				echo 'query did not run';
			}
	}else{

		echo 'not logged in';
	}


	$college = $result['college'] ;
	$title = $result['name']." ".$result['surname'];
	$sex = $result['sex'];
	$age = $result['age'];
	$profile_image = $result['profile_image'];
	$landlord_student = $result['landlord_student'];
	
	
	if(loggedin()){
?>
			<br>&nbsp;Name: <?php echo $title; ?><br> &nbsp;


<?php		
		if($landlord_student == 'Student' && $student_id == $user_id){
		

?>
			
			
				
			      <!--h1>Profile </h1-->
			<table> <nav id="profiletabs">
				<ul class="clearfix">
				  <li><a href="profile.php?user_id=<?php echo $user_id;?>&status=" >Profile</a></li>
				  <li><a href="profile.php?user_id=<?php echo $user_id;?>&status=interested">Interested</a></li>
				  <li><a href="profile.php?user_id=<?php echo $user_id;?>&status=accept">Accepted</a></li>
				  <li><a href="profile.php?user_id=<?php echo $user_id;?>&status=taken">Taken</a></li>
				</ul>
			      </nav>
			      <?php 
			if(isset($_GET['status']) && !empty($_GET['status'])){
				$stat = htmlspecialchars($_GET['status']);
		
				query_profile_student($stat,$user_id);

		    
		        }else{
?>
					<td><br><a href="upload.php?user_id=<?php echo $user_id; ?>&image_src=<?php echo $profile_image; ?>">
			      		<div ><img src="<?php echo $profile_image; ?>" alt="profile picture" height="150" width="150" ></div></a></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>Status: <?php echo $landlord_student;?><br><br>
					College: <?php echo $college;?><br><br>
					Sex: <?php echo $sex;?><br><br>
					Age: <?php echo $age;?><br><br></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
				<tr>
<?php
			}

		}else if($landlord_student == 'Landlord'){
?>
				
		<table>	      <a href="upload.php?user_id=<?php echo $user_id; ?>&image_src=<?php echo $profile_image; ?>">
			      
<?php				$house_IDs = array();

				$query_1 = "SELECT id FROM houses WHERE landlord_id = $user_id";
				$query_run_1 = mysqli_query($conn, $query_1);

				if($query_run_1){
					$query_num_rows_1 = mysqli_num_rows($query_run_1);
					if($query_num_rows_1 > 0){
						//echo $query_num_rows_1;
						while($houses = mysqli_fetch_assoc($query_run_1)){
							$house_IDs [] = $houses['id'];
						}
					}else{
						echo 'NO results';
					}
				}else{
					echo 'query failed wo';
				}
		
				foreach($house_IDs as $house_ID){
					

					$query = "SELECT * FROM houses 
					WHERE houses.landlord_id =".mysqli_real_escape_string($conn, $user_id)
					." AND houses.id = $house_ID";

					$query_run = mysqli_query($conn, $query);
					if($query_run){
						
						$numb_rows = mysqli_num_rows($query_run);
				

						if($numb_rows > 0){
								$result_house_people = mysqli_fetch_assoc($query_run);

								

						?>
					
								<td><div>

								<a href="house.php?id=<?php echo $result_house_people['id'];?>">
								<img src="<?php echo $result_house_people['images']; ?>" height="200" width="200" ><br></a>

								<strong>Specifications</strong>
								Rooms: <?php echo $result_house_people['rooms']; ?><br>
								Price: US$<?php echo $result_house_people['price']; ?> .<br>
								Address: <?php echo $result_house_people['address']; ?><br>
								Status: <?php echo ($result_house_people['capacity']-$result_house_people['occupied']); ?> 
								 places available Now out of <?php echo $result_house_people['capacity']; ?> places <br>
								Views:<?php echo views_count($result_house_people['id']); ?><br><br>
								
								Interested:<?php echo query_profile_landlord('interested'); ?><br>
								Accepted:<?php echo query_profile_landlord('accept') ; ?><br>
								Taken:<?php echo query_profile_landlord('taken') ; ?><br><br>

								<a href="house.php?id=<?php echo $result_house_people['id'];?>">
								View Details </a><br>
								
								</div></td>

		<?php					}else{

?>
					<td><br><a href="upload.php?user_id=<?php echo $user_id; ?>&image_src=<?php echo $profile_image; ?>">
			      		<div ><img src="<?php echo $profile_image; ?>" alt="profile picture" height="150" width="150" >
					</div></a></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
					<td>Status: <?php echo $landlord_student;?><br>
					College: <?php echo $college;?><br>
					Sex: <?php echo $sex;?><br>
					<br><br></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
				<tr>
<?php
						}
							
					}else{
						echo 'not cool';
					}

				}echo"</tr>";


			}
		}
echo '<table><h1>&nbsp;</h1><h1>&nbsp;</h1>';

 include 'footer.php';

		

?>

