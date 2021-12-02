<!DOCTYPE html> 
<html> 
<head> 
	<title> Update Page </title> 
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
        background: #000000;  
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
<div class="login">
  <center>
      <h2>Update Information</h2>

      <form id = "login" action="" method="POST">
            <input type="text" id= "Uname" name="id" placeholder="Enter id"/>
            <br><br/>
            <input type="text" id= "Uname" name="Name" placeholder="Enter Name"/>
            <br><br/>
            <input type="text" id= "Uname" name="Email" placeholder="Enter Email"/>
            <br><br/>
            <input type="text" id= "Uname" name="Phone_Number" placeholder="Enter Phone Number"/>
            <br><br/>
            <input type="text" id= "Uname" name="Viewed" placeholder="Enter View Status"/>
            <br><br/>
            <input type="submit" name="update" id = "log" placeholder="UPDATE DATA"/>
      </form>
  </center>
  <li> <a href="View_Contact.php">Back to Users</a> </li> 
</body> 
</div>
</html>

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

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone_Number = $_POST['Phone_Number'];
    $Viewed = $_POST['Viewed'];

    $query = "UPDATE contact SET Name='$Name', Email = '$Email', Phone_Number='$Phone_Number', Viewed='$Viewed' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
      echo "Data Updated";
    } else {
      echo "Data Updated";
    }
}
?>