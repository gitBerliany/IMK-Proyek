<!DOCTYPE html>
<?php
require_once("connect.php");

if(isset($_SESSION["email"])){
  header("Location:findride.php"); die;
}

if($_POST){
  $email = $_POST["postemail"];
  $pass = md5($_POST["postpassword"]);

  $q = mysqli_query($db, "select * from user where usr_email='$email' and usr_pass='$pass'") or die(mysqli_error($db));
  while ($row = mysqli_fetch_assoc($q)){
    $id = $row["usr_id"];
    $name = $row["usr_name"];
    $pass = $row["usr_pass"];
    $sex = $row["usr_sex"];
    $email = $row["usr_email"];
    $phone = $row["usr_phone"];
    $totalride = $row["usr_totalride"];
    $img = $row["usr_img"];
    $stat = $row["usr_status"];
  }

  if (mysqli_num_rows($q) > 0){
  	$_SESSION["id"] = $id;
    $_SESSION["email"] = $email;
    $_SESSION["pass"] = $pass;
    $_SESSION["stat"] = $stat;
    // $info = "Match";
    // echo "<script>alert('$info');</script>";
  } else {
    // $info = "Not match";
    // echo "<script>alert('$info');</script>";
  }
}

?>
<html lang="en">
<head>
	<title>Login Petra Ride Sharing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="img/login/images.png"/>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet">
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/login/ridesharing.jpg');">
			<div class="wrap-login100" style="padding-top: 8%; padding-bottom: 3%;">
				<form class="login100-form" method="post" action="">
					<div class="login100-form-avatar">
						<img src="img/login/Petra.png" alt="AVATAR" class="img-responsive">
					</div>
					<span class="login100-form-title" style="padding-top:5%; padding-bottom: 10%;font-family: 'Laila', cursive;font-weight: bold;">
						Petra Ride Sharing
					</span>
					<div class="wrap-input100" style="margin-bottom: 2%;">
						<input class="input100" type="text" id="postemail" name="postemail" placeholder="Use mNRP or eNRP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100" style="margin-bottom: 2%;">
						<input class="input100" type="password" id="postpassword" name="postpassword" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="container-login100-form-btn" style="padding-top: 3%;">
						<button type="submit" class="login100-form-btn" style="font-family: 'Boogaloo', cursive;font-size: 20px;">
							Login
						</button>
					</div>
				</form>
				<div class="text-center w-full" style="padding-top:10%; padding-bottom: 10%; padding-left: 70px;font-family: 'Quicksand', sans-serif;">
					Want to be a driver?
					<a href="signup.php" class="txt1">Sign Up</a> Here
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>