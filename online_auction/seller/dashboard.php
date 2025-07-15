<?php
include('../connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
 #welname {background-color: rgba(0 , 0, 0 , 0.3);
           padding:20px;
           color:white;
           text-align:center;
           border-radius:5px;}
</style>
</head>
<body>
  
   <?php
  include('menus.php');
  ?>

  <div class="container-fluid">

  <div class="row">
    <div class="col-sm-4">
      <h3 id="welname">WELCOME <?php echo $_SESSION['name'] ?></h3>
    </div>
  </div>
  
   
 </div>
<br><br>
	
</body>
</html>