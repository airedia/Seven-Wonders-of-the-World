<?php 


$servername= "localhost";

$username= "root";

$password = "";

$database = "historical_booking";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {

    echo "Connection failed!";

}

session_start();


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
	
<title>Retrieve Booking</title>

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->	
<link rel="stylesheet" type="text/css" href="styles/design.css" /> 

<!-- Ajax and Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- image for hambuger menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header>	

	
 
<div class="topnav" id="myTopnav">
  <a href="#booking" class="active">Retrieve Your Booking</a>
  <a href="index.php">Homepage</a>
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

    <div class="parallax_6">
			<br>
	<h1> Find Your Booking </h1>
	 </div>	

		
     <div class="section_banner_6"> 
      <br>
      <p>Retrieve your booking here</p>
  <div id="retrieve_data">
    <form action="" method="POST" id="RetrieveForm">

      <br>
      <legend>Name on the Booking</legend>
      <input type="text" name="name" id="name" required style="align-content: center; text-align: center;"> <br><br>

      <legend>Historical Site</legend>
        <select name="sites" id="sites" required>
        <option value="Colosseum, Italy">Colosseum, Italy</option>
        <option value="Petra, Jordan">Petra, Jordan</option>
      <option value="Great Wall, China">Great Wall, China</option>
      <option value="Machu Picchu, Peru">Machu Picchu, Peru</option>
	  <option value="Taj Mahal, India">Taj Mahal, India</option>
	  <option value="Chichen Itza, Mexico">Chichen Itza, Mexico</option>
	  <option value="Great Pyramid, Egypt">Great Pyramid, Egypt</option>
   </select>
	<br><br>

      <legend>Ticket Number/ID</legend>
      <input type="number" name="ID" id="name" required> <br><br>

      <input type="submit" id="submit" name="submit" value="Retrieve" onclick="myFunction1()">
      <script>
        document.getElementById("name").style.borderRadius = "25px";
        </script>

</form>

<?php


if (isset($_POST["submit"])){
  $name = $_POST['name'];
  $id = $_POST['ID'];
  $site = $_POST['sites'];

  $query= "SELECT `Time`, `Date`, `Name`, `Number_people`, `ID` FROM `$site` WHERE `Name`='$name' AND `ID`='$id' ";
  $result = mysqli_query($conn, $query);

  
  if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
      $name = $row['Name'];
      $id = $row['ID'];
      $date = $row['Date'];
      $time = $row['Time'];
      $num_people = $row['Number_people'];

      $msg = "<br>"."<h2>"." ".$name."</h2>"."Site: "."$site"."<br>"."Your Ticket Number/ID: ".$id."<br>"."Date: ".$date."<br>"."Time: ".$time."<br>"."Number of People: "." ".$num_people."<br>" ;
      $html_delete = "<form action='' method='POST'> <input type='hidden' name='name' value='$name'> <input type='hidden' name='ID' value='$id'> <input type='hidden' name='sites' value='$site'>  <input type='submit' id='delete' name='delete' value='Delete' onclick='deleteBooking()'> </form>";
      
      
    }
  }else{
    $html_retrieve = "<form action='' method='POST'> <input type='submit' id='delete1' name='Retrieve1' value='Retrieve' onclick='retrieveBooking()'> </form>";
    $msg = "<br> Not found <br>";
  }

}

if (isset($_POST["delete"])){
  $name = $_POST['name'];
  $id = $_POST['ID'];
  $site = $_POST['sites'];
  $sql="DELETE FROM `$site` WHERE `Name`='$name' AND `ID`='$id'";
  $result_d = mysqli_query($conn, $sql);

  if ($result_d===TRUE){
    $html_retrieve = "<form action='' method='POST'> <input type='submit' id='delete1' name='Retrieve1' value='Retrieve' onclick='retrieveBooking()'> </form>";
    $msg="<br>"."<br>"."<h2>"."Booking deleted successfully"."</h2>";
  echo"$msg";
  }else{
    $msg="<br>"."<br>"."<h2>"."There are some issues now, please try again later"."</h2>";
    echo"$msg";
  }
}




if (empty($msg)){
	echo"";
}else{
echo" <script>
function myFunction1() {
  var x = document.getElementById('RetrieveForm');
  if (x.style.display === 'none') {
    x.style.display = 'none';
  } else {
    x.style.display = 'none';
  }
}

function deleteBooking() {
  var form = document.querySelector('form');
  var xhr = new XMLHttpRequest();
  xhr.open('POST', form.action, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = xhr.responseText;
      var result = document.getElementById('retrieve_data');
      result.innerHTML = response;
    } else {
      console.log('Request failed.  Returned status of ' + xhr.status);
    }
  };
  xhr.send(new FormData(form));
  var formContainer = document.getElementById('form_container');
  formContainer.style.display = 'none';
}
 

function retrieveBooking() {
  var form = document.getElementById('RetrieveForm');
  if (form.style.display === 'none') {
    form.style.display = 'block';
  } else {
    form.style.display = 'none';
  }
}

document.getElementById('retrieve_data').innerHTML = '$msg';
</script>
"."<br>".$html_delete.$html_retrieve;

}

?>

</div>
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
	
	