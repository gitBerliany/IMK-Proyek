<!DOCTYPE html>
<?php require_once('connect.php');
if(isset($_SESSION["stat"])){
  if ($_SESSION["stat"] == 1){
    header("Location:findride.php");
    die;
  } 
} else{
  header("Location:login.php");
  die;
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
        <li><a href="findride.php" style="font-family: 'Quicksand', sans-serif;">FIND RIDE</a></li>
        <?php  
        if ($_SESSION["stat"] == '2'){
          echo "<li><a href='offerride.php' style='font-family: 'Quicksand', sans-serif;'>Offer Ride</a></li>";
        }
        ?>
        <li>
          <a class='dropdown-trigger' href='#' data-target='dropdownmobile' style="font-family: 'Quicksand', sans-serif;">
            MY ACCOUNT
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

					<div class="white row" style="padding: 10px;">
						<!-- <div id="mainprofile" class="col s12" style="margin-left: -5px; margin-right: -25px;"> -->
							<form action="#" id="personalinfo" class="col s12" style="margin-left: -5px; margin-right: -25px;">

								<br><br>
								<label>Plate No.</label>
								<input type="text" name="pnum" required><br><br>
								<label>Car Model</label>
								<input type="text" name="cmodel" required><br><br>
								<label>Car Color</label>
								<input type="text" name="ccolor" required><br><br>
								<label>Change Car Profile Picture</label><br><br>
								
								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Upload Image" name="submit">
								<br><br><br>
								<a class="waves-effect waves-light btn light-blue darken-1">Submit</a>
							</form>

							
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