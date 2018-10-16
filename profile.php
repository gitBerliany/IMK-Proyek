<!DOCTYPE html>
<?php require_once('connect.php');
$usrid = $_SESSION["id"];

$q = mysqli_query($db, "select * from user where usr_id='$usrid'") or die(mysqli_error($db));
while($row = mysqli_fetch_assoc($q)){
	$name = $row["usr_name"];
	$gender = $row["usr_sex"];
	$totride = $row["usr_totalride"];
	$status = $row["usr_status"];
	$image = $row["usr_img"];
	$about = $row["usr_about"];
}

$x = mysqli_query($db, "select * from driver where drv_usrid='$usrid'") or die(mysqli_error($db));
while($row = mysqli_fetch_assoc($x)){
	$driver = $row["drv_id"];
	$smoking = $row["drv_smoking"];
	$pets = $row["drv_pets"];
	$chat = $row["drv_chat"];
	$music = $row["drv_music"];
}
if($status==2){
	$c = mysqli_query($db, "select * from car where car_drvid='$driver'") or die(mysqli_error($db));
	while($row = mysqli_fetch_assoc($c)){
		$carname = $row["car_name"];
		$carplate = $row["car_plate"];
		$carimg = $row["car_img"];
		$carcolor = $row["car_color"];
	}
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
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
	<style>
	.tabs .tab a{
		color:#03a9f4;
		float: left;
		} /*Black color to the text*/

		.tabs .tab a:hover {
			background-color:#03a9f4;
			color:#fff;
			} /*Text color on hover*/

			.tabs .tab a.active {
				background-color:#ffff;
				color:#03a9f4;
				} /*Background and text color when a tab is active*/

				.tabs .indicator {
					background-color:#03a9f4;
					} /*Color of underline*/
				</style>
			</head>
			<body class="container z-dept-2" style="background-color: #f5f5f5;">
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
				<main class="white">
					<!-- ISI -->
					<div class="white">
						<!-- TABS LIST-->
						<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
							<li class="tab"><a href="#mainprofile" style="font-family: 'Quicksand', sans-serif;">Profile</a></li>
							<li class="tab"><a href="#mybookings" style="font-family: 'Quicksand', sans-serif;">My Bookings</a></li>
							<?php  
							if ($_SESSION["stat"] == '2'){
							  echo "<li class='tab'><a href='#ridesoffer' style='font-family: 'Quicksand', sans-serif;''>Rides Offer</a></li>";

							}
							?>
						</ul>
						<!-- END TAB LIST -->
						<!-- ISI TAB -->
					</div>
					<div class="white row" style="padding: 10px;">
						<div class="col s3 grey lighten-2" style="border-radius: 5px; padding: 10px; margin-right: 10px;">
							<div>
								<div class="something" style="padding-top: 5px;padding-left:10px;margin-top: 5px;width: 100%;">
									<i class="material-icons" style="color: green;float: left;">verified_user</i>
									<p style="margin: 0px;font-family: 'Quicksand', sans-serif;">Email verified</p>
								</div>
								<div class="something" style="padding-top: 5px; padding-left:10px; margin-top: 5px;width: 100%;">
									<i class="material-icons" style="color: green;float: left;">verified_user</i>
									<p style="margin: 0px;font-family: 'Quicksand', sans-serif;">Phone Number verified</p>
								</div>
								<div class="something" style="padding-top: 5px;padding-bottom:5px; padding-left:10px;margin-top: 5px;width: 100%;">
									<i class="material-icons" style="color: green;float: left;">verified_user</i>
									<p style="margin: 0px;font-family: 'Quicksand', sans-serif;">ID verified</p>
								</div>
							</div><br>
							<div class="divider grey"></div><br>
							<?php
							if($status==2){
								echo "<div>";
								echo "<b>CAR<br></b>";
								echo "<div class='center-align'><img src='img/car/$carimg' width='180' height='120' class='center-align'></div>";
								echo "<h5 class='center-align'>$carname</h5>";
								echo "<h6 class='center-align'>Color: $carcolor</h6>";
								echo "<h6 class='center-align'>Plate: $carplate</h6>";
								echo "</div>";
							}
							?>
						</div>
						<div id="mainprofile" class="col s9" style="margin-left: -5px; margin-right: -25px;">
							<div class="row grey lighten-2" style="padding: 10px; border-radius: 5px;">
								<?php
								echo"<img src='img/profile/$image' width='150' height='150' class='circle col s3' alt='' style='margin: 5px;'>
								<div class='col s8'>
								<ul>";
								?>
								<li><b><h5 style="font-family: 'Patua One', cursive;"><?php echo"$name" ?></h5></b></li>
								
								<li><h5 style="font-family: 'Patrick Hand', cursive;"><?php echo"$gender" ?></h5></li>
								<li><h5 style="font-family: 'Patrick Hand', cursive;">Total Rides: <?php echo"$totride" ?></h5></li>
								
								<li class='valign-wrapper' style='width:auto;'>
								<p style="padding-top: 0px;margin: 0px;margin-top: 5px;font-size:16pt;font-family: 'Patrick Hand', cursive;">Rating Given: <i class='tiny material-icons' style='color:#FFC946;'>star</i><i class='tiny material-icons' style='color:#FFC946;'>star</i><i class='tiny material-icons' style='color:#FFC946;'>star</i><i class='tiny material-icons' style='color:#FFC946;'>star_half</i><i class='tiny material-icons' style='color:#FFC946;'>star_border</i></p></li>
								<li><span style="font-size:16pt; font-family: 'Patrick Hand', cursive;">Preferences :&nbsp;&nbsp;</span>
								<span class='tooltipped' data-position='top' data-tooltip='No smoking please' style='width:auto;'>
									<img src='img/preference/no_smoking.jpg' width='46' height='37' style='border-style: groove;'>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='No pets in vehicle please'>
									<img src='img/preference/no_pets.jpg' width='46' height='37' style='border-style: groove;'>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='Chat depending on mood'>
									<img src='img/preference/moderate_chat.jpg' width='46' height='37' style='border-style: groove;'>
									</span>
									<span class='tooltipped' data-position='top' data-tooltip='I love music'>
									<img src='img/preference/yes_music.jpg' width='46' height='37' style='border-style: groove;'>

									</span>
									<span class='tooltipped' data-position='top' data-tooltip="I'm ok with man or woman">
									<img src='img/preference/couple.png' width='46' height='37' style='border-style: groove;'>

								</span>
								</li>
					

							</ul>
						</div>
					</div>
					<div class="light-blue lighten-2 row" style="padding: 10px; border-radius: 5px;">
						<h6 class="white-text" style="font-family: 'Patua One', cursive;font-size: 15pt;">About <?php echo "$name";?></h6>
						<p style="font-family: 'Patrick Hand', cursive;font-size: 14pt;">
							<?php echo"$about"; ?> 
						</p>
					</div>
				</div>

				<div id="mybookings" class="col s9" style="margin-left: -5px; margin-right: -25px;">
					<div class="white">
						<!-- TABS LIST-->
						<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
							<?php
							if($_SESSION["stat"] == 2){
								echo "<li class='tab'><a href='#asdriver' style='font-family: 'Quicksand', sans-serif;''>As a Driver</a></li>";
							}
							?>
							<li class="tab"><a href="#asrider" style="font-family: 'Quicksand', sans-serif;">As a Rider</a></li>
						</ul>
						<!-- END TAB LIST -->
						<!-- ISI TAB -->
					</div>
					<?php
					if($_SESSION["stat"] == 2){

						echo "<div id='asdriver' style='margin-top: 10px;margin-bottom: 10px;'>";
						$ad = mysqli_query($db, "select * from ride where ride_drvid='$driver'") or die(mysqli_error($db));

						while($row = mysqli_fetch_assoc($ad)){
							$from = $row["ride_from"];
							$to = $row["ride_dest"];
							$dt = $row["ride_date"];
							$time = $row["ride_time"];
							$capacity = $row["ride_capacity"];
							$price = $row["ride_price"];
							$drv_id = $row["ride_drvid"];
							$car_id = $row["ride_carid"];
							$stat = $row["ride_status"];
							$rideid = $row["ride_id"];
							$from2 = substr($from, 0, strpos($from, ','));
							$to2 = substr($to, 0, strpos($to, ','));

							$query1 = mysqli_query($db, "select * from passenger_detail where detail_rideid='$rideid'") or die(mysqli_error($db));
							while($row1 = mysqli_fetch_assoc($query1)){
								$p_id = $row1["detail_usrid"];


								$usrquery = mysqli_query($db, "select * from user where usr_id='$p_id'") or die(mysqli_error($db));
								while ($row2 = mysqli_fetch_assoc($usrquery)){
									$p_name = $row2["usr_name"];
									$p_img = $row2["usr_img"];
									$p_email = $row2["usr_email"];
									$p_phone = $row2["usr_phone"];


									echo "<div style='border-style: groove;margin-bottom:5px;'><div>
									<a href='ridedetails.php?id=$rideid'>
									<h5 style='padding-bottom: 0px;margin-bottom: 0px;margin-left: 10px;font-weight: bold;'>Booking No. $rideid</h5></a></div>
									<div class='row valign-wrapper' style='padding-top: 0px;margin-top: 0px;margin-left: 10px;'>

									<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>
									<i class='tiny material-icons' style='float: left;color: green;''>location_on</i><p style='font-weight: bold;float: left;margin: 0px;'>From: $from2</p><br><i class='tiny material-icons' style='float: left;color: red;'>location_on</i><p style='font-weight: bold;float: left; margin: 0px;'>To: $to2</p>
									</div>
									</div>

									<div class='row' style='padding-top: 0px;margin-top: 0px;margin-bottom: 0px;'>
									<div class='col s7' style='margin: 0px;margin-left: 10px;padding: 0px;'>
									<img src='img/profile/$p_img' alt='profile'  style='width: 100px;float: left;margin-left: 10px;border-style: groove;margin-right: 10px;'>
									<h6 style='padding: 0px;margin: 0px;font-weight: bold;color: grey;'>Booker Details</h6>
									<p style='padding: 0px;margin: 0px;'>$p_name</p>
									<p style='padding: 0px;margin: 0px;'>$p_email</p>
									<p style='padding: 0px;margin: 0px;'>$p_phone</p>

									</div>







									<div class='input-field col s4' style='padding-top: 0px;margin-top: 0px;margin-left: 0px;margin-bottom: 5px;'>
									<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>
									<i class='material-icons' style='color: orange;float: left;'>date_range</i>
									<p style='margin: 0px;'>$dt - $time</p>
									</div>
									<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>
									<i class='material-icons' style='color: grey;float: left;'>airline_seat_legroom_normal</i>
									<p style='margin: 0px;'>: 1</p>

									</div>

									<p style='padding-top: 0px;margin: 0px;margin-top: 5px;'>Rating Given: <i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star_half</i><i class='tiny material-icons' style='color:#FFD946;'>star_border</i></p>
							<p style='padding: 0px;margin: 0px;'>Price: Rp. $price</p><br>

									


									</div>

									<div class='col s12' style='margin-bottom: 10px;'>
									<a class='waves-effect waves-light btn light-blue darken-1' style='float: right; width:auto; height:auto;margin-right: 10px;'>Done</a>

									<a class='waves-effect waves-light btn light-blue darken-1' style='float: right; width:auto; height:auto;margin-right: 10px;'>Message</a>

									</div>

									</div></div>";

								}
							} 
						}
					echo "</div>";
					}
					?> 





					<div id="asrider" style="border-style: groove;margin-top: 10px;margin-bottom: 10px;">

						<?php
						$ar = mysqli_query($db, "select * from passenger_detail where detail_usrid='$usrid'") or die(mysqli_error($db));

						while($row1 = mysqli_fetch_assoc($ar)){
							$d_rideid = $row1["detail_rideid"];
							$d_id = $row1["detail_id"];

							$query1 = mysqli_query($db, "select * from ride where ride_id='$d_rideid'") or die(mysqli_error($db));
							while($row = mysqli_fetch_assoc($query1)){
								$from = $row["ride_from"];
								$to = $row["ride_dest"];
								$dt = $row["ride_date"];
								$time = $row["ride_time"];
								$capacity = $row["ride_capacity"];
								$price = $row["ride_price"];
								$drvid = $row["ride_drvid"];
								$car_id = $row["ride_carid"];
								$stat = $row["ride_status"];
								$rideid = $row["ride_id"];
								$from2 = substr($from, 0, strpos($from, ','));
								$to2 = substr($to, 0, strpos($to, ','));
							}
							$query2 = mysqli_query($db, "select * from driver where drv_id='$drvid'") or die(mysqli_error($db));
							while ($row3 = mysqli_fetch_assoc($query2)){
								$d_usrid = $row3["drv_usrid"];
								
							}
							$usrquery = mysqli_query($db, "select * from user where usr_id='$d_usrid'") or die(mysqli_error($db));
							while ($row2 = mysqli_fetch_assoc($usrquery)){
								$d_name = $row2["usr_name"];
								$d_img = $row2["usr_img"];
								$d_email = $row2["usr_email"];
								$d_phone = $row2["usr_phone"];
							}

							echo "<div>
							<a href='ridedetails.php?id=$rideid'>
							<h5 style='padding-bottom: 0px;margin-bottom: 0px;margin-left: 10px;font-weight: bold;'>Booking No. $rideid</h5></a></div>
							<div class='row valign-wrapper' style='padding-top: 0px;margin-top: 0px;margin-left: 10px;'>

							<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>
							<i class='tiny material-icons' style='float: left;color: green;''>location_on</i><p style='font-weight: bold;float: left;margin: 0px;'>From: $from2</p><br><i class='tiny material-icons' style='float: left;color: red;'>location_on</i><p style='font-weight: bold;float: left; margin: 0px;'>To: $to2</p>
							</div>
							</div>

							<div class='row' style='padding-top: 0px;margin-top: 0px;margin-bottom: 0px;'>
							<div class='col s7' style='margin: 0px;margin-left: 10px;padding: 0px;'>
							<img src='img/profile/$d_img' alt='profile'  style='width: 100px;float: left;margin-left: 10px;border-style: groove;margin-right: 10px;'>
							<h6 style='padding: 0px;margin: 0px;font-weight: bold;color: grey;'>Driver Details</h6>
							<p style='padding: 0px;margin: 0px;'>$d_name</p>
							<p style='padding: 0px;margin: 0px;'>$d_email</p>
							<p style='padding: 0px;margin: 0px;'>$d_phone</p>

							</div>






							<div class='input-field col s4' style='padding-top: 0px;margin-top: 0px;margin-left: 0px;margin-bottom: 0px;'>
							<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>
							<i class='material-icons' style='color: orange;float: left;'>date_range</i>
							<p style='margin: 0px;'>$dt - $time</p>
							</div>
							<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>
							<i class='material-icons' style='color: grey;float: left;'>airline_seat_legroom_normal</i>
							<p style='margin: 0px;'>: 1</p>

							</div>

							<p style='padding-top: 0px;margin: 0px;margin-top: 5px;'>Rating Given: <i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star</i><i class='tiny material-icons' style='color:#FFD946;'>star_half</i><i class='tiny material-icons' style='color:#FFD946;'>star_border</i></p>
							<p style='padding: 0px;margin: 0px;'>Price: Rp. $price</p><br>



							</div>

							<div class='col s12' style='margin-bottom: 10px;'>
							<a class='waves-effect waves-light btn light-blue darken-1' style='float: right; width:auto; height:auto;margin-right: 10px;'>Give Rating</a>
							<a class='waves-effect waves-light btn light-blue darken-1' style='float: right; width:auto; height:auto;margin-right: 10px;'>Message Car Owner</a>



							</div>

							</div>";
						}
						?>
					</div>

				</div>





				<?php
				if ($_SESSION["stat"] == 2) {
					echo "<div id='ridesoffer' class='col s9' style='margin-left: -5px; margin-right: -25px;''>
					<div class='white'>
						<!-- TABS LIST-->
						<ul class='tabs tabs-fixed-width tab-demo z-depth-1'>
							<li class='tab'><a href='#available' style='font-family: 'Quicksand', sans-serif;'>Available Rides</a></li>
							<li class='tab'><a href='#past' style='font-family: 'Quicksand', sans-serif;'>Past Rides</a></li>
						</ul>
						<!-- END TAB LIST -->
						<!-- ISI TAB -->
					</div>";

					echo "<div id='available' class='row' style='width:auto;'>
					";
					$r = mysqli_query($db, "select * from ride where ride_drvid='$driver'") or die(mysqli_error($db));

					while($row = mysqli_fetch_assoc($r)){
						$rideid = $row["ride_id"];
						$from = $row["ride_from"];
						$to = $row["ride_dest"];
						$dt = $row["ride_date"];
						$time = $row["ride_time"];
						$capacity = $row["ride_capacity"];
						$price = $row["ride_price"];
						$drv_id = $row["ride_drvid"];
						$car_id = $row["ride_carid"];
						$stat = $row["ride_status"];

						$from2 = substr($from, 0, strpos($from, ','));
						$to2 = substr($to, 0, strpos($to, ','));


						if ($stat == 0){
							echo"<div class='col s9' style='border-style: groove;margin-top: 10px;margin-bottom: 10px;height: 135px;'>
							<div class='row valign-wrapper' style='padding-top: 0px;margin-top: 0px;margin-left: 0px;'>
							<a href='ridemaps.php'>
							<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>";

							echo "<h6 style='float: left;margin: 0px;font-weight: bold;color: #03a9f4;'>From : $from2</h6><br>
									<h6 style='float: left; margin: 0px;font-weight: bold;color: #03a9f4;'>To : $to2</h6>

							</div>
							</a>
							</div>

							<div class='row valign-wrapper' style='padding-top: 0px;margin-top: 0px;margin-bottom: 0px;'>
							<div class='col s2' style='width: 300px;margin: 0px;margin-left: 10px;padding: 0px;margin-bottom: 10px;'>
							<h6 style='padding: 0px;margin: 0px;float:  left;margin-bottom: 10px;'>Departure Date: </h6>
							<h6 style='padding: 0px;margin: 0px;font-weight: bold;margin-bottom: 10px;'>&nbsp;&nbsp;$dt</h6>
							<h6 style='padding: 0px;margin: 0px;float:  left;margin-bottom: 10px;'>Start Time:</h6>
							<h6 style='padding: 0px;margin: 0px;font-weight: bold;margin-bottom: 10px;'>&nbsp;&nbsp;$time</h6>
							</div>
							</div>
							</div>

							<div align='center' class='col s1' style='border-style: groove;margin-top: 10px;margin-bottom: 5px;height: 135px;float: left;padding: 5px;'>
							<a href='edit.php?id=$rideid' class='waves-effect waves-light btn light-blue darken-1' style='margin-top: 19px;width:auto;'><i class='small material-icons' style='color: white;'>edit</i></a>

							<a class='waves-effect waves-light btn light-blue darken-1' style='margin-top: 20px; width:auto;'><i class='small material-icons' style='color: white;'>delete</i></a>

							</div>

							<div class='col s2' style='border-style: groove;margin-top: 10px;margin-bottom: 10px;height: 135px;background-color: lightblue;'>
							<h6 align='center' style='font-weight: bold;color: #4E4E4F;margin-top: 30px;'>Rp. $price</h6>
							<h6 align='center' style='color: #white	;'>Per Passanger</h6>


							</div>";
						}
					}
				echo "</div>


				<div id='past' class='row'>";
					$r = mysqli_query($db, "select * from ride where ride_drvid='$driver'") or die(mysqli_error($db));

					while($row = mysqli_fetch_assoc($r)){
						$rideid = $row["ride_id"];
						$from = $row["ride_from"];
						$to = $row["ride_dest"];
						$dt = $row["ride_date"];
						$time = $row["ride_time"];
						$capacity = $row["ride_capacity"];
						$price = $row["ride_price"];
						$drv_id = $row["ride_drvid"];
						$car_id = $row["ride_carid"];
						$stat = $row["ride_status"];


						$from2 = substr($from, 0, strpos($from, ','));
						$to2 = substr($to, 0, strpos($to, ','));


						if ($stat == 1){
							echo"<div class='col s10' style='border-style: groove;margin-top: 10px;margin-bottom: 10px;height: 135px;'>
							<div class='row valign-wrapper' style='padding-top: 0px;margin-top: 0px;margin-left: 5px;'>
							<a href='ridemaps.php'>
							<div class='something' style='padding-top: 0px;margin-top: 5px;width: 100%;'>

							<h6 style='float: left;margin: 0px;font-weight: bold;color: #03a9f4;'>From : $from2</h6><br>
							<h6 style='float: left; margin: 0px;font-weight: bold;color: #03a9f4;'>To : $to2</h6>

							</div>
							</a>
							</div>

							<div class='row valign-wrapper' style='padding-top: 0px;margin-top: 0px;margin-bottom: 0px;'>
							<div class='col s2' style='width: 300px;margin: 0px;margin-left: 10px;padding: 0px;margin-bottom: 10px;'>
							<h6 style='padding: 0px;margin: 0px;float:  left;margin-bottom: 10px;'>Departure Date: </h6>
							<h6 style='padding: 0px;margin: 0px;font-weight: bold;margin-bottom: 10px;'>&nbsp;&nbsp;$dt</h6>
							<h6 style='padding: 0px;margin: 0px;float:  left;margin-bottom: 10px;'>Start Time:</h6>
							<h6 style='padding: 0px;margin: 0px;font-weight: bold;margin-bottom: 10px;'>&nbsp;&nbsp;$time</h6>
							</div>
							</div>
							</div>



							<div class='col s2' style='border-style: groove;margin-top: 10px;margin-bottom: 10px;height: 135px;background-color: lightblue;'>
							<h6 align='center' style='font-weight: bold;color: #4E4E4F;margin-top: 30px;'>Rp. $price</h6>
							<h6 align='center' style='color: #white;'>Per Passanger</h6>
							</div>";
						}}
					echo"</div>";
				}


				?>

				</div>
				<!-- ISI TAB END -->
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
			$(document).ready(function(){
				$('.tabs').tabs();
				$('.tooltipped').tooltip();
			}); 
		</script>
	</body>
	</html>