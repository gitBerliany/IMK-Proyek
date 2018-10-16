<!DOCTYPE html>

<html>

<head>
	<title>Petra Ride Sharing</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

</head>
<body class="container">

	 <nav class="light-blue darken-1" role="navigation">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="findride.php">FIND RIDE</a></li>
        <li><a href="offerride.php">OFFER RIDE</a></li>
        <li>
          <a class='dropdown-trigger' href='#' data-target='dropdownweb'>
            MY ACCOUNT
            <i class="material-icons right">arrow_drop_down</i>
          </a>
          <ul id='dropdownweb' class="dropdown-content">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#!">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>  
      
      </ul>


      <ul id="mobile-demo" class="sidenav">
        <li><a href="findride.php">FIND RIDE</a></li>
        <li><a href="offerride.php">OFFER RIDE</a></li>
        <li>
          <a class='dropdown-trigger' href='#' data-target='dropdownmobile'>
            MY ACCOUNT
            <i class="material-icons right">arrow_drop_down</i>
          </a>
          <ul id='dropdownmobile' class="dropdown-content">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#!">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>  

	<div style="border-style: groove;margin-top: 10px;margin-bottom: 10px;">

		<div ><h5 style="padding-bottom: 0px;margin-bottom: 0px;margin-left: 10px;font-weight: bold;">Booking No. #56789</h5></div>
		<div class="row valign-wrapper" style="padding-top: 0px;margin-top: 0px;margin-left: 10px;">

			<div class="something" style="padding-top: 0px;margin-top: 5px;width: 100%;">
        <i class="tiny material-icons" style="float: left;color: green;">location_on</i><p style="float: left;margin: 0px;">tujungan plaza bla bla bla >>> </p><i class="tiny material-icons" style="float: left;color: red;">location_on</i><p style="float: left; margin: 0px;">universitas kristen petra bla bla bla</p>
      </div>
    </div>
<!--       <div class="row valign-wrapper" style="padding-top: 0px;margin-top: 0px;margin-left: 10px;float: right;margin-bottom: 0px;">
        <i class="material-icons" style="color: orange;float: left;">date_range</i>
          <p style="margin: 0px;">27 May 2018@ 10:10 PM</p>

        </div> -->

        <div class="row valign-wrapper" style="padding-top: 0px;margin-top: 0px;margin-bottom: 0px;">
          <div class="col s1" style="width: 300px;margin: 0px;margin-left: 10px;padding: 0px;">
            <img src="profile.png" alt="profile"  style="width: 100px;float: left;border-style: groove;margin-right: 10px;">
            <h6 style="padding: 0px;margin: 0px;font-weight: bold;color: grey;">Booker Details</h6>
            <p style="padding: 0px;margin: 0px;">arl******</p>
            <p style="padding: 0px;margin: 0px;">arl******@gm***.c**</p>
            <p style="padding: 0px;margin: 0px;">083******</p>
          </div>

          <div class="input-field col s4" style="border-left-style: groove; margin-top: 0px;padding-top: 0px;">
            <h6 style="padding: 0px;margin: 0px;font-weight: bold;color: grey;">Booking Status</h6>
            <p style="padding: 0px;margin: 0px;">Booking: </p>
            <p style="padding: 0px;margin: 0px;">Price: </p>
            <p style="padding: 0px;margin: 0px;">Booking Date: </p>
          </div>

          <div class="input-field col s4" style="padding-top: 0px;margin-top: 0px;margin-bottom: 5px;">
            <div class="something" style="padding-top: 0px;margin-top: 5px;width: 100%;">
              <i class="material-icons" style="color: orange;float: left;">date_range</i>
              <p style="margin: 0px;">27 May 2018@ 10:10 PM</p>
            </div>
            <div class="something" style="padding-top: 0px;margin-top: 5px;width: 100%;">
              <i class="material-icons" style="color: grey;float: left;">airline_seat_legroom_normal</i>
              <p style="margin: 0px;">: 1</p>

            </div>

            <p style="padding-top: 0px;margin: 0px;margin-top: 5px;">Rating Given: </p>
            <p style="padding: 0px;margin: 0px;">Rates Recieved: </p>
            <a class="waves-effect waves-light btn light-blue darken-1" style="float: right;">Message</a>

          </div>
<!--      <div class="col s1">
      <p style=" margin-top: 0px;">universitas kristen petra bla bla bla</p>
    </div> -->
  </div>
</div> 

<footer class="page-footer light-blue darken-1">
  <div class="container">
   &copy; Copyright 2018
 </div>
</footer>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>

</body>
</html>