<?php
include('../connect.php');

error_reporting(0);

$id = $_GET['id'];
$delete = mysqli_query($con,"DELETE FROM tbl_category WHERE category_id = '".$id."' ");

if(isset($_POST['btn_category']))
{
  $category = mysqli_real_escape_string($con,$_POST['category']);
  $insert = mysqli_query($con,"INSERT INTO tbl_category (`category`) VALUES ('$category')");
  if($insert)
  {
    echo "
    <script>
    alert('Successfully added new category !..');
    window.location.href='add_category';
    </script>
    ";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Category</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
  form {background-color: rgba(0 , 0, 0 , 0.3);
        padding:20px;
        box-shadow:0 0 20px white;}
  .table-responsive {background-color: rgba(0 , 0, 0 , 0.3);padding:20px;color:white;}
 thead tr th {background-color: rgba(0 , 0, 0 , 0.4);}
</style>
</head>
<body>
  
   <?php
  include('menus.php');
  ?>

  <div class="container-fluid">

   <div class="row">
     <div class="col-sm-1">
       
     </div>
      <div class="col-sm-4">
       <!-- form start -->
       <form method="post">
         <h3 style="color:white;text-align:center;">ADD NEW CATEGORY</h3>
         <hr><br>
         <input type="text" name="category" class="form-control" placeholder="Enter New Category" required>
         <br><br>
         <button style="float:right;width:40%;padding:10px;background:black;color:white;font-size:18px;" class="btn btn-default" type="submit" name="btn_category">Add</button>
         <div style="clear:both;"></div>
       </form>
       <!-- form end -->
     </div>
      <div class="col-sm-1">
       
     </div>
      <div class="col-sm-4">
       <div class="table-responsive">
         <table class="table table-bordered">
           <thead>
             <tr>
               <th>Category Id</th>
               <th>Category</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php
            $select = mysqli_query($con,"SELECT * FROM tbl_category ");
            while($row = mysqli_fetch_assoc($select)){
            ?>
             <tr>
               <td><?php echo $row['category_id'] ?></td>
               <td><?php echo $row['category'] ?></td>
               <th>
                 <a onclick="return confirm('Are you sure ?')" style="color:white" href="add_category?id=<?php echo $row['category_id'] ?>">
                   DELETE
                 </a>
               </th>
             </tr>
             <?php
              }
             ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>
  
   
 </div>
<br><br>
	
</body>
</html>