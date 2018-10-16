<!DOCTYPE html>
<?php require_once("connect.php");
if(isset($_SESSION["stat"])){

} else{
header("Location:login.php");
die;
}
$usrid = $_SESSION["id"];
$q = mysqli_query($db, "select * from user where usr_id='$usrid'") or die(mysqli_error($db));
while($row = mysqli_fetch_assoc($q)){
$usr_id = $row["usr_id"];
$name = $row["usr_name"];
$gender = $row["usr_sex"];
$email = $row["usr_email"];
$totride = $row["usr_totalride"];
$status = $row["usr_status"];
$image = $row["usr_img"];
$about = $row["usr_about"];
$hp = $row["usr_phone"];
}

if($_SESSION["stat"] == '2'){
	$dquery = mysqli_query($db, "select * from driver where drv_usrid='$usr_id'") or die (mysqli_error($db));
	while ($row = mysqli_fetch_assoc($dquery)){
		$drvid = $row["drv_id"];
	}

	$cquery = mysqli_query($db, "select * from car where car_drvid='$drvid'") or die (mysqli_error($db));
	while($row = mysqli_fetch_assoc($cquery)){
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
					.tabs .tab-content{
						overflow-x: hidden;
					}
				</style>
			</head>
			<body class="container z-dept-2" style="background-color: #e0e0e0;">
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
					<li class="tab"><a href="#personalinfo" style="font-family: 'Quicksand', sans-serif;">Personal Information</a></li>
					<li class="tab"><a href="#preference" style="font-family: 'Quicksand', sans-serif;">Preferences</a></li>
					<?php  
					if ($_SESSION["stat"] == '2'){
					echo "<li class='tab'><a href='#mycar' style='font-family: 'Quicksand', sans-serif;'>My Cars</a></li>";
				}
				?>
				
			</ul>
			<!-- END TAB LIST -->
			<!-- ISI TAB -->
		</div>
		<div class="white row" style="padding: 10px;">
			<div id="personalinfo" class="col s12" style="margin-left: -5px; margin-right: -25px;font-family: 'Quicksand', sans-serif;">
				<form action="#">
					<label style="color: black;font-weight: bold;">Gender</label><br><br>
					<label>
						<input name="gender" type="radio" value="Male" checked />
						<span>Male</span>
					</label>
					<label>
						<input name="gender" type="radio" value="Female" />
						<span>Female</span>
					</label>

					<br><br>
					<label style="color: black;font-weight: bold;">First Name</label>
					<input type="text" name="fname" required value='<?php echo"$name";?>'><br><br>
					<label style="color: black;font-weight: bold;">Email</label>
					<input type="Email" name="email" required value='<?php echo"$email";?>'><br><br>
					<label style="color: black;font-weight: bold;">Mobile</label>
					<input type="text" name="mobile" required value='<?php echo"$hp";?>'><br><br>

					<label style="color: black;font-weight: bold;">Quick Description</label><br><br>
					<textarea name="desc" id="id1"></textarea><br><br>
					<label style="color: black;font-weight: bold;">Change Profile Picture</label><br><br>
					Select image to upload:
					<input type="file" name="fileToUpload" id="fileToUpload" value='<?php echo"$image";?>'>
					<br><br><br>
					<a class="waves-effect waves-light btn light-blue darken-1" style="font-family: 'Boogaloo', cursive;">Submit</a>
				</form>

				</div>
				<div id="preference" class="col s7" style="margin-left: 270px; margin-right: -25px;">
					<div class="col s2" style="margin-right: 10px;">
						<br><h6 style="font-weight: bold;font-family: 'Laila', cursive;">Chat</h6><br><br><br>
						<h6 style="font-weight: bold;font-family: 'Laila', cursive;">Music</h6><br><br><br>
						<h6 style="font-weight: bold;font-family: 'Laila', cursive;">Smoking</h6><br><br><br>
						<h6 style="font-weight: bold;font-family: 'Laila', cursive;">Pets</h6><br><br><br>
						<h6 style="font-weight: bold;font-family: 'Laila', cursive;">Gender</h6><br><br><br><br><br><br>

						<a class="waves-effect waves-light btn light-blue darken-1" style="margin-left: 265px;font-family: 'Boogaloo', cursive;">Save</a>

					</div><br>
					<div class="col s9">

						<form action="#">
							<label>
								<input name="group1" type="radio" checked />
								<span class="tooltipped" data-position="top" data-tooltip="I love to chat" style="width:auto;">
									<a href="#"><img src="img/preference/yes_chat.jpg" width="66" height="57" style="border-style: groove;"></a>

								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>

								<span class="tooltipped" data-position="top" data-tooltip="I talk depending on my mood" style="width:auto;">
									<a href="#"><img src="img/preference/moderate_chat.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="I'm the quiet type :)" style="width:auto;">
									<a href="#"><img src="img/preference/no_chat.jpg" width="66" height="57" style="border-style: groove;">
									</a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
						</form>


						<br>
						<br>

						<form action="#">
							<label>
								<input name="group1" type="radio" checked />
								<span class="tooltipped" data-position="top" data-tooltip="It's all about the playlist" style="width:auto;">
									<a href="#"><img src="img/preference/yes_music.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="Depending on my mood" style="width:auto;">
									<a href="#"><img src="img/preference/moderate_music.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="Silence is golden" style="width:auto;">
									<a href="#"><img src="img/preference/no_music.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
						</form>


						<br>
						<br>

						<form action="#">
							<label>
								<input name="group1" type="radio" checked />
								<span class="tooltipped" data-position="top" data-tooltip="Cigarette smoke doesn't bother me" style="width:auto;">
									<a href="#"><img src="img/preference/yes_smoking.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>

								<span class="tooltipped" data-position="top" data-tooltip="Depending on my mood" style="width:auto;">
									<a href="#"><img src="img/preference/moderate_smoking.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="No smoking please" style="width:auto;">
									<a href="#"><img src="img/preference/no_smoking.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
						</form>
						<br>
						<br>
						<form action="#">
							<label>
								<input name="group1" type="radio" checked/>
								<span class="tooltipped" data-position="top" data-tooltip="Pets welcome" style="width:auto;">
									<a href="#"><img src="img/preference/yes_pets.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="Depending on my mood" style="width:auto;">
									<a href="#"><img src="img/preference/moderate_pets.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="No pets in my vehicle please" style="width:auto;">
									<a href="#"><img src="img/preference/no_pets.jpg" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
						</form>
						<br>
						<br>
						<form action="#">
							<label>
								<input name="group1" type="radio" checked/>
								<span class="tooltipped" data-position="top" data-tooltip="Super Man" style="width:auto;">
									<a href="#"><img src="img/preference/male.png" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="Super Woman" style="width:auto;">
									<a href="#"><img src="img/preference/female.png" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
							<label>
								<input name="group1" type="radio"/>
								<span class="tooltipped" data-position="top" data-tooltip="Super Man Women" style="width:auto;">
									<a href="#"><img src="img/preference/couple.png" width="66" height="57" style="border-style: groove;"></a>
								</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</label>
						</form>

					</div>
				</div>
			</div> 


			<!-- <div id="mycar" class="col s12" style="margin-left: 10px; margin-right: 10px;border-bottom-style: groove;"> -->
				<?php
				if ($_SESSION["stat"] == '2'){
				echo "<div class='col s12' id='mycar'>
					<div class='row'>
						<div class='col s9' style='margin-left: 10px;'>
							<h5 style='margin-top: 0px;font-family: 'Laila', cursive;'>Manage Your Cars</h5>
						</div>
						<div class='col s2' style='margin-left: 70px;'>
						
							<a class='waves-effect waves-light btn light-blue darken-1' href='addcar.php' style='font-family: 'Boogaloo', cursive;'>Add Car</a>
						</div>

					</div>
					<div class='row' style='border-bottom-style: groove;margin-left: 5px;margin-right: 5px;'>
						<div class='col s2' style='margin-left: 15px;'>
							<img src='img/car/$carimg' width='150' height='100' style='border-style: groove;'>
						</div>
						<div class='col s7'>
							<h5 style='margin: 0px;font-weight: bold;'>$carname</h5>
							<h6 style='margin: 0px'>$carcolor</h6>
							<h6 style='margin: 0px;'>$carplate</h6>
						</div>
						<div class='col s2' align='center' style='margin-left: 43px;'>

							<a href='addcar.php' class='waves-effect waves-light btn light-blue darken-1' style='margin-top: 0px;width:auto;'><i class='small material-icons' style='color: white;'>edit</i></a>

							<a class='waves-effect waves-light btn light-blue darken-1' style='margin-top: 0px; width:auto;'><i class='small material-icons' style='color: white;'>delete</i></a>


						</div>

					</div>

					<!-- </div> -->
					<!-- ISI TAB END -->
				</div>";
				}
			?>
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