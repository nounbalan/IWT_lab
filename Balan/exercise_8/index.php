<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>contact</title>
</head>
<body>
<h1>Contacts</h1>
<a href="insert.php">ADD</a>

<?php 
include('db/dbconnect.php');


$query = "SELECT * FROM `exercise_8`";
$result = mysqli_query($conn,$query);


?>


<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Action</th>
  </tr>
  <?php 
  while($row = mysqli_fetch_assoc($result)){
  ?>
  <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><a href="edit.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
    <a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
  </td>
  </tr>
 <?php } ?>
 
  
</table>

</body>
</html>