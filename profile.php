<?php
include ('session.php');
$a=$_POST['description'];
$b=$_POST['age'];
$c=$_POST['sex'];
$x=$_POST['first_name'];
$y=$_POST['last_name'];
$w=$_POST['interests'];
$z=$_POST['hobbies'];
$servername="localhost";
$user = 'root';
$pass ='';
$db = 'matching';

$conn = new mysqli('localhost',$user,$pass, $db) or die("Unable to connect");

if($conn->connnect_error){
  die("connection failed: "  .  $conn->connect_error);
}

echo "Connected successfully";
$sql = "INSERT INTO `Profile`   (`first_name`,`last_name`,`interests`,`hobbies`,`description`, `age`, `sex`,`email`)
VALUES ('$x', '$y','$w','$z', '$a', '$b', '$c', '$login_session')";


if ($conn->query($sql) ===TRUE){
 echo "Profile was successfully created!";
 // $_SESSION['login_user'] = $login_session;//Initializing session

 header('Location: user_profile_page.php');

}
else{
 echo "Error: " . $sql . "<br>"  . $conn->error;
}


// $conn->close();



?>
