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

$id = $_GET['id']; // $id is now defined

$deletequery = "DELETE FROM contact WHERE id=$id";

$query = mysqli_query($conn, $deletequery);
header('location:View_Contact.php');
?>
