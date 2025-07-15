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
  
  
  
<style type="text/css">
  body {background-image:url(images/bid22.jpg);}
  .box {padding:20px;
       background-color: rgba(0 , 0, 0 , 0.3);
       box-shadow:0 0 10px white;}

</style>
</head>
<body>
     <?php
     include('header.php');
     ?>

     <div class="container-fluid">
      <br>
       <div class="row">
        <div class="col-sm-1">
        </div>
         <div class="col-sm-4">
           <?php
           error_reporting(0);
           $id = $_GET['id'];
           $select = mysqli_query($con,"SELECT * FROM tbl_products WHERE product_id = '".$id."' ");
           $selected = mysqli_fetch_array($select); 
           ?>
           <center>
            <div class="box">
             <img title="<?php echo $selected['product_id'] ?>" style="margin-top:5px;" src="<?php echo "seller/products/".$selected['file'] ?>" width="95%">
           </div>
         </center>
         </div>

         <div style="text-align:center;box-shadow:0 0 20px white;background-color: rgba(0 , 0, 0 , 0.3);color:white;" class="col-sm-6">
          <br>
           <h2><?php echo $selected['pname'] ?></h2>
           <h4><b>Price : </b><?php echo $selected['price'] ?></h4>
           <h4><b>Start : </b><?php echo $selected['start'] ?></h4>
           <h4><b>Date : </b><?php echo $selected['adate'] ?></h4>
           <h4><b>Valid : </b><?php echo $selected['valid'] ?></h4>
           <hr>
           <br><br>


  <center>
  <p id="demo"></p><br><br><br>
 </center>
 
<input type="hidden" id="ddd" value="<?php echo $selected['adate']?>">
 <input type="hidden" id="ttt" value="<?php echo $selected['start']?>">
  <script>
     var aaa = document.getElementById('ddd').value;
     var bbb = document.getElementById('ttt').value;
     var countDownDate = new Date(aaa +' '+ bbb).getTime();


    var x = setInterval(function() {

    var now = new Date().getTime();
    
    var distance = countDownDate - now;
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    document.getElementById("demo").innerHTML = "<span style='font-size:20px;color:red;background:lightgray;padding:20px;'><b>Left : </b> " + days + "days " + hours + "hrs "
    + minutes + "min " + seconds + "sec</span>";

       if (distance < 0) {
        clearInterval(x);

        
          document.getElementById("demo").innerHTML = "<a style='font-size:20px;background:lightgray;padding:20px;' href='participate?id=<?php echo $selected['product_id'] ?>'>Auction Started !..</a>";
     
    }
}, 1000);

</script>

         </div>
       </div>
       <br>
     </div>

    <?php
    include('footer.php');
    ?>
 
   </div>
   
  
</body>
</html>

