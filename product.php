<!DOCTYPE html>
<html lang="en">
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
  background-color: #000898;
    color: #ffffff;
    text-align: left;
}
td, th {
  font-size: 18px;
  padding: 12px 15px;

}
tbody tr {
  border-bottom: thick solid #000898;
}
tbody {
    background-color: #f3f3f3;
}
tbody tr:last-of-type {
    border-bottom: 2px solid #000898;
}
tbody tr.active-row {
    font-weight: bold;
    color: #000898;
}
  </style>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Product</title>
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
  <!-- product section start -->
<div class="product_section layout_padding">
<div class="product_text"> VIDEO GAME <span style="color: #980000;">DATABASE</span></div>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `video_games` WHERE CONCAT(`cover`, `title`, `company`, `rating`, `genre`, `release_year`, `opinion`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `video_games`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
   include "connection.php";
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>
<form action = "product.php" method="POST" enctype="multipart/form-data">
          <input type="text" class = "email-bt" name="valueToSearch" placeholder="Enter a value (Ex. Release Year, Company, or Genre)"><br><br>
            <input class="see_bt" type="submit" name="search" value="Filter"><br><br>
            <button class="see_bt" onClick="window.location.reload();">Refresh</button>
            <br></br>
  <table>
  <br></br>
    <thead>
    <br></br>
      <tr>
        <th>Cover Art</th>
        <th>Game Title</th>
        <th>Company</th>
        <th>Rating</th>
        <th>Genre</th>
        <th>Release Year</th> 
        <th>Opinion</th> 
      </tr>
    </thead>
</div>
<?php
include "connection.php";

$query = "SELECT cover, title, company, rating, genre, release_year, opinion FROM video_games";
$query_run = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($search_result))
{
  ?>
  <tr>
      <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['cover']).'" alt="cover" style="width: 100; height= 100px; ">'; ?> </td>
      <td><?php echo $row['title']?></td>
      <td><?php echo $row['company']?></td>
      <td><?php echo $row['rating']?></td>
      <td><?php echo $row['genre']?></td>
      <td><?php echo $row['release_year']?></td>
      <td><?php echo $row['opinion']?></td>

  </tr>
  <?php
}
?>
  </table>
</form>
<div class="see_main">
        <div class="see_bt"><a href="#">Back To The Top</a></div>
      </div>
  <!-- product section end -->
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
                <h2 class="account_text">Useful Link's</h2>
                <div class="useful_link">
                  <ul>
                    <li><a href="product.php">Video Game Database</a></li>
                    <li><a href="video.html">Daily Flash Game</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-3">
              <h2 class="account_text">Contact Us</h2>
              <p class="ipsum_text_2">Have a suggestion? Shoot us a Message and we will respond in 6 to 12 business weeks!  </p>
              </div>
      </div>
    </div>
    <div class="social_icon">
      <ul>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/fb-icon.png"></a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/twitter-icon.png"></a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/linkdin-icon.png"></a></li>
        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="images/instagram-icon.png"></a></li>
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