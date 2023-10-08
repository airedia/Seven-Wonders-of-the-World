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


if (isset($_POST["submit"])){
	
$site = $_POST["sites"];
$date = $_POST["bookslot"];
$num_people = $_POST["numpeople"];
$name = $_POST["name"];
$time = $_POST["timeslot"];

#echo $site;
$query_s = "SELECT `Time`, `Date`, `Number_people` FROM `$site` ";
$result_s = mysqli_query($conn, $query_s);
	

	if (mysqli_num_rows($result_s) > 0) {
		while($row = mysqli_fetch_assoc($result_s)){
			$time_x = date('H:i', strtotime($row['Time']));
			$date_x = $row['Date'];
			#$number_p = explode(',', $row['Number_people']);
			$selected_date = $date;
			$selected_time = $time;

			if (!is_array($time_x)) {
				$time_x = explode(',', $time_x);
			}
			foreach($time_x as $value){
				if ($value == $selected_time && $date_x == $selected_date){ 
						$msg = "<div style='color:red;'> Timeslot not available. Pick another time </div>";	
						}else{
							$query = "INSERT INTO `$site` (`Name`, `Date`, `Time`, `Number_people`) VALUES ('$name', '$date', '$time', '$num_people')";
							$result = mysqli_query($conn, $query);	
							if ($result === TRUE)  {
								$_SESSION['booking_user'] = $name;
								$_SESSION['booked_site'] = $site; 
								$_SESSION['time'] = $time;
								header('location: confirmation.php');
							}else{
								$error = "Booking not recorded. Please, try again";
								$msg=" <div style='color:red;'> <br>  $error </div>".$conn->error;	
							}
							}	
						}
		}		
		
	}else{
		$query = "INSERT INTO `$site` (`Name`, `Date`, `Time`, `Number_people`) VALUES ('$name', '$date', '$time', '$num_people')";
		$result = mysqli_query($conn, $query);	
		if ($result === TRUE)  {
			$_SESSION['booking_user'] = $name;
			$_SESSION['booked_site'] = $site; 
			$_SESSION['time'] = $time;
			header('location: confirmation.php');
		}else{
			$error = "Booking not recorded. Please, try again";
			$msg=" <div style='color:red;'> <br>  $error </div>".$conn->error;	
		}

}

	}
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
	
<title>Homepage</title>

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->	
<link rel="stylesheet" type="text/css" href="styles/design.css" /> 

<!-- Ajax and Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- image for hambuger menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
	
	
<header>	
<div class="row">
<div class="col-sm-12"> 
 
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#about">About</a>
  <a href="#sites">Historical Sites</a>
   <a href="#book">Book</a>
   <a href="retrieve.php">Tickets</a>
  <a href="#contact">Contact</a>
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
	  </div>
	  </div>	
  </header>
  
		
<body>

<div class="row">
	
	
<div class="col-sm-12">
<div id="home">	
<div class="parallax">
	<h1>Welcome</h1>
	
	</div>

	
<div class="col-sm-12">
 
<div class="section_banner">
<br> <br>
<img src="images/eco-friendly.png" alt="Unesco" style="height:18%;";>
<img src="images/World_Heritage_Site_logo.png" alt="Unesco" style="height:20%;";>
<img src="images/unesco_logo.png" alt="Unesco" style="height:22%; padding:0;";>
<br><br><br> <h2 style="font-weight:bold;">Historal Booking</h2>
<p>This is the system to book your place in the queue in advance <br> for the 7th Wonders of the World without the hassle to wait <br> inside physical queue for hours</p>
</div>
	</div>
</div>	
</div>
	

<div class="col-sm-12">	
<div id="about">	

<div class="parallax_1">  
	<h1>About</h1>
	</div>
	
	
<div class="col-sm-12">
 
<div class="section_banner_1">
	<br><br>


<div class="row">

<div class="col-sm-1">
</div>

