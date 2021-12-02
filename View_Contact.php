<?php
include "connection.php";

$sql = "SELECT id, Name, Email, Phone_Number, Message, input_date, Viewed FROM contact";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "";
    }
 else {
    echo "";
}

?>

<!DOCTYPE html> 
<html> 
<head> 
<style>
table {
border-collapse: collapse;
margin: 25px 0;
font-size: 0.9em;
font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
min-width: 400px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
thead tr {
  background-color: #006311;
    color: #ffffff;
    text-align: left;
}
td, th {
  font-size: 18px;
  padding: 12px 15px;

}
tbody tr {
  border-bottom: thick solid #006311;
}
tbody {
    background-color: #000000;
}
tbody tr:last-of-type {
    border-bottom: 2px solid #006311;
}
tbody tr.active-row {
    font-weight: bold;
    color:#006311;
}
  </style>
	<title> Fetch Data From Database </title> 
  <style>
   body  
{  
  background:  url(https://upload.wikimedia.org/wikipedia/commons/2/29/Maxtix.gif) no-repeat center center fixed; 
  background-size: cover; 
}  
</style>
</head> 
<center>
<body> 
<table class="table" border="1" style="font-family: Georgia, 'Times New Roman', Times, serif; color:white;font-style:italic">

<thead>

<tr style="font-variant: small-caps; font-style:normal; color:black;font-size:18px;">
  <th scope="col">id</th>
  <th scope="col">Name</th>
  <th scope="col">Email</th>
  <th scope="col">Phone_Number</th>
  <th scope="col">Message</th>
  <th scope="col">input_date</th>
  <th scope="col">Viewed</th>
  <th scope="col">Delete</th>
  <th scope="col">Update</th>
</tr>

</thead>

          <tbody>
          </center>
            <?php 
              
              $sql = "SELECT id, Name, Email, Phone_Number, Message, input_date, Viewed FROM contact";
              $orders = mysqli_query($conn, $sql);
              if (mysqli_num_rows($orders) > 0) {
              echo "";
              
                while($order = mysqli_fetch_assoc($orders)) {
                echo "";
              
            ?>
            <tr>
              <td><?= $order['id'] ?></td>
              <td><?= $order['Name'] ?></td>
              <td><?= $order['Email'] ?></td>
              <td><?= $order['Phone_Number'] ?></td>
              <td><?= $order['Message'] ?></td>
              <td><?= $order['input_date'] ?></td>
              <td><?= $order['Viewed'] ?></td>
              <td><a href="Delete_Contact.php?id=<?php echo $order['id']; ?>">Delete</a></td>
              <td><a href="Update_Contact.php?id=<?php echo $order['id']; ?>">Update</a></td>
              
            </tr> 
            <?php }} 
              else
              echo "no data";?> 
          </tbody>
        </table>
        <a href="index_members.php"><h2>Home Page</h2></a> </li> 
	</body> 
	</html>
