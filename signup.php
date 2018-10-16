<!DOCTYPE html>
<?php require_once("connect.php");
if(isset($_SESSION["email"])){
  header("Location:findride.php"); die;
}

if($_GET){
	$fname = $_GET["fname"];
	$email = $_GET["email"];
	$password = md5($_GET["password"]);
	$nohp = $_GET["mobile"];
	$nosim = $_GET["simnumber"];
	$about = $_GET["desc"];
	$chat = $_GET["group1"];
	$music = $_GET["group2"];
	$smoking = $_GET["group3"];
	$pets = $_GET["group4"];

	$q = mysqli_query($db, "select * from user where usr_email='$email' and usr_pass='$password'") or die(mysqli_error($db));
	while ($row = mysqli_fetch_assoc($q)){
		$usrid = $row["usr_id"];
	}
	
	mysqli_query($db, "update user set usr_phone='$nohp', usr_about='$about' usr_status='2' where usr_id='$usrid'") or die(mysqli_error($db));

	mysqli_query($db, "insert into driver(drv_id, drv_usrid, drv_simnum, drv_smoking, drv_pets, drv_chat, drv_music) values(0, '$usrid', '$nosim', '$smoking', '$pets', '$chat', '$music')") or die(mysqli_error($db));

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

				<script>
					function confirm() {
						alert("Success");
						return true;
					}
				</script>

			</head>
			<body class="container z-dept-2" style="background-color: #e0e0e0;">
				<!-- NAVBAR -->
				<header>
					<nav class="light-blue darken-1" role="navigation">
						<div class="nav-wrapper">
							<a href="#" class="brand-logo" style="font-family: 'Quicksand', sans-serif;"><img src="img/ridesharing.png" style="height: 55px;width: 190px;margin: 5px;padding-left: 6px;"></a>
							<ul class="right hide-on-med-and-down">
								<li><a href="login.php" style="font-family: 'Quicksand', sans-serif;">Login</a></li>
							</ul>

						</div>
					</nav>  
				</header>

				<main class="white" style="padding-left: 300px;padding-right: 300px;">
					<form method="get" action="login.php" onsubmit="return confirm()" id="personalinfo" class="col s12" style="margin-left: -5px; margin-right: -25px;font-family: 'Quicksand', sans-serif;" enctype="">
					<div class="white row" style="padding: 10px;font-weight: bold;">
						<!-- <div id="mainprofile" class="col s12" style="margin-left: -5px; margin-right: -25px;"> -->

								<br><br>
								<label style="color: black;font-size: 10pt;">First Name:</label>
								<input type="text" name="fname" required><br><br>
								<label style="color: black;font-size: 10pt;">Email:</label>
								<input type="Email" name="email" required><br><br>
								<label style="color: black;font-size: 10pt;">Password:</label>
								<input type="Password" name="password" required><br><br>
								<label style="color: black;font-size: 10pt;">Mobile:</label>
								<input type="text" name="mobile" required><br><br>
								<label style="color: black;font-size: 10pt;">Driving License Number:</label>
								<input type="text" name="simnumber" required><br><br>

								<label style="color: black;font-size: 10pt;">Quick Description:</label><br><br>
								<textarea name="desc"></textarea>

								<br><br><br>

							<!-- </form> -->
							<label style="color: black;font-family: 'Quicksand', sans-serif;font-size: 10pt;">Preferences:</label>

							<div id="preference" class="col s12" style="">

								<div class="col s2" style="margin-right: 10px;">
									<br><label style="font-family: 'Laila', cursive;">Chat:</label><br><br><br><br>
									<label style="font-family: 'Laila', cursive;">Music:</label><br><br><br><br><br>
									<label style="font-family: 'Laila', cursive;">Smoking:</label><br><br><br><br>
									<label style="font-family: 'Laila', cursive;">Pets:</label><br><br>

									

								</div><br>
								<div class="col s9">

									
										<label>
											<input name="group1" type="radio" value="3" checked />
											<span class="tooltipped" data-position="top" data-tooltip="I love to chat" style="width:auto;">
												<a href="#"><img src="img/preference/yes_chat.jpg" width="49" height="44" style="border-style: groove;"></a>

											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group1" type="radio" value="2"/>

											<span class="tooltipped" data-position="top" data-tooltip="I talk depending on my mood" style="width:auto;">
												<a href="#"><img src="img/preference/moderate_chat.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group1" type="radio" value="1"/>
											<span class="tooltipped" data-position="top" data-tooltip="I'm the quiet type :)" style="width:auto;">
												<a href="#"><img src="img/preference/no_chat.jpg" width="49" height="44" style="border-style: groove;">
												</a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
									


									<br><br><br>	
									

									
										<label>
											<input name="group2" type="radio" value="3" checked />
											<span class="tooltipped" data-position="top" data-tooltip="It's all about the playlist" style="width:auto;">
												<a href="#"><img src="img/preference/yes_music.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group2" type="radio" value="2"/>
											<span class="tooltipped" data-position="top" data-tooltip="Depending on my mood" style="width:auto;">
												<a href="#"><img src="img/preference/moderate_music.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group2" type="radio" value="1"/>
											<span class="tooltipped" data-position="top" data-tooltip="Silence is golden" style="width:auto;">
												<a href="#"><img src="img/preference/no_music.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
									


									<br><br><br>
									

									
										<label>
											<input name="group3" type="radio" value="3" checked />
											<span class="tooltipped" data-position="top" data-tooltip="Cigarette smoke doesn't bother me" style="width:auto;">
												<a href="#"><img src="img/preference/yes_smoking.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group3" type="radio" value="2"/>

											<span class="tooltipped" data-position="top" data-tooltip="Depending on my mood" style="width:auto;">
												<a href="#"><img src="img/preference/moderate_smoking.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group3" type="radio" value="1"/>
											<span class="tooltipped" data-position="top" data-tooltip="No smoking please" style="width:auto;">
												<a href="#"><img src="img/preference/no_smoking.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
									
									<br><br><br>
									
									
										<label>
											<input name="group4" type="radio" value="3" checked/>
											<span class="tooltipped" data-position="top" data-tooltip="Pets welcome" style="width:auto;">
												<a href="#"><img src="img/preference/yes_pets.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group4" type="radio" value="2"/>
											<span class="tooltipped" data-position="top" data-tooltip="Depending on my mood" style="width:auto;">
												<a href="https://www.google.com"><img src="img/preference/moderate_pets.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
										<label>
											<input name="group4" type="radio" value="1"/>
											<span class="tooltipped" data-position="top" data-tooltip="No pets in my vehicle please" style="width:auto;">
												<a href="#"><img src="img/preference/no_pets.jpg" width="49" height="44" style="border-style: groove;"></a>
											</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</label>
									

								</div>

							</div>

							<br><br><br><br>

						</div>
						
						<button class="waves-effect waves-light btn light-blue darken-1" type="submit" onclick="" style="font-family: 'Boogaloo', cursive;">Sign Up</button><br><br>
						</form>

					</main>
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