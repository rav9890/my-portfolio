
<?php

/*$id = basename($_SERVER['PHP_SELF']);*/
/*echo $id;*/

/*$url = $id;
$str = substr(strrchr($url, '.'), 1);
echo $str;*/

$id = $_GET['id'];
echo $id;
if($id=='1')
{
	echo "<script>
   	var a =  confirm('Want to back or refresh page, data may loss?');
   	if(a){
			window.location.href='test1.php';
		}
	</script>";
}
/*else
{
	echo "<script>
   	var a =  confirm('Want to back or refresh page, data may loss 11?');
   	if(a){
			window.location.href='test1.php';
		}
	</script>";
}*/

?>

<!DOCTYPE html>
<html>
<head>

	<title>Test 2 Page</title>
	
	
</head>
<body>


<br>
   <a href="test2.php?id=1">Test 2 page</a>
<br>
   <a href="test1.php">Test 1 page</a>
	<h3>This is Test 2 Page</h3>

</body>
</html>