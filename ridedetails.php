<!DOCTYPE html>
<?php require_once('connect.php');
$rideid = $_GET["id"];
$q = mysqli_query($db, "select * from ride where ride_id=$rideid") or die(mysqli_error($db));
while($row = mysqli_fetch_assoc($q)){
	$from = $row["ride_from"];
	$to = $row["ride_dest"];
	$date = $row["ride_date"];
	$time = $row["ride_time"];
	$capacity = $row["ride_capacity"];
	$price = $row["ride_price"];
	$drv_id = $row["ride_drvid"];
	$car_id = $row["ride_carid"];
}
$cquery = mysqli_query($db, "select * from car where car_id='$car_id'") or die (mysqli_error($db));
while($row = mysqli_fetch_assoc($cquery)){
	$carname = $row["car_name"];
	$carplate = $row["car_plate"];
	$carcolor = $row["car_color"];
}
$dquery = mysqli_query($db, "select * from driver where drv_id='$drv_id'") or die (mysqli_error($db));
while ($row = mysqli_fetch_assoc($dquery)){
	$usrid = $row["drv_usrid"];
	$chat = $row["drv_chat"];
	$smoking = $row["drv_smoking"];
	$pets = $row["drv_pets"];
	$music = $row["drv_music"];
}
$uquery = mysqli_query($db, "select * from user where usr_id='$usrid'") or die(mysqli_error($db));
while ($row = mysqli_fetch_assoc($uquery)){
	$usrname = $row["usr_name"];
	$usrimg = $row["usr_img"];
}
?>
<html>
<head>
	<title>Petra Ride Sharing</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/nouislider.css"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>	
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet">

	<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
      	height: 100%;
      	margin-left: 0px;
      	margin-right: 0px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
      	height: 100%;
      	margin: 0;
      	padding: 0;
      }


      #mode-selector {
      	color: #fff;
      	background-color: #4d90fe;
      	margin-left: 12px;
      	padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
      	font-family: Roboto;
      	font-size: 13px;
      	font-weight: 300;
      }

  </style>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGWTiEsKVoQekrR3qQmcTgTyBk-eP2ca4&libraries=places&callback=initMap"
  async defer></script>
  <?php  
  echo "<script>
  	function initMap() {
  		var markerArray = [];

        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;

        // Create a map and center it on Manhattan.
        var map = new google.maps.Map(document.getElementById('map'), {
        	zoom: 13,
        	center: {lat: 40.771, lng: -73.974}
        });

        // Create a renderer for directions and bind it to the map.
        var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;

        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute(
        	directionsDisplay, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
        var onChangeHandler = function() {
        	calculateAndDisplayRoute(
        		directionsDisplay, directionsService, markerArray, stepDisplay, map);
        };
        
    }

    function calculateAndDisplayRoute(directionsDisplay, directionsService,
    	markerArray, stepDisplay, map) {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
        	markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
        	origin: '$from',
        	destination: '$to',
        	travelMode: 'DRIVING'
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
          	document.getElementById('warnings-panel').innerHTML =
          	'<b>' + response.routes[0].warnings + '</b>';
          	directionsDisplay.setDirections(response);
          	showSteps(response, markerArray, stepDisplay, map);
          } else {
          	window.alert('Directions request failed due to ' + status);
          }
      });
    }

    function attachInstructionText(stepDisplay, marker, text, map) {
    	google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
      });
    }
