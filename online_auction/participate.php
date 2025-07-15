<?php
include('connect.php');

error_reporting(0);
           $id = $_GET['id'];
           $select = mysqli_query($con,"SELECT * FROM tbl_products WHERE product_id = '".$id."' ");
           $selected = mysqli_fetch_array($select);

if(isset($_POST['btnboli']))
{
  $seller_id = $_POST['seller_id'];
  $product_id = $_POST['product_id'];
  $pname = $_POST['pname'];
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $boli = $_POST['boli'];

  $aaaa = $_POST['aaaa'];

  $sql = mysqli_query($con,"SELECT * FROM tbl_boli WHERE product_id = '".$product_id."' ");
  while($sql1 = mysqli_fetch_assoc($sql)){
       $res = $sql1['boli'];
  }

  if($res >= $boli)
  {
    echo "<script>
      alert('Please enter valid no');
      window.location.href='participate?id=$id';
    </script>";
  }else{


  $insert = mysqli_query($con,"INSERT INTO tbl_boli (`seller_id`,`product_id`,`pname`,`user_id`,`name`,`boli`) VALUES ('$seller_id','$product_id','$pname','$user_id','$name','$boli')");

 $delete = mysqli_query($con,"DELETE FROM tbl_boli1 WHERE boli_id = '".$aaaa."' and product_id = '".$selected['product_id']."' ");
   $insert = mysqli_query($con,"INSERT INTO tbl_boli1 (`seller_id`,`product_id`,`pname`,`user_id`,`name`,`boli`) VALUES ('$seller_id','$product_id','$pname','$user_id','$name','$boli')");

  header('location:participate?id='.$id);
}
}
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
.table-responsive {background-color: rgba(0 , 0, 0 , 0.2);padding:20px;color:white;height:400px;}
 tr th {background-color: rgba(0 , 0, 0 , 0.4);text-align:center;}
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
          
           <center>
            <div class="box">
             <img title="<?php echo $selected['product_id'] ?>" style="margin-top:5px;" src="<?php echo "seller/products/".$selected['file'] ?>" width="95%">
           </div>
         </center>
         </div>

         <div style="text-align:center;box-shadow:0 0 20px white;background-color: rgba(0 , 0, 0 , 0.3);" class="col-sm-6">
          <?php

    $select = mysqli_query($con,"SELECT * FROM tbl_boli1 WHERE boli_id = (SELECT MAX(boli_id)FROM tbl_boli1 WHERE product_id = '".$selected['product_id']."')");
  $myshow = mysqli_fetch_array($select);
  
   /* echo $myshow['boli_id'];
    echo $myshow['boli'];*/
          ?>
          
          
          <!-- <input type="text" name="bbbb" value="<?php echo $myshow['boli'] ?>"> -->
          <br><br>
  <center>
  <p id="demo"></p><br><br>
 </center>

<form method="post">

<input type="hidden" name="aaaa" value="<?php echo $myshow['boli_id'] ?>">

 <div style="width:100%;" class="input-group">
  <input type="hidden" name="seller_id" value="<?php echo $selected['seller_id'] ?>">
  <input type="hidden" name="product_id" value="<?php echo $selected['product_id'] ?>">
  <input type="hidden" name="pname" value="<?php echo $selected['pname'] ?>">
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
  <input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>">
  
 <input type="number" name="boli" class="form-control" placeholder="Boli Lagao Boli !..">
       
          <span class="input-group-addon">
          <button style="background:none;border:none;" type="submit" name="btnboli">  
        <i class="glyphicon glyphicon-search"></i>
         </button> 
      </span>

  </div>

</form>

  <!-- table start -->
  <br>
  <?php
   /* $result = mysqli_query($con,"SELECT MAX(boli) FROM tbl_boli WHERE product_id = '".$selected['product_id']."' ");
    $row = mysqli_fetch_row($result);
    $highest_id = $row[0];
    echo $highest_id;*/

  
?>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th>Bidder Name</th>
        <th>Bidding</th>
      </tr>
      <?php
      $boli = mysqli_query($con,"SELECT * FROM tbl_boli WHERE product_id = '".$selected['product_id']."' ORDER BY boli_id DESC ");
      while($row = mysqli_fetch_assoc($boli)){
      ?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['boli'] ?></td>
      </tr>
      <?php
       }
      ?>
    </table>
  </div>
  <br><br>
  <!-- table end -->


<input type="hidden" id="ddd" value="<?php echo $selected['adate']?>">
 <input type="hidden" id="ttt" value="<?php echo $selected['valid']?>">
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

        
    document.getElementById("demo").innerHTML ="<span style='font-size:20px;background:lightgray;padding:20px;'>Auction End !..";
   
  window.setTimeout(function(){
    
        window.location.href = "home";

    }, 4000);
     
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

