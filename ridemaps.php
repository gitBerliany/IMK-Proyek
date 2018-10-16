<!DOCTYPE html>
<?php require_once("connect.php");

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
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 100%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }

  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGWTiEsKVoQekrR3qQmcTgTyBk-eP2ca4&libraries=places&callback=initMap"
  async defer></script>   
  <script>
     function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        
          calculateAndDisplayRoute(directionsService, directionsDisplay);
       
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        //var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < 1; i++) {
          
            waypts.push({
              location: "Royal Plaza Surabaya",
              stopover: true
            });
          
        }

        directionsService.route({
          origin: "Universitas Kristen Petra",
          destination: "Tunjungan Plaza",
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
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
       <h5 style="padding:5px;font-family: 'Laila', sans-serif;font-weight: bold;">Waypoint Maps</h5>
       <!-- <div class="col s6">
         

       </div> -->
  <div class="col s12">
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