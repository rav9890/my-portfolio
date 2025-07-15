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
<!--   


  <script type="text/javascript" src="lib.js"></script> -->
<script type="text/javascript">

    let a = confirm('Want to back or refresh page, data may loss?');
    if(a)
    {
      window.location.href='login';
    }/*else{
      window.location.href='test2.php';
    }*/

  </script>
 

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
<body onbeforeunload="return myFunction()">
 <?php
 include('header.php');
 ?>

 <!-- /////////////////////// Slide Start ////////////////////////// -->
   <div class="container-fluid">

   <!--  <button onclick="alert('Data will be lost if you leave the page, are you sure?');window.location.href='logout.php';">Click</button>
    -->
   
   <div style="margin-left:-15px;margin-right:-15px;" id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
   <!--  <li data-target="#myCarousel" data-slide-to="3"></li> -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img title="special offer" src="gmc_pics/banner11.jpg" alt="special offer">
    </div>

    <div class="item">
      <img title="Diwali offer" src="gmc_pics/banner22.png" alt="Diwali offer">
    </div>

    <div class="item">
      <img title="Gifts" src="gmc_pics/banner33.png" alt="Gifts">
    </div>

  </div>

  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 
</div>
   <!-- /////////////////////// Slider End /////////////////////////// -->  

   <div style="background-image:url(images/bid22.jpg);">
     <div style="margin-top:-80px;" class="other-products">
  
                
             <ul id="flexiselDemo3">
            <li><img src="slider_imgs/img33.jpg" class="img-responsive" alt="" />
             
            </li>
            <li><img src="slider_imgs/img1.jpg" class="img-responsive" alt="" />           
              
            </li>
            <li><img src="slider_imgs/img22.jpg" class="img-responsive" alt="" />
             
            </li>
            <li><img src="slider_imgs/img44.jpg" class="img-responsive" alt="" />
             
            </li>
           
             </ul>
            <script type="text/javascript">
           $(window).load(function() {
            $("#flexiselDemo3").flexisel({
              visibleItems: 5,
              animationSpeed: 1000,
              autoPlay: true,
              autoPlaySpeed: 3000,        
              pauseOnHover: true,
              enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                  portrait: { 
                    changePoint:480,
                    visibleItems: 2
                  }, 
                  landscape: { 
                    changePoint:640,
                    visibleItems: 2
                  },
                  tablet: { 
                    changePoint:768,
                    visibleItems: 3
                  }
                }
              });
              
          });
           </script>
           <script type="text/javascript" src="js1/jquery.flexisel.js"></script>
         
           </div>

    
   <div class="container-fluid"> 
    <!-- //////////////////// featured Products start //////////////////////////////////////// -->
  <h3 style="color:white;margin-top:-40px;">FEATURED PRODUCTS</h3>
  <!-- <hr style="margin-top:0px;"> -->

  <div class="row">
    <?php
    $select = mysqli_query($con,"SELECT * FROM tbl_products WHERE pstatus = 'APPROVED' ");
    
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
    }
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

