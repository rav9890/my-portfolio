<?php
include('../connect.php');
error_reporting(0);

$id = $_GET['id'];
$delete = mysqli_query($con,"DELETE FROM tbl_users WHERE user_id = '".$id."' ");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users List</title>
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
    <h3>USERS LIST</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Sr No</th>
          <th>User Id</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>City</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <?php
      $select = mysqli_query($con,"SELECT * FROM tbl_users ");
      $counter = 1;
      while($row = mysqli_fetch_assoc($select)){
      ?>
        <tr>
          <td><?php echo $counter ?></td>
          <td><?php echo $row['user_id'] ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['contact'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td><?php echo $row['city'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['username'] ?></td>
          <td><?php echo $row['password'] ?></td>
          <td>
            <a onclick="return confirm('Are you sure ?')" style="color:white;" href="users_list?id=<?php echo $row['user_id'] ?>">
            DELETE
          </a>
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