<head>
  <link rel="stylesheet" type="text/css" href="stats.css">
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
// $sql="SELECT * from Interactions where Interactions.email = '$login_session'";
$matches="SELECT Interactions.match_id, Interactions.email
FROM Interactions
where Interactions.match_id = '$match_session'
and Interactions.email <> '$login_session'";

$result=$conn->query($matches);

// $row2=mysqli_fetch_assoc($result2);
echo "<br>";
echo "Matches";
echo "<br>";

$link_address="match_profile.php";
if($result->num_rows>0)
{
    while ($row = $result->fetch_assoc()) {
            // echo "login success!!";
            $_SESSION['login_user'] = $row['email'];//Initializing session
            // header("location: user_profile_page.php"); //redirect to profile page
            echo "<a href='".$link_address."'> '".$row['email']."'</a>";
            echo "<br>";
            $product_id = $row['email'];
          // echo  "<a href="match_profile.php?id= $product_id">"

            // echo"  <a href="match_profile.php?">'".$row['email']."'</a>"



            // echo "<h3>Name: " . $row ['email'] . "  ";
    }
  }
  else{
    echo " 0 results found";
  }
// else {
//     echo "These credentials are invalid";
// }

// if ($row=mysqli_fetch_assoc($result))
// {
//   echo  "<br>";
//   echo "<h3>Matches: " . $row ['num_of_matches'] . "  ";
//   echo "<br>";
//   echo "<h3>Likers: " .$row ['likers'];
//   echo "<br>";
//
// }
// else{
//   echo "Empty Profile";
// }

?>

</body>
</html>
