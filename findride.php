<!DOCTYPE html>
<?php require_once('connect.php');
if(isset($_SESSION["id"])){} else {
  header("Location:login.php");
  die;
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
    if(from.position.value == ""){
      alert("Can't be blank!");
      form.position.focus();
      return false;
    }
    if(from.destination.value == ""){
      alert("Can't be blank!");
      form.destination.focus();
      return false;
    }
    if(from.date.value == ""){
      alert("Can't be blank!");
      form.date.focus();
      return false;
    }
    return true;
  }

</script>
</head>
<body class="container z-depth-2">
  <header>
   <nav class="light-blue darken-1" role="navigation">
    <div class="nav-wrapper">
      <!-- <a href="#" class="brand-logo" style="font-family: 'Quicksand', sans-serif;"></a> -->
      <img src="img/logoo.png" style="height: 65px;width: 270px;margin: 0px;padding-left: 6px;">
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
  <div>
    <div><h5 style="font-family: 'Laila', cursive;padding-left: 15px;font-weight: bold;">Find a Ride</h5></div>
    <form method='get' action='ridefound.php' onsubmit='return checkForm(this)''>
      <div class="row valign-wrapper" style="padding-right: 20px;">
        <div class="input-field col s4">
          <i class="material-icons prefix">location_on</i>
          <input id="origin-input" type="text" class="controls" name="position">
          <label for="origin-input" style="font-family: 'Quicksand', sans-serif;">Position</label>
        </div>

        <div class="input-field col s4">
          <i class="material-icons prefix">location_searching</i>
          <input id="destination-input" type="text" class="controls" name="destination">
          <label for="destination-input" style="font-family: 'Quicksand', sans-serif;">Destination</label>
        </div>
        <div class="input-field col s2">
          <i class="material-icons prefix">date_range</i>
          <input id="icon_date" type="text" class="datepicker" name="date">
          <label for="icon_date" style="font-family: 'Quicksand', sans-serif;">Date</label>
        </div>
        <div class="input-field col s2">
        <i class="material-icons prefix">access_time</i>
        <input id="time" type="text" class="timepicker" name="time">
        <label for="time" style="font-family: 'Quicksand', sans-serif;">Time</label>
      </div>
        <div class="col s1">
          <button class="btn waves-effect waves-light light-blue darken-1" type="submit" name="action" style="font-family: 'Boogaloo', cursive;">Find</button>
        </div>
      </div>
    </form>
  </div> 


<!--   <div id="map"></div> -->
<div class="white z-depth-2" style="padding:5px;height:520px; width:auto">
      <div id="map"></div>
    </div>

</main>

  <footer class="page-footer light-blue darken-1">
    <div class="container" style="font-family: 'Quicksand', sans-serif;">
      &copy; Copyright 2018
    </div>
  </footer>

  



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