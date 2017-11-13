<?php
	
	ob_start();
	session_start();
	$current_file = $_SERVER['SCRIPT_NAME'];
	$http_referer = @$_SERVER['HTTP_REFERER'];
	

	function loggedin(){
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
			return true;
		}else{
			return false;
		}
	}

	function views_update($house_id, $people_id){
		global $conn;
	
		$query = "SELECT * FROM views_count WHERE house_id = $house_id AND people_id = $people_id";
		$query_run = mysqli_query($conn, $query);
		
		if($query_run){
			
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows == 0){
				$query_2 = "INSERT INTO views_count VALUES ('', $house_id, $people_id)";
				$query_run_2 = mysqli_query($conn, $query_2);
		
			}else{
				//echo 'user viewed already';
			}
		}else{
			echo 'query failed';
		}
	}

	function views_count($house_id){
		global $conn;
		$query = "SELECT * FROM views_count WHERE house_id = $house_id";
		$query_run = mysqli_query($conn, $query);
		$views = $query_num_rows = mysqli_num_rows($query_run);
		
		return $views;
	}

	function query_profile_student($status, $user_id){
			global $conn;
			
			$query = "SELECT * FROM houses 
			JOIN people_house ON houses.id = people_house.house_id 
			JOIN people ON people_house.student_id = people.id  
			WHERE status = '".$status."' AND people_house.student_id =".mysqli_real_escape_string($conn, $user_id);

		$query_run = mysqli_query($conn, $query);
		if($query_run){
			
			$query_num_rows = mysqli_num_rows($query_run);
			switch($status){
					
				case 'interested':
				echo "<table><h3>Interested List</h3>";
				$empty_list = 'interested';
				break;
			
				case 'accept':
				echo "<table><h3>Accepted List</h3>";
				$empty_list = 'accepted';
				break;

				case 'taken':
				echo "<table><h3>Taken List</h3>";
				$empty_list = 'taken';
				break;
		}

			
			if($query_num_rows > 0){
				
				echo '<td>';
				while($result_house_people = mysqli_fetch_assoc($query_run)){
							
							
							$output = '<td><a href="house.php?id='.$result_house_people['house_id'].'">';


							$output .= '<img src="'.$result_house_people['images'].'" height="200" width="200" ></a>';

							echo $output .= '<a href="house.php?id='.$result_house_people['house_id']
									.'"><h3>View Details</h3></a></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
							

					
				
				}
				echo '</td></tr></table>';
				
			}else {
					echo 'No houses on '.$empty_list.' list.';
			}

	
		}else{
			echo  'Not Ok';
		}
	}

	function query_profile_landlord($status){
		global $conn;
		global $user_id;
		global $house_ID;

		$query = "SELECT * FROM houses 
				JOIN people_house ON houses.id = people_house.house_id 
				JOIN people ON people_house.student_id = people.id  
				WHERE status = '".$status
				."' AND houses.landlord_id =".mysqli_real_escape_string($conn, $user_id)
				." AND houses.id = $house_ID";

				$query_run = mysqli_query($conn, $query);
				if($query_run){
					$num_rows = mysqli_num_rows($query_run);
				}else{
					echo 'not cool';
				}
				return $num_rows;
	}


	function query_house_landlord($status){
					global $conn;
					global $house_id;
					global $landlord_id;
					$view_student = 'If would like to know more about the students please click their names inorder to view their profiles.';

					$query = "SELECT * FROM houses 
						JOIN people_house ON houses.id = people_house.house_id 
						JOIN people ON people_house.student_id = people.id  
						WHERE status = '".$status."' AND houses.id = '$house_id'";
	
	
					if($query_run = mysqli_query($conn, $query)){

						switch($status){
						
							case 'interested':

								$hidden_value = 'accept';
								$submit_value = 'Accept';
								$inc_word = 'interested';
								$statement = 
								'If you would like to accept the request by the student for a place please click the accept button';
								
								echo '<h3>Interested List</h3><br>';
								break;

							case 'accept':

								$hidden_value = 'taken';
								$submit_value = 'Taken';
								$inc_word = 'accepted';
								$statement = 
								'If you have received payment from the student for a place please click the taken button';
								echo '<h3>Accepted List</h3><br>';
								break;
						
							case 'taken':

								$hidden_value = '';
								$submit_value = '';
								$inc_word = 'taken';
								$statement = 'Student has taken a place in you house';
								echo '<h3>Taken List</h3><br>';
								break;
						}
										
						if(mysqli_num_rows($query_run) > 0){
	
							echo '<ol>';
							echo $statement;
							while($result_house_people = mysqli_fetch_assoc($query_run)){
				
								
					


								
								$output = '<li><br>'
									//.'<img src="'.$result_house_people['profile_image'].'"'
									//.'alt="profile picture" height="150" width="150"><br>'
									.'Name: <a href="profile.php?user_id='.$result_house_people['student_id'].'">'
									.$result_house_people['name'].' '.$result_house_people['surname'].'</a><br>'
									.'Status: '.$result_house_people['landlord_student'].'<br>'
									.'College: '.$result_house_people['college'].'<br>'
									//.'Program: <br>'.$program<br>
									.'Sex: '.$result_house_people['sex'].'<br>';
									//.'Age: '.$result_house_people['age'].'<br>';

							

								if($status == 'interested' || $status == 'accept'){  
									
										
									   

	  									
									$output.= '<form action="status.php" method="POST">'
										.'<input type="hidden" name="status" value="'.$hidden_value.'">'
										.'<input type="hidden" name="house_id" value="'.$house_id.'">'
										.'<input type="hidden" name="landlord_id" value="'.$landlord_id.'">'
										.'<input type="hidden" name="student_id"' 
										.'value="'.$result_house_people['student_id'].'">'
										.'<input type="submit" value="'.$submit_value.'"></form>';
								  }  
								echo $output.= '</li>';

							}
							echo '</ol>';	
							echo $view_student.'<br>';
						}else{ 
						echo "No people on $inc_word list <br><br>";
						}	


 					} else{

			echo 'query did not run';
					}



	}	

		function display_house($query,$get_var=null, $get=null, $href=null ){
			
			
			global $conn;
			global $items_per_page;
			global $current_page;
			global $pagination;

			
			
			$query_run = mysqli_query($conn, $query);
			if($query_run){
			
				$query_num_rows = mysqli_num_rows($query_run);
			}
			if($query_num_rows > 0){
			$total_items = $query_num_rows;

			$total_pages = ceil($total_items/$items_per_page);
			if(!empty($get_var) && !empty($get) && !empty($href) ){

			
			 $offset = ($current_page - 1) * $items_per_page  ;
			 $limit = $items_per_page    ;
			
			
			
			

			

			if($current_page > $total_pages){

			header('Location: '.$href.$get.'='.$get_var.'&pg='.$total_pages);
			}

			if($current_page < 1){

			header('Location: '.$href.$get.'='.$get_var.'&pg=1');
			}
			
		
			
			
			$query .= ' LIMIT '.$limit.' OFFSET '.$offset ;
			}
			
			$query_run = mysqli_query($conn, $query);
			if($query_run){
			
			$query_num_rows = mysqli_num_rows($query_run);
			
			
			if($query_num_rows > 0){
				echo'<td>';
				
			
				while($result_house_people = mysqli_fetch_assoc($query_run)){
						
							
							$output = '<div class="spe"><td><a href="house.php?id='.$result_house_people['id'].'">';


							$output .= '<img src="'.$result_house_people['images'].'" height="200" width="200" ></a>';

							$output .= '<h3>Specifications</h3>';
							
							$output .= "Rooms: ".$result_house_people['rooms']."<br>";
							$output .= "Price: US$ ".$result_house_people['price']."<br>";
							$output .= "Address: ".$result_house_people['address']."<br>";
							$output .= "Status: ".($result_house_people['capacity']-$result_house_people['occupied']); 
							$output .= " places available Now out of ".$result_house_people['capacity']." places <br>";
							$output .= "Views: ".views_count($result_house_people['id'])."<br>";
							$output .= '<a href="house.php?id='.$result_house_people['id'].'">';
							$output .= '<h3>View Details</h3></a>';
							
							echo $output .= '</div></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
							
							



					
				}echo '</td></tr></table>';
				
			
				 echo pagination($href,$get_var, $get,$total_pages) ;
				
			}else {	echo "No results found";}	
		}else{
			echo  'Not Ok';
		}
		}else {	echo "No results found";}		
				}

	function get_count($search = null){

}

		function pagination($href=null, $get_var=null, $get=null,$total_pages){
			 
			global $current_page;

			  $total_pages;
			  $current_page;
			 
			$pagination = '<div class="pagination">Pages: ';

			for($i = 1; $i <= $total_pages ; $i++){

				if($i == $current_page){
					$pagination .= "<span>$i</span>";
				}else{
					$pagination .= '<a href="'.$href;
					if(!empty($get_var)){
						$pagination .= $get.'='.$get_var.'&';
					}
					$pagination .= 'pg='.$i.'">'.$i.'</a></div>';
					
				}

			}
		return $pagination;

		}
?>
