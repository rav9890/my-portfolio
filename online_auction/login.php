<?php
session_start();

include('connect.php');

if(isset($_POST['login']))
{
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $select = "SELECT * FROM tbl_users WHERE username = '".$user."' AND password = '".$pass."' ";
  $selected = mysqli_query($con,$select);
  $row = mysqli_num_rows($selected);
  
  while($show = mysqli_fetch_assoc($selected))
  {
    $_SESSION['user_id']=$show['user_id'];
    $_SESSION['name']=$show['name'];
   
  }

  if($row>0)
  {
    header("location:home");
  }else
  {
    echo "<h4>Invalid Username or Password !..</h4>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script language="javascript" type="text/javascript">
     window.history.forward();
  </script>
  <title>Users Login Page</title>
  <link rel="icon" href="<?php include('icon.php');?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body {background-image:url(images/back11.jpg);}
  	form {box-shadow:0 0 20px white;padding:20px;margin-top:100px;border-radius:10px;
  	      background-color: rgba(0 , 0, 0 , 0.5);}
  	#wait_tip {background:white;text-align:center;padding:5px;color:black;width:100%;}

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
				<form method="post">

					<h3 style="text-align:center;color:white;">USER LOGIN</h3>
					<br>
 
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" class="form-control" name="user" placeholder="Enter Username" required>
  </div><br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" class="form-control" name="pass" placeholder="Enter Password" required>
  </div><br>

  <center> <span id="wait_tip" style="display:none;"> Please wait!..</span></center><br>


	<center>
  <button id="submit_btn" type="submit" class="btn btn-default" name="login">Login</button>
 
</center>
</form>

 <br>

  <center><p style="color:black;font-size:18px;">Create account <a href="user_signup"><i>Sign Up</i></a> here</p></center>

				<!-- form end -->
			</div>
		</div>
	</div>
</body>
</html>