<?php
$connection = mysql_connect("localhost", "root","");

$db = mysql_select_db("matching", $connection);

session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysql_query("SELECT email from login_details where email='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['email'];

$ses_sql2 = mysql_query("SELECT match_id from Interactions where Interactions.email = '$user_check'", $connection);
$row2 = mysql_fetch_assoc($ses_sql2);
$match_session = $row2['match_id'];

if(!isset($login_session)){
  mysql_close($connection);
  header('Location: index.html');
}


 ?>
