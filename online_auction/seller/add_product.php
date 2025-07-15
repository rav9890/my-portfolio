<?php
include('../connect.php');

if(isset($_POST['btn_addnew']))
{
  $seller_id = mysqli_real_escape_string($con,$_POST['seller_id']);
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $company = mysqli_real_escape_string($con,$_POST['company']);

  $category = mysqli_real_escape_string($con,$_POST['category']);
  $pname = mysqli_real_escape_string($con,$_POST['pname']);
  $price = mysqli_real_escape_string($con,$_POST['price']);
  $file = mysqli_real_escape_string($con,$_FILES['file']['name']);
  $extra = 'e';
  $mmm = mysqli_real_escape_string($con,$_POST['mmm']).' ';
  $ddd = mysqli_real_escape_string($con,$_POST['ddd']).' ';
  $yyy = mysqli_real_escape_string($con,$_POST['yyy']);
  $start = mysqli_real_escape_string($con,$_POST['start']);
  $valid = mysqli_real_escape_string($con,$_POST['valid']);

  $insert = mysqli_query($con,"INSERT INTO tbl_products (`seller_id`,`name`,`company`,`category`,`pname`,`price`,`file`,`adate`,`start`,`valid`,`pstatus`) VALUES ('$seller_id','$name','$company','$category','$pname','$price','$extra$file','$mmm$ddd$yyy','$start','$valid','PENDING')");
  
  if($insert)
  {
    echo '<script>
    alert("You have successfully added new product !..");
    window.location.href="add_product";
    </script>';
  }

   $post_photo=$_FILES['file']['name'];
$post_photo_tmp=$_FILES['file']['tmp_name'];

$ext=pathinfo($post_photo, PATHINFO_EXTENSION);   //getting image extension

if($ext=='png' || $ext=='PNG' ||
   $ext=='jpg' || $ext=='jpeg' ||
   $ext=='JPG' || $ext=='JPEG' ||
   $ext=='gif' || $ext=='GIF' )   //checking image extension

  if($ext =='jpg' || $ext=='jpeg' || $ext =='JPG' || $ext=='JPEG')
  {
    $src=imagecreatefromjpeg($post_photo_tmp);

  }
  if($ext=='png'  || $ext=='PNG')
  {
    $src=imagecreatefrompng($post_photo_tmp);
  }
  if($ext=='gif'  || $ext=='GIF')
  {
    $src=imagecreatefromgif($post_photo_tmp);
  }


  list($width_min,$height_min)=getimagesize($post_photo_tmp);  //fetching original image width & height

  $newwidth_min=200;  //set compression image width
  $newheight_min=200; //set compression image height
  /*$newheight_min=($height_min / $width_min)*$newwidth_min; */   // equation for compressed image height
  $temp_min= imagecreatetruecolor($newwidth_min, $newheight_min);   //craere frame for compressed image
  imagecopyresampled($temp_min, $src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);  // compressing image
    imagejpeg($temp_min,"products/e".$post_photo,80);   //copy image in folder

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
 form {box-shadow:0 0 20px white;padding:20px;margin-top:30px;border-radius:10px;
          background-color: rgba(0 , 0, 0 , 0.5);}
    #wait_tip {background:white;text-align:center;padding:5px;color:black;width:100%;}
   label {color:white;margin-top:10px;}
</style>
<script type="text/javascript">
   function getId(id) {
       return document.getElementById(id);
   }
   function validation() {
       getId("submit_btn").style.display="none";
       getId("wait_tip").style.display="";
       return true;
   }
</script> 
</head>
<body>
  
   <?php
  include('menus.php');
  ?>

  <div class="container-fluid">

    <?php

    $select = mysqli_query($con,"SELECT * FROM tbl_sellers WHERE seller_id = '".$_SESSION['seller_id']."' ");
    $selected = mysqli_fetch_array($select);

    ?>

  <div class="row">
      <div class="col-sm-8">
        <!-- form start -->
        <form method="post" enctype="multipart/form-data">

          <h3 style="text-align:center;color:white;">ADD NEW PRODUCT</h3>
          <hr>
  <input type="hidden" name="seller_id" value="<?php echo $_SESSION['seller_id'] ?>">
  <input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>">
  <input type="hidden" name="company" value="<?php echo $_SESSION['company'] ?>">

  <div class="row">
     <div class="col-sm-6">
      <label>Select Category</label>
      <select type="text" name="category" class="form-control" required>
        <option value="">Select Category</option>
        <?php
        $select_category = mysqli_query($con,"SELECT * FROM tbl_category ");
        while($result = mysqli_fetch_assoc($select_category)){
        ?>
        <option value="<?php echo $result['category'] ?>"><?php echo $result['category'] ?></option>
        <?php
         }
        ?>
      </select>
     </div>
   </div>

   <div class="row">
     <div class="col-sm-6">
       <label>Product Name</label>
       <input type="text" name="pname" class="form-control" placeholder="Enter Product name" required>
     </div>
      <div class="col-sm-6">
        <label>Starting Price</label>
       <input type="text" maxlength="5" class="form-control" name="price" placeholder="Enter Starting Price" required>
     </div>
   </div>

   <div class="row">
     <div class="col-sm-6">
       <label>Product Image</label>
       <input type="file" name="file" class="form-control" required>
     </div>
      <div class="col-sm-6">
        <label>Auction Date</label>
       <div class="input-group">
    <select style="width:40%;float:left;" type="text" name="mmm" class="form-control" required>
      <option value="">Select Month</option>
      <option>Jan</option>
      <option>Feb</option>
      <option>Mar</option>
      <option>Apr</option>
      <option>May</option>
      <option>Jun</option>
      <option>Jul</option>
      <option>Aug</option>
      <option>Sep</option>
      <option>Oct</option>
      <option>Nov</option>
      <option>Dec</option>
    </select>
    <select style="width:33%;float:left;" type="text" name="ddd" class="form-control" required>
      <option value="">Select Day</option>
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
      <option>13</option>
      <option>14</option>
      <option>15</option>
      <option>16</option>
      <option>17</option>
      <option>18</option>
      <option>19</option>
      <option>20</option>
      <option>21</option>
      <option>22</option>
      <option>23</option>
      <option>24</option>
      <option>25</option>
      <option>26</option>
      <option>27</option>
      <option>28</option>
      <option>29</option>
      <option>30</option>
      <option>31</option>
    </select>
     <input style="width:27%;float:left;" type="text" name="yyy" class="form-control" value="<?php echo date('Y') ?>" required>
     
    <div style="clear:both;"></div>
  </div>
     </div>
   </div>

    <div class="row">
     <div class="col-sm-6">
       <label>Auction Start</label>
       <input type="text" name="start" class="form-control" placeholder="Enter time (hh:mm:ss)" required>
     </div>
      <div class="col-sm-6">
        <label>Valid Time</label>
       <input type="text" class="form-control" name="valid" placeholder="Enter time (hh:mm:ss)" required>
     </div>
   </div>
          
  <center> <span id="wait_tip" style="display:none;"> Please wait!..</span></center><br>

 <br><br>
  <center>
  <button style="padding:10px;font-weight:bold;float:left;background:black;color:white;" id="submit_btn" type="submit" class="btn btn-default" name="btn_addnew">ADD PRODUCT</button>
 <div style="clear:both;"></div>
</center>
</form>

 
        <!-- form end -->
      </div>
    </div>
  
   
 </div>
<br><br>
  
</body>
</html>