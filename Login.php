<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
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
<body class="body">
<h2>Login Page</h2><br>    
    <div class="login">    
    <form id="login" method="POST" action="login.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="user" required id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="password" name="pass" required id="Pass" placeholder="Password">    
        <br><br>    
        <input type="submit" name="submit" id="log" value="Submit">       
        <br><br>    
        <a class="nav-link" href="Register.php">Dont Have an Account? Register Here!</a>   
    </form>     
</div>
</body>
</html>
<?php
include "connection.php";

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

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])){
  $sql = "SELECT pass FROM users WHERE uName = '$user'";
  $result = mysqli_query($conn, $sql);
  $pwFromDB = " ";

  while($row = mysqli_fetch_assoc($result)){
    $pwFromDB = $row['pass'];
  }

  if($pwFromDB == $pass){
    echo "User found.";
    header("Location: index_members.php");
  }
  else{
    echo "User not found.";
  }
}
?>
