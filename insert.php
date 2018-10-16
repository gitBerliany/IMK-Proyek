<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$Name = $_POST['name'];
$Email = $_POST['email'];
$Password = $_POST['psw'];
$Nohp = $_POST['nohp'];
$City = $_POST['city'];
echo $City;
echo "Errormessage: ".$conn->error;
$sql="SELECT * FROM register WHERE (Email='$Email');";

      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) 
      {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if ($Email==$row['Email'])
        {
        	header("refresh:2; url=Register.php");
            die("Email is already exists");
           
        }else
		{ 
            echo "alright";
        }
    }
    else{
$sql1 = "INSERT INTO register (Nama, Email, Password, nohp, City) VALUES ('$Name','$Email','$Password','$Nohp','$City')";
}
if(!mysqli_query($conn,$sql1))
{
	echo 'Not Inserted';
}
else
{
	
	echo 'Inserted';
	header("refresh:2; url=Register.php");
}

}
?>