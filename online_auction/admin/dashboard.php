<?php
include('../connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
 
 .col-sm-4 {margin-top:10px;}
 .col-sm-4 img {border-radius:120px;width:50%;}
  .design {box-shadow:0 0 20px white;padding:20px;background-color: rgba(0 , 0, 0 , 0.5);color:white;border-radius:10px;}
  .design:hover {background-color: rgba(0 , 0, 0 , 0.2);}
</style>
</head>
<body>
  
   <?php
  include('menus.php');
  ?>

  <div class="container-fluid">

   <div class="row">
     <div class="col-sm-4 col-xs-6">
       <center class="design">
         <img src="images/users.jpg">
         <?php
         $select = mysqli_query($con,"SELECT * FROM tbl_users ");
         $selected = mysqli_num_rows($select);
         ?>
         <h4>Total Users - <?php echo $selected ?></h4>
       </center>
     </div>

      <div class="col-sm-4 col-xs-6">
       <center class="design">
         <img src="images/sellers.png">
         <?php
         $select = mysqli_query($con,"SELECT * FROM tbl_sellers ");
         $selected = mysqli_num_rows($select);
         ?>
         <h4>Total Sellers - <?php echo $selected ?></h4>
       </center>
     </div>

      <div class="col-sm-4 col-xs-6">
       <center class="design">
         <img src="images/products.jpg">
         <?php
         $select = mysqli_query($con,"SELECT * FROM tbl_products ");
         $selected = mysqli_num_rows($select);
         ?>
         <h4>Total Products - <?php echo $selected ?></h4>
       </center>
     </div>
   </div>
  
   
 </div>
<br><br>
	
</body>
</html>