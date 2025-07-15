<?php
session_start();

$_SESSION['user_id'];
if(empty($_SESSION['user_id']))
{
  header("location:index");
}

$_SESSION['name'];
if(empty($_SESSION['name']))
{
  header("location:index");
}


?>
<style type="text/css">
  .menus li {font-size:17px;line-height:32px;}
</style>
<div style="background:#232F3F;margin:auto;" class="row">
	<center>
	<div class="col-sm-2">
     <h3 id="heading">Online Auction</span></h3>
    
	</div>

	<div class="col-sm-7">
		<form method="post" action="search">
    <div style="margin-top:5px;width:90%;" class="input-group">
 <input type="text" name="search" class="form-control" placeholder="Search Products here.." required>
       <span style="background:orange;" class="input-group-addon">
   <button style="background:none;border:none;" type="submit" name="searchbtn">
       	<i style="font-size:16px;" class="glyphicon glyphicon-search"></i>
       </span>
   </button>
  </div>
       </form>
	</div>

	<div class="col-sm-3">
  <img class="img-responsive" style="margin-top:5px;" src="gmc_pics/aj.jpg">
	</div>
	</center>
	</div>
	
	<!-- /////////////////////////////// first end /////////////////////////////////////////// -->
	
    <div style="background:#232F3F;margin:auto;" class="row">
	
  <center>
	<div class="col-sm-2">
		<i style="font-size:27px;color:white;" class="glyphicon glyphicon-map-marker"></i>
		<span id="deliver">
		    <b>All Over India</b></span>
	</div>
	</center>
	<div class="col-sm-7">
		<ul class="menus">
      <li><b style="color:white;"><?php echo $_SESSION['name'] ?></b></li>
			<a href="home"><li><b style="color:white;">Home</b></li></a>
			<a href="profile"><li><b style="color:white;">Profile</b></li></a>
			<a href="history"><li>History</li></a>
            <a href="logout"><li><b style="color:white;">Logout</b></li></a>
			
		</ul>
	</div>
	
	</div>

   
   