<div class="col-sm-5">	
<h2 style="font-size:45px;">Concept</h2>
<p class="description-site" style="font-size:20px; margin-left:2px;">Historal Booking was first born as a free platform to book 
a place in the queue for historical sites.
It was born because since now many historical sites and museums do not have 
suitable systems to manage the flow of the crowd. 
As a consequence, many historical places have been also damaged. 
To solve this issue, this system has been developed and it considers the suistainability 
as main value. Moreover, by using this system pollution from paper waste can be reduced drastically.
</p>
</div>


<div class="col-sm-6">	
<h2 style="font-size:45px;">Author</h2>
<img src="images/me.png" alt="Author" style="height:30%;">
<p style="font-size:20px; font-weight:bold; margin-bottom:5px;"> Angela Iredia </p>
<p style="font-size:15px;"> 3rd Year Student <br> Bsc(Hons) Digital Media Computing </p>
</div>


</div>


</div>
	</div>
</div>	
	
	
	</div> 



	<div class="col-sm-12">	
<div id="sites">	

<div class="parallax_2">  
	<h1>Historical Sites</h1>
	</div>
	
	

 
<div class="section_banner_2">
	<br>
<div class="row" style="margin-left:5%;">


	<div class="col-sm-3">
	<img src="images/colosseum.png" alt="Colosseum" style="height:200px;";>
<p style="font-size:16px; padding-left:2px;">The Colosseum is an elliptical amphitheatre in the centre of the city of Rome, Italy, just east of the Roman Forum. It is the largest ancient amphitheatre ever built, and is still the largest standing amphitheatre in the world, despite its age. Construction began under the... <a href="https://en.wikipedia.org/wiki/Colosseum">Read</a></p>
</div>

<div class="col-sm-1">
</div>

<div class="col-sm-3">
<img src="images/great-pyramid-logo.png" alt="Great Pyramid" style="height:200px;";>
<p style="font-size:16px; padding-left:2px;"> The Great Pyramid of Giza is the largest Egyptian pyramid and the tomb of Fourth Dynasty pharaoh Khufu. Built in the early 26th century BC during a period of around 27 years, the pyramid is the oldest of the Seven Wonders of the Ancient World, and the only one to remain... <a href="https://en.wikipedia.org/wiki/Great_Pyramid_of_Giza">Read</a></p>
</div>

<div class="col-sm-1">
</div>

<div class="col-sm-3">
<img src="images/machu picchu_logo.png" alt="Machu Picchu" style="height:200px;";>
<p style="font-size:16px; padding-left:2px;">Machu Picchu is a 15th-century Inca citadel located in the Eastern Cordillera of southern Peru on a 2,430-meter (7,970 ft) mountain ridge. Often referred to as the "Lost City of the Incas", it is the most familiar icon of the Inca Empire. It is located in the Machupicchu...  <a href="https://en.wikipedia.org/wiki/Machu_Picchu">Read</a></p>
</div>


</div>

<div class="row" style="margin-left:5%;">
<div class="col-sm-3">
<img src="images/chichen-itza.png" alt="Chichen Itza, Mexico" style="height:200px;";>
<p style="font-size:16px; padding-left:3px;">Chichén Itzá was a large pre-Columbian city built by the Maya people of the Terminal Classic period. The archeological site is located in Tinúm Municipality, Yucatán State, Mexico. Chichén Itzá was a major focal point in the Northern Maya Lowlands from the Late Classic... <a href="https://en.wikipedia.org/wiki/Chichen_Itza">Read</a></p>
</div>

<div class="col-sm-1">
</div>

<div class="col-sm-3">
<img src="images/Taj Mahal_logo.png" alt="Machu Picchu" style="height:200px;";>
<p style="font-size:16px; padding-left:2px;"> The Taj Mahal is an ivory-white marble mausoleum on the right bank of the river Yamuna in Agra, Uttar Pradesh, India. It was commissioned in 1631 by the fifth Mughal emperor, Shah Jahan (r. 1628–1658) to house the tomb of his favourite wife, Mumtaz Mahal; it also houses... <a href="https://en.wikipedia.org/wiki/Taj_Mahal">Read</a></p>
</div>

<div class="col-sm-1">
</div>

