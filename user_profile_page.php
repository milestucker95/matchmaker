<?php
include ('session.php');

session_start();  //starting session
$error='';
$servername="localhost";
$user = 'root';
$pass ='';
$db = 'matching';

$conn = new mysqli('localhost',$user,$pass, $db) or die("Unable to connect");

// if($conn->connnect_error){
//   die("connection failed: "  .  $conn->connect_error);
// }

echo "Connected successfully";
//
// $sql = "SELECT * from login_details where login_details.email = '$x'
// and login_details.password = '$y'";

$result = mysql_query("SELECT * from Profile where Profile.email = '$login_session'",$conn);

echo "$login_session";
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while($row = mysql_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['first_name'] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "</tr>";
}
echo "</table>";

// $sql = $conn->query($result);


?>
<!-- php echo $login_session;  -->
<!-- <!DOCTYPE html>
<html>
<head>
<title> Your Profile Page</title>
</head>
<body>
    <div id="profile">
      <b id="welcome">Welcome : <i></i></b>
    </div>

  </body>
  </html> -->
