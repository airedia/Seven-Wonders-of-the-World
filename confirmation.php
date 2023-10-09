<?php 


$servername= "localhost";

$username= "root";

$password = "";

$database = "historical_booking";

$conn = mysqli_connect($servername, $username, $password, $database);
session_start();

// Check connection




?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Prototype for a site to book a place in the queue for one of the Seven Wonders of the World">
<meta name="keywords" content="Angela Iredia, Prototype, Seven Wonders of the World, Virtual Queues, Historical Sites, Monuments, UI">
<meta name="author" content="Angela Iredia">

<!-- Bootstrap framework  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
<title>Seven Wonders of the World - Prototype to book your place in the queue (Booking confirmation)</title>

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->	
<link rel="stylesheet" type="text/css" href="styles/design.css" /> 

<!-- Ajax and Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- image for hambuger menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header>	

	
 
<div class="topnav" id="myTopnav">
  <a href="#booking" class="active">Your Booking</a>
  <a href="index.php">Homepage</a>
  <a href="retrieve.php">Other Bookings</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a> 
  <img src="images/Historal-1.png" alt="logo" style="float:right; height:50px; margin-right:7%;">
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
	  
  </header>	
	
	
	
<body>
<div class="row">
	
	
	
	<div class="col-sm-12">
		<div class="parallax_5">
			<br>
	<h1> Confirmation </h1>
	 </div>	
		
		
		<div class="section_banner_5"> 
<?php
	$session_name = $_SESSION['booking_user'];
	$session_site = $_SESSION['booked_site'];
	$session_time = $_SESSION['time'];
			
	$query = "SELECT `Name`, `ID` FROM `$session_site` WHERE `Name`= '$session_name' AND  `Time`= '$session_time' ";

	$result = mysqli_query($conn, $query);
		   

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
		$id = $row["ID"];
		echo"<br> <h2> Hello $session_name, your ticket ID is $id <br> Please keep this number in a secure place </h2> <br>";
		echo"<p>Your booking is confirmed. <br> To retrieve it and edit it, go <a href='retrieve.php'>here</a></p> ";
		session_destroy();	
		}
	}else{
		echo"To retrieve your booking and edit it, go <a href='  '>here</a></p> ";
	}

	
	
			
			?>
		
			</div>
		</div>
	</div>
	</body>

<footer>
<div class="links">
	<div class="row">	
<div class="col-sm-12">
	 <a href="https://uk.linkedin.com/in/angela-iredia"> About the Author </a>
	<a href="https://goo.gl/maps/37aJe7hkfBaW8xyR7">Location</a>
</div>
	</div>	
	</div>

	
	</div>
	</footer>	
	
		
</html> 
	
	
	
	
