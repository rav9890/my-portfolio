<?php
include('../connect.php');

if(isset($_POST['update']))
{
  $hidid = mysqli_real_escape_string($con,$_POST['hidid']);
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $contact = mysqli_real_escape_string($con,$_POST['contact']);
  $company = mysqli_real_escape_string($con,$_POST['company']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $city = mysqli_real_escape_string($con,$_POST['city']);
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  $up_seller = mysqli_query($con,"UPDATE tbl_sellers SET `name`='$name',`contact`='$contact',`company`='$company',`address`='$address',`city`='$city',`username`='$username',`password`='$password' WHERE seller_id = '".$hidid."' ");
  
  if($up_seller)
  {
    echo '<script>
    alert("You have successfully updated Profile !..");
    window.location.href="profile";
    </script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
 form {box-shadow:0 0 20px white;padding:20px;margin-top:30px;border-radius:10px;
          background-color: rgba(0 , 0, 0 , 0.5);}
    #wait_tip {background:white;text-align:center;padding:5px;color:black;width:100%;}
   label {color:white;}
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
      <div class="col-sm-4">
        <!-- form start -->
        <form method="post">

          <h3 style="text-align:center;color:white;">UPDATE PROFILE</h3>
          <hr>

          <input type="hidden" name="hidid" value="<?php echo $selected['seller_id'] ?>">
 
  <label>Name</label>
  <input type="text" name="name" class="form-control" value="<?php echo $selected['name'] ?>" required><br>

   <label>Contact</label>
  <input type="text" name="contact" maxlength="10" class="form-control" value="<?php echo $selected['contact'] ?>" required><br>

   <label>Company</label>
  <input type="text" name="company" class="form-control" value="<?php echo $selected['company'] ?>" required><br>


   <label>Address</label>
  <textarea type="text" name="address" class="form-control"  required><?php echo $selected['address'] ?></textarea><br>

   <label>City</label>
  <input type="text" name="city" class="form-control" value="<?php echo $selected['city'] ?>" required><br>

   <label>Username</label>
  <input type="text" name="username" maxlength="10" class="form-control" value="<?php echo $selected['username'] ?>" required><br>

   <label>Password</label>
  <input type="text" name="password" maxlength="10" class="form-control" value="<?php echo $selected['password'] ?>" required><br>

  <center> <span id="wait_tip" style="display:none;"> Please wait!..</span></center><br>


  <center>
  <button id="submit_btn" type="submit" class="btn btn-default" name="update">UPDATE</button>
 
</center>
</form>

 
        <!-- form end -->
      </div>
    </div>
  
   
 </div>
<br><br>
	
</body>
</html>