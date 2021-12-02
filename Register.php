<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <style>
   body  
{  
  background:  url(https://upload.wikimedia.org/wikipedia/commons/2/29/Maxtix.gif) no-repeat center center fixed; 
  background-size: cover; 
}  
.login{  
        width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
        padding: 80px;  
        background: #23463f;  
        border-radius: 15px ;  
          
}  
h2{  
    text-align: center;  
    color: #277582;  
    padding: 20px;  
}  
label{  
    color: #08ffd1;  
    font-size: 17px;  
}  
#Uname{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
}  
#Pass{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 3px;  
    padding-left: 8px;  
      
}  
#log{  
    width: 300px;  
    height: 30px;  
    border: none;  
    border-radius: 17px;  
    padding-left: 7px;  
    color: blue;  
  
  
}  
span{  
    color: white;  
    font-size: 17px;  
}  
a{  
    float: right;  
    background-color: grey;  
}
 
</style>

</head>
<body>
<h2>Register Page</h2><br>    
    <div class="login">
<form id ="login" action="register.php" method="post" >
<label><b>Name     
</b></br>    
</label> 
<input pattern="[a-zA-Z ]+" name="name" required id="Uname" placeholder="Name" required>
</br></br>
<label><b>Username     
</b>    
</label> 
<input type="text" name="user" required id="Uname" placeholder="Username" required>
</br></br>
<label><b>Password     
</b>    
</label> 
<input type="text" name="pass" required id="Uname" placeholder="Password" required>
</br></br>
<label><b>E-Mail     
</b></br>    
</label> 
<input type="email" name="email" required id="Uname" placeholder="E-Mail" required>
</br></br>
<input type="submit" name="submit" id="log" value="Submit"/>
<a class="nav-link" href="Login.php">Have an Account? Login In!</a>
</form>
</div>
<?php
include "connection.php";

if((isset($_POST['name'])) && !empty($_POST['name'])){
  $name = $_POST['name'];
}
else{
  $name = " ";
}
if((isset($_POST['user'])) && !empty($_POST['user'])){
  $user = $_POST['user'];
}
else{
  $user = " ";
}
if((isset($_POST['pass'])) && !empty($_POST['pass'])){
  $pass = $_POST['pass'];
}
else{
  $pass = " ";
}
if((isset($_POST['email'])) && !empty($_POST['email'])){
  $email = $_POST['email'];
}
else{
  $email = " ";
}

$db_selected = mysqli_select_db($conn, 'videogame_hub');

//When the user clicks submit, the following is executed.
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
{
  //Selects the proper database to wo
  $db_selected = mysqli_select_db($conn, 'videogame_hub');
  if(!$db_selected){
    //If the database doesn't exist, it is created.
    $sql = "CREATE DATABASE videogame_hub";
    if ($conn->query($sql) === TRUE) {
      echo " ";
    }
    else {
      echo "Error creating database: " . $conn->error;
    }
  }

  $query = "SELECT ID FROM USERS";
  $result = mysqli_query($conn, $query);
  //Checks to see if table is created.
  if(empty($result)) {
    $query = "CREATE TABLE users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      pName VARCHAR(30) NOT NULL,
      uName VARCHAR(30) NOT NULL,
      pass VARCHAR(30) NOT NULL,
      email VARCHAR(50) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    $result = mysqli_query($conn, $query);
}
//Query to insert values. This setup allows for multiple entries into the databse on the same page.
$sql = "INSERT INTO users (pName, uName, pass, email)
VALUES ('$name', '$user', '$pass', '$email')";

if (mysqli_query($conn, $sql)) {
  //Only diplays after a registration has been completed in the current session.
  echo "";
  echo '<h2><a href="Login.php">Click here to continue to the login page.</a></h2>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>