</script>";
?> 
</head>
<body class="container" style="background-color: #e0e0e0;">
	<header>
		<nav class="light-blue darken-1" role="navigation">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo" style="font-family: 'Quicksand', sans-serif;"><img src="img/logoo.png" style="height: 65px;width: 270px;margin: 0px;padding-left: 6px;"></a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="font-family: 'Quicksand', sans-serif;">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="findride.php" style="font-family: 'Quicksand', sans-serif;">Find Ride</a></li>
					<?php  
					if ($_SESSION["stat"] == '2'){
					  echo "<li><a href='offerride.php' style='font-family: 'Quicksand', sans-serif;'>Offer Ride</a></li>";
					}
					?>
					<li>
						<a class='dropdown-trigger' href='#' data-target='dropdownweb' style="font-family: 'Quicksand', sans-serif;">
							My Account
							<i class="material-icons right">arrow_drop_down</i>
						</a>
						<ul id='dropdownweb' class="dropdown-content">
							<li><a href="profile.php" style="font-family: 'Quicksand', sans-serif;">Profile</a></li>
							<li><a href="setting.php" style="font-family: 'Quicksand', sans-serif;">Settings</a></li>
							<li><a href="logout.php" style="font-family: 'Quicksand', sans-serif;">Logout</a></li>
						</ul>
					</li>  

				</ul>


				<ul id="mobile-demo" class="sidenav">
					<li><a href="findride.php" style="font-family: 'Quicksand', sans-serif;">Find Ride</a></li>
					<?php  
					if ($_SESSION["stat"] == '2'){
					  echo "<li><a href='offerride.php' style='font-family: 'Quicksand', sans-serif;'>Offer Ride</a></li>";
					}
					?>
					<li>
						<a class='dropdown-trigger' href='#' data-target='dropdownmobile' style="font-family: 'Quicksand', sans-serif;">
							My Account
							<i class="material-icons right">arrow_drop_down</i>
						</a>
						<ul id='dropdownmobile' class="dropdown-content">
							<li><a href="profile.php" style="font-family: 'Quicksand', sans-serif;">Profile</a></li>
							<li><a href="setting.php" style="font-family: 'Quicksand', sans-serif;">Settings</a></li>
							<li><a href="logout.php" style="font-family: 'Quicksand', sans-serif;">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>  
	</header>

	<main>
		<!-- ISI -->
		<div>

			<div class="z-depth-1" style="height:60px;padding:10px;">

				<a style="font-size:16pt;font-weight:bold;">Ride Details: </a>
			</div>

			<div class="row z-depth-2">
				<div class="white col s8 z-depth-2" style="padding:10px;height:300px" >
					<?php
					echo"<div class = ' col s4'>
					<p style='font-size:18 px; font-color:black; font-weight:bold;height:80px;'>From </p>
					<p style='font-size:18 px; font-color:black; font-weight:bold;height:80px;'>To </p>
					<p style='font-size:18 px; font-color:black; font-weight:bold;height:80px;'>Depature Date </p>
					</div>
					<div class = 'col s8'>
					<p id='from' style='font-size:18 px; font-color:black;height:80px;font-weight:bold'> :  $from</p>
					<p id='to' style='font-size:18 px; font-color:black; font-weight:bold;height:80px;'> : $to</p>
					<p id='depature' style='font-size:18 px; font-color:black; font-weight:bold;height:80px;'> : $date</p>
					</div>";
					?>

				</div>
				<div class="grey lighten-2 col s4 " style="height:300px">
					<div class="white col s6 z-depth-1" style="padding:30px;height:200px;text-align:center;">
						<p style="font-size:16pt;font-weight:bold">IDR </p>
						<p id="harga" style="font-size:16pt;font-color:blue;font-weight:bold"><?php echo"$price";?></p>
						<p style="font-size:10pt;">Per Passenger</p>
					</div>
					<div class="white col s6 z-depth-1" style="padding:30px;height:200px;text-align:center;">
						<p style="font-size:16pt;font-weight:bold">Seats </p>
						<p id="seats" style="font-size:16pt;font-color:blue;font-weight:bold;"><?php echo"$capacity";?></p>
						<p style="font-size:10pt;">Available Seats</p>
					</div>
					<div class="white col s12 z-depth-1" style="height:100px; ">
						<div class="col s4 offset-s4" style="padding-top: 30px;">
						<button class="btn waves-effect waves-light valign-wrapper center light-blue darken-1" style="align:center;" type="submit" name="action">BOOK NOW
						</div>
					</div>
					</div>
				</div>

				<div class="row">
					<div class="z-depth-1 col s8" style="height:60px;padding:10px;">
						<a style="font-size:16pt;font-weight:bold;">Car Details</a>
					</div>
					<div class="z-depth-1 col s4 " style="height:60px;padding:10px;">
						<a style="font-size:16pt;font-weight:bold;">Car Owner</a>
					</div>

					<div class="row z-depth-2">
						<div class ="white col s8 z-depth-2">
							<div class = "col s4">
								<p style="font-size:18 px; font-color:black; font-weight:bold;height:50px;">Car  </p>
								<p style="font-size:18 px; font-color:black; font-weight:bold;height:50px;">Car share preferance </p>
								<p style="font-size:18 px; font-color:black; font-weight:bold;height:50px;">Plate No. </p>
							</div>
							<div class = "col s8">
								<p id="car" style="font-size:18 px; font-color:black;height:50px;font-weight:bold;">: &nbsp;&nbsp;<?php echo "$carname ($carcolor)";?></p>
								<p id="preference" style="font-size:18 px; font-color:black; font-weight:bold;height:50px;font-weight:bold;">: &nbsp;&nbsp;<span class='tooltipped' data-position='top' data-tooltip='No smoking please' style='width:auto;'>
									<img src="img/preference/no_smoking.jpg" width="41" height='32' style='border-style: groove;''>
								</span>
								<span class='tooltipped' data-position='top' data-tooltip='No pets in vehicle please'>
									<img src='img/preference/no_pets.jpg' width='41' height='32' style='border-style: groove;'>
								</span>
								<span class='tooltipped' data-position='top' data-tooltip='Chat depending on mood'>
									<img src='img/preference/moderate_chat.jpg' width='41' height='32' style='border-style: groove;'>
								</span>
								<span class='tooltipped' data-position='top' data-tooltip='I love music'>
									<img src='img/preference/yes_music.jpg' width='41' height='32' style='border-style: groove;'>

								</span>
								<span class='tooltipped' data-position='top' data-tooltip="I'm ok with man or woman">
									<img src='img/preference/couple.png' width='41' height='32' style='border-style: groove;'>

								</span></p>
								<p id="plate" style="font-size:18 px; font-color:black;height:50px;font-weight:bold;">: &nbsp;&nbsp;<?php echo "$carplate";?> </p>
							</div>
						</div>
						<div class ="white col s4 z-depth-2" style="padding:10px; height:210px">
							<div class = "col s4">
								<img src="img/profile/<?php echo "$usrimg";?>" alt="" class="circle responsive-img" style="height:70px">
								<p id="email" style="font-size:11pt; font-color:black; font-weight:bold;height:auto;"> Email </p>
								<p id="phone" style="font-size:11pt; font-color:black;font-weight:bold;height:auto;"> Phone </p>
								<p id="id" style="font-size:11pt; font-color:black;font-weight:bold;height:auto;"> ID </p>
							</div>
							<div class = "col s8" >
								<p id="name" style="font-weight: bold; font-color:black;height:10px; font-size:14pt;"><?php echo "$usrname";?></p>
								<p id="rating" style="font-color:black;height:0px; font-size:10pt;">Ratings:&nbsp;&nbsp;<i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star_half</i><i class='tiny material-icons' style='color:#FFD946;'>star_border</i></p>

								<div class = "col s2">
									<div style="height:35 px;margin-top:25px;padding:2px">
										<i class="material-icons prefix" style="color:green;">verified_user</i>
									</div>
									<div style="height:35 px; padding:2px;">
										<i class="material-icons prefix" style="color:green;">verified_user</i>
									</div>
									<div style="height:35 px; padding:2px">
										<i class="material-icons prefix" style="color:green;">verified_user</i>
									</div>
								</div>

								<div class = "col s10">
									<div style="height:35px;margin-top:25px;">
										<span>Verified</span>
									</div>
									<div style="height:35px;">
										<span>Verified</span>
									</div>
									<div style="height:35px;">
										<span>Verified</span>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="z-depth-3 col s12" style="height:60px;padding:10px;">
						<a style="font-size:16pt;font-weight:bold;">Route Map</a>
					</div>

					<div class ="white col s12 z-depth-2" style="height:300px;padding:0px;">
						<div id="map"></div>
						&nbsp;
						<div id="warnings-panel"></div>


					</div>


				</div>




			</div>
			<!-- ISI END -->
		</main>
		<!-- FOOTER -->
		<footer class="page-footer light-blue darken-1">
			<div class="container">
				&copy; Copyright 2018
			</div>
		</footer>
		<!-- FOOTER END -->

		<!--JavaScript at end of body for optimized loading-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<!-- <script type="text/javascript" src="js/wNumb.js"></script> -->
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/init.js"></script>
		<script type="text/javascript">
			var harga = document.getElementById("harga").textContent;
			harga = parseInt(harga);
			document.getElementById("harga").textContent = harga.toLocaleString();
		</script>
	</body>
	</html>