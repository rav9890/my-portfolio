<?php
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Auction Portal</title>
  <meta charset="utf-8">
   <meta name="description" content="GMC-Online Shopping in India">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="gmc_icon.png">
  <link rel="stylesheet" type="text/css" href="gmc_pics/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"> </script>
       
       
 <script src="js1/jquery.min.js"></script>
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />
     <script src="js/bootstrap.js"></script>
  
<style type="text/css">
  body {}
  .box {padding:0px;
       background:white;
       box-shadow:0 0 10px black;}
  .col-sm-2 {margin-top:10px;}
</style>
</head>
<body>
 <?php
 include('header.php');
 ?>

 
    
   <div style="background-image:url(images/bid22.jpg);" class="container-fluid"> 
    <!-- //////////////////// featured Products start //////////////////////////////////////// -->
  <h3 style="color:white;">SEARCH RESULT</h3>
  <!-- <hr style="margin-top:0px;"> -->

  <div class="row">
    <?php
    if(isset($_POST['searchbtn']))
    {
      $search = $_POST['search'];
    $select = mysqli_query($con,"SELECT * FROM tbl_products WHERE `category` = '".$search."' or `pname` = '".$search."' ");
    
    while($row = mysqli_fetch_assoc($select)){
    ?>
    <div class="col-sm-2 col-xs-6">
  

      <div class="box">
      

        <center>

         <a href="single?id=<?php echo $row['product_id'] ?>">
          <img title="<?php echo $row['product_id'] ?>" style="margin-top:0px;" src="<?php echo "seller/products/".$row['file'] ?>" width="100%">
        </a>
          <h4><?php echo $row['pname'] ?></h4>
          <p style="">Price : <?php echo $row['price'] ?></p>
          <p style="">Date : <?php echo $row['adate'] ?></p>
          <p style="">Start : <?php echo $row['start'] ?></p>
        </center>
      </div>
    </div>
    <?php
    }}
    ?>
  </div>
   <br>
   <!--  ///////////////////// featured Products end ////////////////////////////////////// -->
</div>
</div>
    <?php
    include('footer.php');
    ?>
 
   </div>
   
  
</body>
</html>

