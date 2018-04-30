<?php

$x=$_POST['email'];
$y=$_POST['password'];
$w=$_POST['security_question'];
$z=$_POST['security_answer'];
$servername="localhost";
$user = 'root';
$pass ='';
$db = 'matching';

$conn = new mysqli('localhost',$user,$pass, $db) or die("Unable to connect");

if($conn->connnect_error){
  die("connection failed: "  .  $conn->connect_error);
}

echo "Connected successfully";
$sql = "INSERT INTO `Sign_up_details`   (`email`,`password`,`security_question`,`security_answer`) VALUES ('$x', '$y','$w','$z')";

$login_sql = "INSERT INTO `login_details`   (`email`,`password`,`isNew`) VALUES ('$x', '$y', TRUE)";


if ($conn->query($sql) ===TRUE && $conn->query($login_sql) ===TRUE){
 echo "Sign up approved";
}
else{
 echo "Error: " . $sql . "<br>"  . $conn->error;
}

$conn->close();

header('Location: profile_page.php');

?>