<div class="col-sm-3">
<img src="images/petra_logo.png" alt="Machu Picchu" style="height:200px;";>
<p style="font-size:16px; padding-left:2px;"> Petra, originally known to its inhabitants as Raqmu or Raqēmō, is a historic and archaeological city in southern Jordan. It is adjacent to the mountain of Jabal Al-Madbah, in a basin surrounded by mountains forming the eastern flank of the Arabah valley...  <a href="https://en.wikipedia.org/wiki/Petra">Read</a></p>
</div>

</div>



	</div>

</div>	
	
	
	</div> 	


	<div class="col-sm-12">
<div id="book">	


<div class="parallax_3">
	<h1>Book</h1>
	</div>
	
	
<div class="col-sm-12">
 
<div class="section_banner_3">
<br> 
<p> Please, book your slot here </p>

	
	
	
<form action=" " method="post">
	 <legend>Your name</legend>
	<input type="text" id="name" name="name" required style="align-content: center; text-align: center;"> <br><br>
	
  <legend>Historical Site</legend>
  <select name="sites" id="sites" required>
    <option value="colosseum_Italy">Colosseum, Italy</option>
    <option value="petra_jordan">Petra, Jordan</option>
    <option value="great_wall_china">Great Wall, China</option>
    <option value="machu_picchu_peru">Machu Picchu, Peru</option>
	<option value="taj_mahal_india">Taj Mahal, India</option>
	<option value="chichen_itza_mexico">Chichen Itza, Mexico</option>
	<option value="great_pyramid_egypt">Great Pyramid, Egypt</option>
  </select>
	<br><br>
	<legend>Book a slot</legend>
	<!--<span class="datepicker-toggle">
  <span class="datepicker-toggle-button"></span>-->
  <input type="date" id ="bookslot" name="bookslot" max='2023-06-30' min='2023-06-30' class="datepicker-input" required>
	
<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+2; //January is 0!, +2 is the max month one month
var yyyy = today.getFullYear();
var min_month = today.getMonth()+1; // +1 is set to this month. Jan is 0
 if(dd<10){
        dd='0'+dd
    }
	
    if(mm<10){
        mm='0'+mm
    } 
    if(min_month<10){
        min_month='0'+min_month
    } 

max_date = yyyy+'-'+mm+'-'+dd;
min_date = yyyy+'-'+min_month+'-'+dd;
document.getElementById("bookslot").setAttribute("max", max_date);
document.getElementById("bookslot").setAttribute("min", min_date);
	</script>
</span>
<br><br>
<legend>Select a Timeslot</legend>
 <input type="time" id="timeslot" name="timeslot" value = "9:00:00" min="8:30:00" max="19:00:00"> <br><br>

	<legend>Number of people</legend>
	<input type="number" id="numpeople" name="numpeople" max="50" min="1" required>
  <br><br>
	
  <input type="submit" id="submit" name="submit" value="Book Now">
	<script>
		document.getElementById("bookslot").style.borderRadius = "25px";
		document.getElementById("submit").style.borderRadius = "15px";
		document.getElementById("name").style.borderRadius = "25px";
		</script> <br>
	<input type="checkbox"  name="accept" value="accept" required>
<label for="accept" id="accept"> By clicking here, you agree to the terms and condition of this service </label><br>

<?php
if (empty($msg)){
	echo"";
}else{
echo"$msg";	
}
?>
		
	
</form>	
	

	

	
	
</div>
	</div>
</div>	
	</div> 


	<div class="col-sm-12">	
<div id="contact">	


<div class="parallax_4">  
	<h1>Contact</h1>
	</div>
	
	
<div class="col-sm-12">
 
<div class="section_banner_4">
	<br>
<img src="images/email_1.png" alt="email" style="height:20%;"> <br><br>
<p>Angela.Iredia@mail.bcu.ac.uk</p>
<br><br>

<img src="images/location.png" alt="location" style="height:20%;"> <br><br>
<p>Birmingham, West Midlands</p>


</div>
	</div>
</div>	
	</div> 	
	
	
	
<!-- add arrow to go up -->	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="images/arrow_up.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>

	
	</div>
</body>

	
<div class="row">
<div class="col-sm-12">	
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
	</div>

	</footer>	


	</html>