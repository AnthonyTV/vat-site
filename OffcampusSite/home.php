<?php
	$title = 'Home';
 	include 'header.php'; 

	$pics = array("mm_training_photo.jpg","8b5530268ad5eb995e209f997e38cec5.jpg","images/luxury-homes-real-estate-with-luxury-real-estate-luxury-homes-for-sale-luxury.jpg"); //randomly changes pics when page is refreshed
	$rand_num = rand(0,2);

?>
	
	
	
	
	
	<div id="content2" bgcolor="#26354A"><img src="<?php echo $pics[$rand_num]; ?>" alt="Home Page Image" width="417" height="420" border="0" /><br/>
		<section class="sidebarText2" id="padding22"><a href="home.php">Next Event &gt;</a></section> <br/>
		Mount Pleasant.<br />
</div>

	<section id="middle2" bgcolor="#d3dce6">
<?php if(!isset($_GET['view']) && empty($_GET['view']) && !isset($_GET['search']) && empty($_GET['search'])){ ?>
	  <p align="center" class="style1">VAT OffCampus Life, where all your accommodation needs are met</p>
	  <p align="center" class="style2">Welcome to VAT OffCampus Life </p>
	  <p>Here we are motivated by the need to provide good and quality technology to enable students to comfortably apply and pay for off campus accommodation. Landlords are required to register their homes with us by contacting us (make use of contacts page) and registering for a very small fee.</p>
		<p>VAT OffCampus Life is the new way of doing things, why waste money and resources travelling to check out the accommodation places? With this new technology your accommodation for the semester is just one click away. Life can't be any easier then this.</p>
		<p>There is no need to worry about bogus homes for our team will validate and verify the registration of landlords in the various places. Your accommodation booking is safe in our hands. </p>
<p><a href="home.php?view=yes">Click to view some of the available accomodation</a><p>
		<p>&nbsp;</p>
<?php 
}
		if(isset($_GET['search']) && !empty($_GET['search'])){

			if(loggedin()){

				$search = htmlspecialchars($_GET['search']);
				echo "<table><tr><h3> Search for <u>".$search."</u></h3>";
			
				$query = "SELECT * FROM houses WHERE address LIKE '%".mysqli_real_escape_string($conn, $search)."%'";

						display_house($query,$search,'search','home.php?');

				
			}else{

				echo '<br><br>Please log in to view search results';
			}
		}else if(isset($_GET['view']) && !empty($_GET['view'])){ ?>

<table><tr><h2>Some of the available accomodation</h2><td>

	<?php 

	
	
		
		
		
		$query_2 = "SELECT * FROM houses ORDER BY RAND() LIMIT 3 ";

				display_house($query_2);

	

		


	} 
?>
	<?php include 'footer.php'; ?>
	</section>



</body>
</html>
