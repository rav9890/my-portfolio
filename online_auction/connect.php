<?php 
$con = mysqli_connect('localhost','root','');
if($con)
{
	mysqli_select_db($con,'clg_online_auction');
	//echo "Yes Connect !..";
}
?>