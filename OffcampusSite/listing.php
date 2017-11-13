<?php
$title = 'Landlords';
include 'header.php'; 

?>
<!DOCTYPE html>
<html>
<head>
<title>Landlords</title>
<link rel="stylesheet"href="listing.css" />
<link rel="stylesheet"href="responsive.css" />

  </head>
  <body>
    <header4>
     <h1 id="listing" >Mount Pleasant listings</h1>
             </header4>
    <div id="wrapper4">
      <section>
        <p></p><br>
	  	<p class="date"></p>
  	 	
	  	 	
	  	<h3 id="listing" class="list">WHY YOU'LL LOVE TO LIST YOUR PROPERTY WITH US</h3>
       
                            
             <table width="820" height="150">
              <tr>
                <td width="250"><img src="images/guarantee-risk-free.png" alt="" width="201" /></td>
                <td width="300">&nbsp;</td>
				<td width="250"><img src="images/time.png" alt="" width="201" height="172" /><img src="mm_spacer.gif" alt="" width="50" height="1" border="0"/></td>
				<td width="250">&nbsp;</td>
                             
              </tr>
                <tr>
                <td><h3 id="listing" >Our Guarantee</h3>
                  <p>We want your experience to be the greatest.</p>
                  <p>This is why our service includes constant engagement with you.</p>
                </td>
                <td><img src="mm_spacer.gif" alt="" width="150" height="1" border="0"/></td>				
					<td> <h3>Save Time and Effort</h3><p>The entire process is conducted online, including viewings!</p>

<p>You can do all from the comfort of home</p> </a></td>
              </tr>
          </table>
      </section><br>
      <p class="date"></p>
      
      <section>
      	<h3 id="listing" >HOW DO I RENT OUT MY PROPERTY?</h3>
      	<table>
      	<tr>
                <td width="496"><img src="images/personal.png" alt="" width="189" height="189" /></td>
                <td width="452" ><img src="images/Keys.png" alt="" width="188" height="172"  /></td>
				
                             
          </tr>
      		<tr>
      		<td><h4  id="listing" > Personal Service</a></h4> 
      		  <p>Schedule a professional visit to your </p>
      		  <p>property at your convenience. </p>
      		  <p>We arrange everything around you</p></td>
      		<td> <h4 id="listing" >You keep in control</h4>
      		  <p>Allocate the available rooms and prices. </p>
      		  <p>Choose your tenant. Manage the process </p>
      		  <p>with the Landlord Panel tool</p></td>      		      			
      		</tr>
      	</table><br>
      	<table>
      	<tr>
                <td width="496"><img src="images/bookings.png" alt="" width="177" height="161" /></td>
                <td width="452" ><img src="images/travel.png" alt="" width="163" height="177"  /></td>
				
                             
          </tr>
      		<tr>
      		<td width="497"> <h4> Receive Booking Requests</h4><p>When a tenant chooses your listing, </p>
      		  <p>we send you a booking request with </p>
      		  <p>information about the tenant. You have </p>
      		  <p>12h to accept or reject the booking request</p></td>
   		  <td width="451"> <h4 id="listing" >Tenant Checks In</h4><p>We put you in contact with the tenant </p>
   		    <p>once the booking is confirmed. </p>
   		    <p>The contract, deposit, and key exchange </p>
   		    <p>is arranged between you and the tenant at check-in</p></td>    </tr>
      	</table>
      	</section>
      	
      	<div><p>Login below if you are already an  account. If you are new <a href="contact.php"><strong>contact us</strong></a>  to add your listing</p></div><br>
      <form action="<?php echo $current_file;?>" method='POST'>
    <div id="listing" class="container4">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container4" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form><br>
        <footer>
        <p>&copy; 2017 All rights reserved. VAT Off-Campus life </p>
      </footer>
  </div>

</body>
</html>
