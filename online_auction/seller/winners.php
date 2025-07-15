<?php
include('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Winners</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
 .table-responsive {background-color: rgba(0 , 0, 0 , 0.3);padding:20px;color:white;}
 tr th {background-color: rgba(0 , 0, 0 , 0.4);}
 tr td {text-align:center;}
</style>
</head>
<body>
  
   <?php
  include('menus.php');
  ?>

  <div class="container-fluid">

   <div class="table-responsive">
    <h3>WINNERS LIST</h3>
        <table class="table table-bordered">
          <tr>
            <th>Sr No</th>
            <th>Seller Id</th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>User Id</th>
            <th>User Name</th>
            <th>Auction Price</th>
          </tr>
        <?php
        $select = mysqli_query($con,"SELECT * FROM tbl_boli1 WHERE seller_id = '".$_SESSION['seller_id']."' ");
        $counter = 1;
        while($selected = mysqli_fetch_assoc($select))
        {
        ?>
          <tr>
            <td><?php echo $counter ?></td>
            <td><?php echo $selected['seller_id'] ?></td>
            <td><?php echo $selected['product_id'] ?></td>
            <td><?php echo $selected['pname'] ?></td>
            <td><?php echo $selected['user_id'] ?></td>
            <td><?php echo $selected['name'] ?></td>
            <td><?php echo $selected['boli'] ?></td>
          </tr>
          <?php
          $counter++;
          }
          ?>
        </table>
      </div>
  
   
 </div>
<br><br>
	
</body>
</html>