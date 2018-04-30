<?php

session_start();  //starting session
$error='';
if(isset($_POST['submit']))
{
  if(empty($_POST['email']) || empty($_POST['password'])){
    $error= "email or Password is invalid";
  }
  else{
    $x=$_POST['email'];
    $y=$_POST['password'];
    $_SESSION['varname'] = $x;
    // $_COOKIE['varname'] = $var_value;

    $servername="localhost";
    $user = 'root';
    $pass ='';
    $db = 'matching';

    $conn = new mysqli('localhost',$user,$pass, $db) or die("Unable to connect");

    if($conn->connnect_error){
      die("connection failed: "  .  $conn->connect_error);
    }

    echo "Connected successfully";
    //
    $sql = "SELECT 1 from login_details where login_details.email = '$x'
    and login_details.password = '$y'";


    $result = $conn->query($sql);

    if ($result->num_rows > 1) {
            echo "login success!!";
            $_SESSION['login_user'] = $x;//Initializing session
            header("location: user_profile_page.php"); //redirect to profile page
    }
    else {
        echo "These credentials are invalid";
    }

    $conn->close();

  }
}




// <form method="get" action="user_profile_page.php">
//     <input type="hidden" name="varname" value="var_value">
//     <input type="submit">
// </form>

?>
