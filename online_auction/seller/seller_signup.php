<?php
include('../connect.php');

if(isset($_POST['btn_seller']))
{
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $contact = mysqli_real_escape_string($con,$_POST['contact']);
  $company = mysqli_real_escape_string($con,$_POST['company']);
  $address = mysqli_real_escape_string($con,$_POST['address']);
  $city = mysqli_real_escape_string($con,$_POST['city']);
  $file = mysqli_real_escape_string($con,$_FILES['file']['name']);
  $extra = 'e';
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  $insert = mysqli_query($con,"INSERT INTO tbl_sellers (`name`,`contact`,`company`,`address`,`city`,`file`,`username`,`password`) VALUES ('$name','$contact','$company','$address','$city','$extra$file','$username','$password')");
  if($insert)
  {
    echo '<script>
    alert("You have successfully registered !..");
    window.location.href="index";
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
    imagejpeg($temp_min,"proofs/e".$post_photo,80);   //copy image in folder


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller Sign Up Page</title>
  <link rel="icon" href="<?php include('icon.php');?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body {background-image:url(images/back.jpg);}
  	form {box-shadow:0 0 20px white;padding:20px;margin-top:50px;border-radius:10px;
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4">
				<!-- form start -->
				<form method="post" enctype="multipart/form-data">

					<h3 style="text-align:center;color:white;">SELLER REGISTRATION</h3>
					<hr>
 
  <label>Name</label>
  <input type="text" name="name" class="form-control" placeholder="Enter Name here" required><br>

   <label>Contact</label>
  <input type="text" name="contact" maxlength="10" class="form-control" placeholder="Enter Contact here" required><br>

   <label>Company</label>
  <input type="text" name="company" class="form-control" placeholder="Enter Company here" required><br>


   <label>Address</label>
  <textarea type="text" name="address" class="form-control" placeholder="Enter Name here" required></textarea><br>

   <label>City</label>
  <input type="text" name="city" class="form-control" placeholder="Enter City here" required><br>

  <label>Proof Id (License Id / Aadhar Id / Voter Id)</label>
  <input type="file" name="file" class="form-control" required><br>


   <label>Username</label>
  <input type="text" name="username" maxlength="10" class="form-control" placeholder="Enter Username here" required><br>

   <label>Password</label>
  <input type="text" name="password" maxlength="10" class="form-control" placeholder="Enter Password here" required><br>

  <center> <span id="wait_tip" style="display:none;"> Please wait!..</span></center><br>


	<center>
  <button id="submit_btn" type="submit" class="btn btn-default" name="btn_seller">Register</button>
 
</center>
</form>

 <br>

  <center><p style="color:black;font-size:18px;">Back to <a style="color:black;" href="index"><i>Login</i></a></p></center>

				<!-- form end -->
			</div>
		</div>
	</div>
</body>
</html>