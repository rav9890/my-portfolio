<?php
include('connect.php');

if(isset($_POST['update']))
{
  $hidid = mysqli_real_escape_string($con,$_POST['hidid']);
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $contact = mysqli_real_escape_string($con,$_POST['contact']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $city = mysqli_real_escape_string($con,$_POST['city']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  $up_seller = mysqli_query($con,"UPDATE tbl_users SET `name`='$name',`contact`='$contact',`address`='$address',`city`='$city',`email`='$email',`username`='$username',`password`='$password' WHERE user_id = '".$hidid."' ");
  
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
body {background-image:url(images/back11.jpg);}
  form {box-shadow:0 0 20px white;padding:20px;border-radius:20px;background-color: rgba(0 , 0, 0 , 0.4);margin-top:40px;}
  label {color:white;}
</style>  

</head>
<body>
 <?php
 include('header.php');
 ?>

    
    
    <!-- //////////////////// Products start //////////////////////////////////////// -->   
   <div class="container-fluid">

    <?php

    $select = mysqli_query($con,"SELECT * FROM tbl_users WHERE user_id = '".$_SESSION['user_id']."' ");
    $selected = mysqli_fetch_array($select);

    ?>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <!-- form start -->
        <form method="post">

          <h3 style="text-align:center;color:white;">UPDATE PROFILE</h3>
          <hr>
 <input type="hidden" name="hidid" value="<?php echo $selected['user_id'] ?>">
  <label>Name</label>
  <input type="text" name="name" class="form-control" value="<?php echo $selected['name'] ?>" required><br>

   <label>Contact</label>
  <input type="text" name="contact" maxlength="10" class="form-control" value="<?php echo $selected['contact'] ?>" required><br>

   <label>Address</label>
  <textarea type="text" name="address" class="form-control"  required><?php echo $selected['address'] ?></textarea><br>

   <label>City</label>
  <input type="text" name="city" class="form-control" value="<?php echo $selected['city'] ?>" required><br>

   <label>Email</label>
  <input type="text" name="email" class="form-control" value="<?php echo $selected['email'] ?>" required><br>

   <label>Username</label>
  <input type="text" name="username" maxlength="10" class="form-control" value="<?php echo $selected['username'] ?>" required><br>

   <label>Password</label>
  <input type="text" name="password" maxlength="10" class="form-control" value="<?php echo $selected['password'] ?>" required><br>
<br>
 
  <center>
  <button type="submit" class="btn btn-default" name="update">UPDATE</button>
 
</center>
</form>

 <br>

 
        <!-- form end -->
      </div>
    </div>
  </div>
   <!--  ///////////////////// Products end ////////////////////////////////////// -->

    <?php
    include('footer.php');
    ?>

  
</body>
</html>

