<!DOCTYPE html>
<?php require_once("connect.php");

if(isset($_SESSION["stat"])){
  if($_SESSION["stat"] == '1'){
    header("Location:findride.php"); die;
  }
} else{
  header("Location:login.php");
  die;
}
$d = mysqli_query($db, "select * from driver where drv_usrid='".$_SESSION["id"]."'") or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($d)){
      $driver=$row["drv_id"];
}

if($_POST){
  $from = $_POST["fromloc"];
  $to = $_POST["toloc"];
  $price = $_POST["price"];
  $date = date('Y-m-d', strtotime($_POST["date"]));
  $time = $_POST["time"];
  $car = $_POST["car"];
  $seat = $_POST["seat"];
  echo "<script>alert('$date');</script>";
  mysqli_query($db, "insert into ride (ride_id, ride_from, ride_dest, ride_date, ride_time, ride_capacity, ride_price, ride_drvid, ride_carid) values(0, '$from', '$to', '$date', '$time','$seat', '$price', '$driver', '$car')") or die(mysqli_error($db));
  echo "<script>alert('Success');</script>";
}
?>
<html>
<head>
  <title>Petra Ride Sharing</title>
  <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

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
  <script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: false,
        center: {lat: -7.257472, lng: 112.752088},
        zoom: 13
      });

      new AutocompleteDirectionsHandler(map);
    };

       /**
        * @constructor
        */
        function AutocompleteDirectionsHandler(map) {
          this.map = map;
          this.originPlaceId = null;
          this.destinationPlaceId = null;
          this.travelMode = 'DRIVING';
          var originInput = document.getElementById('origin-input');
          var destinationInput = document.getElementById('destination-input');
          var modeSelector = document.getElementById('mode-selector');
          this.directionsService = new google.maps.DirectionsService;
          this.directionsDisplay = new google.maps.DirectionsRenderer;
          this.directionsDisplay.setMap(map);

          var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
          var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

          this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
          this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

         
        }

 

  AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
    var me = this;
    autocomplete.bindTo('bounds', this.map);
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.place_id) {
        window.alert("Please select an option from the dropdown list.");
        return;
      }
      if (mode === 'ORIG') {
        me.originPlaceId = place.place_id;
      } else {
        me.destinationPlaceId = place.place_id;
      }
      me.route();
    });

  };

  AutocompleteDirectionsHandler.prototype.route = function() {
    if (!this.originPlaceId || !this.destinationPlaceId) {
      return;
    }
    var me = this;

    this.directionsService.route({
      origin: {'placeId': this.originPlaceId},
      destination: {'placeId': this.destinationPlaceId},
      travelMode: this.travelMode
    }, function(response, status) {
      if (status === 'OK') {
        me.directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  };

  function checkForm(form){
    if(form.fromloc.value == ""){
      alert("Can't be blank!");
      form.fromloc.focus();
      return false;
    }
    if(form.toloc.value == ""){
      alert("Can't be blank!");
      form.toloc.focus();
      return false;
    }
    if(form.price.value == ""){
      alert("Can't be blank!");
      form.price.focus();
      return false;
    }
    if(form.date.value == ""){
      alert("Can't be blank!");
      form.date.focus();
      return false;
    }
    if(form.time.value == ""){
      alert("Can't be blank!");
      form.time.focus();
      return false;
    }
    if(form.car.value == ""){
      alert("Can't be blank!");
      form.car.focus();
      return false;
    }
    if(form.seat.value == ""){
      alert("Can't be blank!");
      form.seat.focus();
      return false;
    }
    return true;
  }

</script>
</head>
<body class="container">
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
   <div class="nav-wrapper">

     <div class="row" style="padding:0px;">
       <h5 style="padding:5px;font-family: 'Laila', sans-serif;font-weight: bold;">Offer a Ride </h5>
       <form method="post" action="" onsubmit="return checkForm(this)">
       <div class="col s7 " style="height: 620px;">
        <div class="grey lighten-2 nav-wrapper z-depth-2" style="padding: 5px;">
         <div class="input-field">
          <i class="material-icons prefix">location_on</i>
          <input id="origin-input" type="text" class="controls" name="fromloc" style="font-family: 'Quicksand', sans-serif;">
          <label for="origin-input" style="font-family: 'Quicksand', sans-serif;">From Location</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">location_searching</i>
          <input id="destination-input" type="text" class="controls" name="toloc" style="font-family: 'Quicksand', sans-serif;">
          <label for="destination-input" style="font-family: 'Quicksand', sans-serif;">To Location</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">attach_money</i>
          <input id="price" type="text" class="validate" name="price" style="font-family: 'Quicksand', sans-serif;">
          <label for="price" style="font-family: 'Quicksand', sans-serif;">Price per Passenger</label>
        </div>
      </div>

      <div class="white z-depth-2" style="padding:5px;">
       <div class="input-field">
        <i class="material-icons prefix" >date_range</i>
        <input id="date" type="text" class="datepicker" name="date" style="font-family: 'Quicksand', sans-serif;">
        <label for="date" style="font-family: 'Quicksand', sans-serif;">Date</label>
      </div>
      <div class="input-field">
        <i class="material-icons prefix">access_time</i>
        <input id="time" type="text" class="timepicker" name="time" style="font-family: 'Quicksand', sans-serif;">
        <label for="time" style="font-family: 'Quicksand', sans-serif;">Time</label>
      </div>
    </div>

    <div class="grey lighten-2 nav-wrapper z-depth-2" style="padding:5px;">
    <label style="font-family: 'Quicksand', sans-serif;">Select Car</label>
    <select class="browser-default" name="car">
    <option value="" disabled selected style="font-family: 'Quicksand', sans-serif;">Choose your option</option>
    <?php

    

    $q = mysqli_query($db, "select * from car where car_drvid='$driver'") or die(mysqli_error($db));
    while ($row = mysqli_fetch_assoc($q)){
      $carid = $row["car_id"];
      $carname = $row["car_name"];
      $carplate = $row["car_plate"];
      echo "<option value='".$carid."'>".$carname." - ".$carplate."</option>";
    }
    
    ?>
    </select>
    <label style="font-family: 'Quicksand', sans-serif;">Select Seat Offered</label>
    <select class="browser-default" name="seat">
    <option value="" disabled selected>Choose your option</option>
    <option value="1" style="font-family: 'Quicksand', sans-serif;">1</option>
    <option value="2" style="font-family: 'Quicksand', sans-serif;">2</option>
    <option value="3" style="font-family: 'Quicksand', sans-serif;">3</option>
    <option value="4" style="font-family: 'Quicksand', sans-serif;">4</option>
    <option value="5" style="font-family: 'Quicksand', sans-serif;">5</option>
    <option value="6" style="font-family: 'Quicksand', sans-serif;">6</option>
    </select>
  </div>
    <div class="grey lighten-2 nav-wrapper z-depth-2" style="padding:25px;height: 80px;">
      <button class="btn waves-effect waves-light right light-blue darken-1" type="submit" style="font-family: 'Boogaloo', sans-serif;">Publish
       </button>
    </div>

   
  </div>
</form>
  <div class="col s5">
  <div class="white z-depth-2" style="padding:5px;height:620px; width:auto">
      <div id="map"></div>
    </div>

  </div>

</div>


</div>
</main>


  
  <footer class="page-footer light-blue darken-1">
    <div class="container">
      &copy; Copyright 2018
    </div>
  </footer>
<!--   <div id="map"></div> -->

  <!--JavaScript at end of body for optimized loading-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/init.js"></script>
  <script type="text/javascript">
    $('.datepicker').datepicker({
        minDate:new Date(),
        disabledDates: [new Date()]

      });
    $('.timepicker').timepicker();
  </script>
</body>
</html>