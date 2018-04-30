<?php
include ('session.php');

// session_start();  //starting session
$error='';
$servername="localhost";
$user = 'root';
$pass ='';
$db = 'matching';

$conn = new mysqli('localhost',$user,$pass, $db) or die("Unable to connect");

echo "Connected successfully";

// $result = mysql_query("SELECT * from Profile where Profile.email = '$login_session'",$conn);
$sql="SELECT * from Profile where Profile.email = '$login_session'";
$result=mysqli_query($conn,$sql);


if ($row=mysqli_fetch_assoc($result))
{
  echo "<br>";
  echo $row ['first_name'];
  echo "<br>";
  echo $row ['last_name'];
  echo "<br>";
  echo $row ['email'];
  echo "<br>";
  echo $row ['hobbies'];
  echo "<br>";
  echo $row ['interests'];
  echo "<br>";
  echo $row ['age'];
  echo "<br>";
  echo $row ['sex'];

}


?>
