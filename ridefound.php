<!DOCTYPE html>
<?php require_once('connect.php');
$pos = $_GET['position'];
$dest = $_GET['destination'];
$date = $_GET['date'];
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
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet">
	<style type="text/css">
		.noUi-connect {
		    background: #039be5;
		}
		.datepicker__date-display {
		  background-color:blue;
		}
		.datepicker__weekday-display {
		  background-color:red;
		}
		.datepicker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected {
		  background-color:blue;
		}
	</style>
</head>
<body class="container z-depth-2" style="background-color: #e0e0e0;">
	<!-- NAVBAR -->
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
	<!-- ISI -->
	<main>
		<!-- INPUT -->
		<div class = "row valign-wrapper white z-depth-2" style="padding:5px;margin-top:15px;">
			<div class="input-field col s4">
				<i class="material-icons prefix">location_on</i>
				<input id="icon_pos" type="text" class="validate" style="font-family: 'Quicksand', sans-serif;" value='<?php echo"$pos";?>' name="position">
				<label for="icon_pos" style="font-family: 'Quicksand', sans-serif;">Position</label>
			</div>
			<div class="col s2 center-align">
				<button class="btn waves-effect btn-small waves-light light-blue darken-1" style="border-radius: 5px;" type="button" name="action">
					<i class="material-icons">swap_horiz</i>
				</button>
			</div>
			<div class="input-field col s4">
				<i class="material-icons prefix">location_searching</i>
				<input id="icon_dest" type="text" class="validate" name="destination" style="font-family: 'Quicksand', sans-serif;" value='<?php echo"$dest";?>'>
				<label for="icon_dest" style="font-family: 'Quicksand', sans-serif;">Destination</label>
			</div>
			<div class="col s2 center-align">
				<button class="btn waves-effect btn-small waves-light light-blue darken-1" style="border-radius: 5px;font-family: 'Boogaloo', cursive;" type="submit" name="action">Find</button>
			</div>
		</div>
		<!-- INPUT END -->
		<!-- PILIHAN RIDE -->
		<div class="white z-depth-2" style="padding-top:15px;padding-bottom: 15px;">
			<div class="row white" style="padding-left: 10px; padding-right: 10px;">
				<div class="col s4 light-blue lighten-2" style="border-radius: 5px;">

					<h6 style="font-family: 'Quicksand', sans-serif;"><b>Filter : </b></h6>
					<div class="input-field">
						<i class="material-icons prefix" >date_range</i>
						<input id="icon_date" type="text" class="datepicker" name="date">
						<label for="icon_date" style="font-family: 'Quicksand', sans-serif; color: black;">Date</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">access_time</i>
						<input id="time" type="text" class="timepicker" name="time">
						<label for="time" style="font-family: 'Quicksand', sans-serif; color: black;">Time</label>
					</div>
					<div class="input-field">
						<i class="material-icons prefix">airline_seat_legroom_normal</i>
						<input id="seat" type="number" class="" name="seat" min="1" max="6">
						<label for="seat" style="font-family: 'Quicksand', sans-serif; color: black;">Seat</label>
					</div>

					<h6 style="font-family: 'Quicksand', sans-serif;"><b>Time Flexibility</b></h6>
					<h7 style="font-family: 'Quicksand', sans-serif;">Minutes Before</h7><br><br><br>
					<div id="tbefore"></div><br>

					<h7 style="font-family: 'Quicksand', sans-serif;">Minutes After</h7><br><br><br>
					<div id="tafter"></div><br>
				</div>
				<div class="col s8">
					<div class="light-blue darken-1" style="border-radius: 4px; padding: 5px;">Don't Miss Out!</div>
					<h6 style="font-weight:bold;font-family: 'Laila', sans-serif;"> Rides Available: </h6>
					<ul class="collection">
						<?php
						$q = mysqli_query($db, "select * from ride where ride_from='$pos' and ride_dest='$dest'") or die(mysqli_error($db));
						while($row = mysqli_fetch_assoc($q)){
							$rideid = $row["ride_id"];
							$from = $row["ride_from"];
							$to = $row["ride_dest"];
							$dt = $row["ride_date"];
							$time = $row["ride_time"];
							$capacity = $row["ride_capacity"];
							$price = $row["ride_price"];
							$drv_id = $row["ride_drvid"];
							$car_id = $row["ride_carid"];

							$from2 = substr($from, 0, strpos($from, ','));
							$to2 = substr($to, 0, strpos($to, ','));



							$query1 = mysqli_query($db, "select * from driver where drv_id='$drv_id'") or die(mysqli_error($db));
							while ($row1 = mysqli_fetch_assoc($query1)){
								$usr_id = $row1["drv_usrid"];
								$smoking = $row1["drv_smoking"];
								$pets = $row1["drv_pets"];
								$chat = $row1["drv_chat"];
								$music = $row1["drv_music"];
							}
							$usrquery = mysqli_query($db, "select * from user where usr_id='$usr_id'") or die(mysqli_error($db));
							while ($row2 = mysqli_fetch_assoc($usrquery)){
								$usr_name = $row2["usr_name"];
								$usr_img = $row2["usr_img"];
							}

						
							echo "<li class='collection-item avatar'>";
							echo "<img src='img/profile/$usr_img' alt='' class='circle'>";
							echo "<span class='title' style='font-weight: bold;float:right;margin-right: 40px;'><i class='tiny material-icons' style='color: grey;'>date_range</i>&nbsp;$dt<br><i class='tiny material-icons' style='color: grey;'>access_time</i>&nbsp;$time<br><i class='tiny material-icons' style='color: grey;'>timer</i>&nbsp;Estimated Time: 20 Minutes<br><i class='tiny material-icons' style='color: grey;'>airline_seat_legroom_normal</i>&nbsp;Seat Available: $capacity</span>";
							echo "<p><i class='tiny material-icons' style='float: left;color: green;'>location_on</i>From: $from2<br> <i class='tiny material-icons' style='color: red;'>location_on</i>To: $to2<br><i class='tiny material-icons' style='color: grey;'>person</i>Driver Name: $usr_name<br><i class='tiny material-icons' style='color: green;'>attach_money</i>Price: Rp. $price<br><br><span class='tooltipped' data-position='top' data-tooltip='No smoking please' style='width:auto;'>
									<img src='img/preference/no_smoking.jpg' width='41' height='32' style='border-style: groove;''>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='No pets in vehicle please'111>
									<img src='img/preference/no_pets.jpg' width='41' height='32' style='border-style: groove;'>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='Chat depending on mood'>
									<img src='img/preference/moderate_chat.jpg' width='41' height='32' style='border-style: groove;'>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='I love music'11>
									<img src='img/preference/yes_music.jpg' width='41' height='32' style='border-style: groove;'>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='I'm ok with man or woman11>
									<img src='img/preference/couple.png' width='41' height='32' style='border-style: groove;'>

									</span>";
							echo "<button class='btn waves-effect btn-small waves-light right' style='border-radius: 5px; margin-bottom: 10px; margin-right: 40px;font-family: 'Boogaloo';' type='button' name='action'><a class='white-text' href='ridedetails.php?id=$rideid'>Select</a>
							</button><br><br></p></li>";


						}
						?>
					</ul>
				</div>
			</div>
			<!-- PILIHAN RIDE END -->
		</div>
		<!-- ISI END -->
	</main>
	<!-- FOOTER -->
	<footer class="page-footer light-blue darken-1 valign-wrapper">
		<div class="container valign-wrapper">
			&copy; Copyright 2018
		</div>
	</footer>
	<!-- FOOTER END -->

	<!--JavaScript at end of body for optimized loading-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- <script type="text/javascript" src="js/wNumb.js"></script> -->
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.0.4/wNumb.min.js'></script>
	<script type="text/javascript" src="js/nouislider.min.js"></script>
	<script type="text/javascript">
		var slider = document.getElementById('tbefore');
		noUiSlider.create(slider, {
			start: [0],
			connect: 'lower',
			tooltips: [ wNumb({ decimals: 0 }) ],
			range: {
				'min': 0,
				'max': 60
			}
		});

		var slider2 = document.getElementById('tafter');
		noUiSlider.create(slider2, {
			start: [0],
			connect: 'lower',
			tooltips: [ wNumb({ decimals: 0 }) ],
			range: {
				'min': 0,
				'max': 60
			}
		});

		$('.datepicker').datepicker({
			minDate:new Date(),
			disabledDates: [new Date()]

		});

		$('.timepicker').timepicker();

	</script>
</body>
</html>