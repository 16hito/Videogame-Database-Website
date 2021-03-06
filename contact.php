<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Contact</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
	<!-- header section start -->
	<div class="header_section">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo"><a href="index_members.php"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index_members.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">ABOUT</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="product.php">VIDEO GAME DATABASE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="video.html">DAILY FLASH GAME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">CONTACT US</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index_visitor.html">LOG OUT</a>
                </li>
              </ul>
            </div>
        </nav>
	</div>
	<!-- header section end -->
  <!-- contact section start -->
  <div class="contact_section layout_padding padding_top_0">
<center>
<form action="" method="post" onSubmit="alert('Thank you for your feedback.');">  
</b></br>    
<input class ="email-bt" pattern="[a-zA-Z ]+" name="Name" required id="Name" placeholder="Name" required>
</br></br>    
<input class ="email-bt" type="email" name="Email" required id="Email" placeholder="Email" required>
</br></br>   
<input class ="email-bt"  type="text" name="Phone_Number" required id="Phone_Number" placeholder="Phone Number" required>
</br></br>   
</b></br>    
</label> 
<input  class ="email-bt" type="text" name="Message" required id="Message" placeholder="Message" required>
</br></br>
<input class="main_bt" type="submit" name="submit" id="log" value="Submit"/>
</form>
</center>
</br></br>   
</b></br> 
</br></br>   
  <?php
include "connection.php";

if((isset($_POST['Name'])) && !empty($_POST['Name'])){
  $Name = $_POST['Name'];
}
else{
  $Name = " ";
}
if((isset($_POST['Email'])) && !empty($_POST['Email'])){
  $Email = $_POST['Email'];
}
else{
  $Email = " ";
}
if((isset($_POST['Phone_Number'])) && !empty($_POST['Phone_Number'])){
  $Phone_Number = $_POST['Phone_Number'];
}
else{
  $Phone_Number = " ";
}
if((isset($_POST['Message'])) && !empty($_POST['Message'])){
  $Message = $_POST['Message'];
}
else{
  $Message = " ";
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

  $query = "SELECT ID FROM contact";
  $result = mysqli_query($conn, $query);
  //Checks to see if table is created.
  if(empty($result)) {
    $query = "CREATE TABLE contact (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      Name VARCHAR(30) NOT NULL,
      Email VARCHAR(30) NOT NULL,
      Phone_Number VARCHAR(30) NOT NULL,
      Message VARCHAR(65535) NOT NULL,
      input_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    $result = mysqli_query($conn, $query);
}
//Query to insert values. This setup allows for multiple entries into the databse on the same page.
$sql = "INSERT INTO contact (Name, Email, Phone_Number, Message)
VALUES ('$Name', '$Email', '$Phone_Number', '$Message')";

if (mysqli_query($conn, $sql)) {
  //Only diplays after a registration has been completed in the current session.
  echo "";
  echo '';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>

  <!-- contact section end -->
  <!-- footer section start -->
  <div class="section_footer margin_top_0 ">
    <div class="container"> 
        <div class="footer_section_2">
          <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-3">
                <h2 class="account_text">About Us</h2>
                <p class="ipsum_text_2">Bryan Concha and Patrick Cashman Inc.</p>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
                <h2 class="account_text">Useful Link</h2>
                <div class="useful_link">
                  <ul>
                    <li><a href="product.php">Video Game Database</a></li>
                    <li><a href="video.html">Daily Flash Game</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
              <h2 class="account_text">Contact Us</h2>
              <p class="ipsum_text_2">Have a suggestion? Shoot us a Message and we will respond in 6 to 12 business weeks! </p>
              </div>
      </div>
    </div>
    <div class="social_icon">
      <ul>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/fb-icon.png"></a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/twitter-icon.png"></a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/linkdin-icon.png"></a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/instagram-icon.png"></a></li>
        <li><a href="View_Contact.php"><img src="images/1.png"></a></li>
      </ul>
    </div>
  </div>
</div>
  <!-- footer section end -->
  <!-- copyright section start -->
  <!-- copyright section end -->
  <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript --> 
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
        });
    </script>
</body>
</html>