<?php
include('../connect.php');

error_reporting(0);
$id = $_GET['id'];
$update = mysqli_query($con,"UPDATE tbl_products SET `pstatus`='APPROVED' WHERE product_id = '".$id."' ");

if(isset($_POST['btnhidpro']))
{
  $hidpro = $_POST['hidpro'];
  mysqli_query($con,"DELETE FROM `tbl_products` WHERE `product_id` = '".$hidpro."' ");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
 .table-responsive {background-color: rgba(0 , 0, 0 , 0.3);padding:20px;color:white;}
 thead tr th {background-color: rgba(0 , 0, 0 , 0.4);}
</style>
</head>
<body>
  
   <?php
  include('menus.php');
  ?>

  <div class="container-fluid">

   <div class="table-responsive">
    <h3>PRODUCTS LIST</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Sr No</th>
          <th>Image</th>
          <th>Product Id</th>
          <th>Seller Id</th>
          <th>Name</th>
          <th>Company</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Date</th>
          <th>Starting Time</th>
          <th>Valid Time</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <?php
      $select = mysqli_query($con,"SELECT * FROM tbl_products ");
      $counter = 1;
      while($row = mysqli_fetch_assoc($select)){
      ?>
        <tr>
          <td><?php echo $counter ?></td>
          <td>
            <a style="color:white;" href="<?php echo "../seller/products/".$row['file'] ?>">VIEW</a>
          </td>
          <td><?php echo $row['product_id'] ?></td>
          <td><?php echo $row['seller_id'] ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['company'] ?></td>
          <td><?php echo $row['pname'] ?></td>
          <td><?php echo $row['price'] ?></td>
          <td><?php echo $row['adate'] ?></td>
          <td><?php echo $row['start'] ?></td>
          <td><?php echo $row['valid'] ?></td>
          <td>
           <a style="color:white;" onclick="return confirm('Are you sure ?')" href="products?id=<?php echo $row['product_id'] ?>"> 
            <?php echo $row['pstatus'] ?>
           </a>
            </td>
          <td>
            <form method="post">
              <input type="hidden" name="hidpro" value="<?php echo $row['product_id'] ?>">
            <button style="background:none;" type="submit" name="btnhidpro">DELETE</button>
          </form>
          </td>
        </tr>
        <?php
        $counter++;
         }
        ?>
      </tbody>
    </table>
  </div>
  
   
 </div>
<br><br>
	
</body>
</html>