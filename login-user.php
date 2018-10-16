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
    $info = "Match";
    echo "<script>alert('$info');</script>";
    $_SESSION["email"] = $email;
    $_SESSION["pass"] = $pass;
    $_SESSION["stat"] = $stat;
  } else {
    $info = "Not match";
    echo "<script>alert('$info');</script>";
  }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $user = $_POST["postemail"];
//   $pass = $_POST["postpassword"];
//   $imap = false;
//   $timeout = 30;
//   $fp = fsockopen($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
//   $errstr = fgets($fp);
//   if(substr($errstr,0,1)=='+'){
//     fputs($fp,"USER ".$user."\n");
//     $errstr = fgets($fp);
//     if(substr($errstr,0,1)=='+'){
//       fputs($fp,"PASS ".$pass."\n");
//       $errstr = fgets($fp);
//       if(substr($errstr,0,1)=='+'){
//         $imap=true;
//       }
//     }
//   }
// }
// if($imap){
//      echo "email benar";
// }
// else{
//     echo "email salah";
// }

?>