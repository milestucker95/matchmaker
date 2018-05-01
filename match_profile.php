<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="user_profile_page.css">
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="topnav">
  <a class="active" href="index.html">Home</a>
   <a href="profile_page.php">Profile</a>
   <a href="matches.php">Matches</a>
   <a href="stats.php">Stats</a>
</div>

<body>
  <body style="background-color:#969;text-align:center;font-family:verdana;">

  <h1 style="text-align:center;">Welcome to Match Maker!</h1>

  <img src="site_logo.png" alt="matchmaker logo" style="width:500px;height:200px;">
<?php
include ('session.php');

// session_start();  //starting session
$error='';
$servername="localhost";
$user = 'root';
$pass ='';
$db = 'matching';

$conn = new mysqli('localhost',$user,$pass, $db) or die("Unable to connect");

// echo "Connected successfully";

// $result = mysql_query("SELECT * from Profile where Profile.email = '$login_session'",$conn);
$sql="SELECT * from Profile where Profile.email = '$login_session'";
$result=mysqli_query($conn,$sql);


if ($row=mysqli_fetch_assoc($result))
{
  echo  "<br>";
  echo "<h3>Name: " . $row ['first_name'] . "  ";
  echo $row ['last_name'];
  echo "<br>";
  echo "<h3>Email: " .$row ['email'];
  echo "<br>";
  echo "<h3>Hobbies: " .$row ['hobbies'];
  echo "<br>";
  echo "<h3>Interests: " .$row ['interests'];
  echo "<br>";
  echo "<h3>Age: " .$row ['age'];
  echo "<br>";
  echo "<h3>Gender: " .$row ['sex'];

}
else{
  echo "Empty Profile";
}
?>

</body>
</html>
