<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "videogame_hub";

//connect to database
$conn = mysqli_connect($serverName, $userName, $password, $dbName, '4306');

if(!$conn) {
  echo "Connection error: " . mysqli_connect_error();
}
?>
