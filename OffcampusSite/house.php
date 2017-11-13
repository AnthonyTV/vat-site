<?php 
$title = 'House';
include 'header.php'; 

?>
<?php
	$title = 'house';
	
		
	echo "<table></table>";

	$house_get_id = htmlspecialchars($_GET['id']);

	$query = "SELECT * FROM houses WHERE id = '$house_get_id'";
	$query_run = mysqli_query($conn, $query);
	$query_num_rows = mysqli_num_rows($query_run);

	$result_house = mysqli_fetch_assoc($query_run);

	
	
	if(loggedin()){

?>


<?php 											
											

		$status = $result_people['landlord_student'];
												
												
		$house_id = $result_house['id'];
		 

		$people_id = $result_people['id'];
		
		 

		 $landlord_id = $result_house['landlord_id'];

		views_update($house_id, $people_id);
		$views = views_count($house_id);


?>
			<div>
		
				<a href="house.php?id=<?php echo $result_house['id'];?>">
				<img src="<?php echo $result_house['images']; ?>" height="200" width="200" ><br></a>

				<strong>Specifications</strong>
				Rooms: <?php echo $result_house['rooms']; ?><br>
				Price: US$<?php echo $result_house['price']; ?> .<br>
				Address: <?php echo $result_house['address']; ?><br>
				Status: <?php echo ($result_house['capacity']-$result_house['occupied']); ?>
				 places available Now out of <?php echo $result_house['capacity']; ?> places <br> 
				Views:<?php echo $views; ?><br><br>
		
			</div>


<?php
		if($status == 'Student' ){


				$query = "SELECT * FROM people_house
					JOIN houses ON houses.landlord_id = people_house.landlord_id 
					WHERE student_id = $people_id AND house_id= $house_id ";
				
				$query_run = mysqli_query($conn, $query);
				$query_num_rows = mysqli_num_rows($query_run);
				if($query_num_rows <= 0){

?>

						If interested and you would like to be considerd for a place please click the button.
						<form action="status.php" method="POST">
						<input type="hidden" name="status" value="interested">
						<input type="hidden" name="house_id" value="<?php echo $house_id;?>">
						<input type="hidden" name="people_id" value="<?php echo $people_id;?>">
						<input type="hidden" name="landlord_id" value="<?php echo $landlord_id;?>">
	
						<input type="submit" value="Interested">
					</form>

<?php 				}else{
					$result = mysqli_fetch_assoc($query_run);
					

					if($result['status'] == 'interested'){
						$query_2 = "SELECT * FROM people_house 
							WHERE house_id = '$house_id' 
							AND landlord_id = '$landlord_id' 
							AND status = 'interested' 
							AND student_id != $people_id";

						if($query_run_2 = mysqli_query($conn, $query_2)){

						
							$query_num_rows_2 = mysqli_num_rows($query_run_2);
							
							echo "You and  $query_num_rows_2 others are interested.";
			
						}else{
							echo 'query did not run';
						}
					
					}else if($result['status'] == 'accept'){
						echo 'Your request has been accepted inorder to take the place make an Ecocash payment to the given number.<br>'
							."Ecocash Name: ".$result['ecocash_name'].'<br>'
							."Ecocash Number: ".$result['ecocash_number'];
					}else if($result['status'] == 'taken'){
						echo 'Your payment has been received and you are now free to move in.';
					}
			
		
			 
				 }

?>



<?php  

			}else if($status == 'Landlord' && $people_id == $landlord_id){ 

?>
				 <nav id="profiletabs">
				<ul class="clearfix">
				  <li><a href="house.php?id=<?php echo $house_id;?>&status=interested">Interested</a></li>
				  <li><a href="house.php?id=<?php echo $house_id;?>&status=accept">Accepted</a></li>
				  <li><a href="house.php?id=<?php echo $house_id;?>&status=taken">Taken</a></li>
				</ul>
			      </nav>
			     

<?php
		if(isset($_GET['status']) && !empty($_GET['status'])){
				$stat = htmlspecialchars($_GET['status']);
				query_house_landlord($stat);
		}
/******************************************************* END 2 ***********************************************************************************/

?>
	




<?php 
		} 

	} else {

		echo 'Please Log In to view more';

	}
	include 'footer.php';	
?>

