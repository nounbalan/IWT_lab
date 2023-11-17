<?php
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    include('db/dbconnect.php');
    $query = "SELECT * FROM `exercise_8` WHERE id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
}
 

if(isset($_POST['submit'])){
    // Get the data from the form.
    include('db/dbconnect.php');
$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$job_title = $_POST['job_title'];



// Prepare the UPDATE statement.
$sql = "UPDATE exercise_8 SET name ='$name', email ='$email', dob ='$dob', mobile = '$mobile', address ='$address', job_title ='$job_title' WHERE id ='$id'";
$stmt = mysqli_query($conn,$sql);

if($stmt==True){

// Redirect the user back to the original page.
header('Location: index.php');
}
else{
    echo "Error occured";
}

}

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.css">
</head>
<body>

<h3>Edit Contact Information</h3>

<div class="form">
  <form action="" method="POST">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']?>" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']?>" placeholder="Your Email..">

    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" value="<?php echo $row['dob']?>" placeholder="Your Email..">

    <label for="Mobile">Mobile No.</label>
    <input type="number" id="Mobile" name="mobile" value="<?php echo $row['mobile']?>" placeholder="Your Mobile..">

    <label for="address">Address</label>
    <textarea name="address"><?php echo $row['address']?></textarea>

    <label for="job_title">Job Title</label>
    <input type="text" id="job_title" name="job_title" value="<?php echo $row['job_title']?>" placeholder="Job Title..">

    <!-- <label for="Organization">Organization Name</label>
    <input type="text" id="Organization" name="organization" placeholder="Organization.."> -->


    <!-- <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
  
    <input type="submit" name="submit" value="Update">
  </form>
</div>

</body>
</html>


