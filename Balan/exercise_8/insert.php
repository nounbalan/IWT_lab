<?php
$showAlert = false;
if (isset($_POST['submit'])) {
  include('db/dbconnect.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $job_title = $_POST['job_title'];
    //$Organization = $_POST['organization'];

   

    $query = "INSERT INTO `exercise_8`(`name`, `email`, `dob`, `mobile`, `address`, `job_title`) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // The correct way to bind parameters is to use 's' for string, 'i' for integer, and '&' for variable references.
    if ($stmt !== null) {
      mysqli_stmt_bind_param($stmt, 'sssiss', $name, $email, $dob, $mobile, $address, $job_title);

      if (mysqli_stmt_execute($stmt)) {
          echo "Data Inserted Succesfully";
          header('location:index.php');
      } else {
          // Handle database error
          $showError = "Error: " . mysqli_error($conn);
      }
  }
  
    }
   

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.css">
</head>
<body>

<h3>Add Contact Information</h3>

<div class="form">
  <form action="" method="POST">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your Email..">

    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" placeholder="Your Email..">

    <label for="Mobile">Mobile No.</label>
    <input type="number" id="Mobile" name="mobile" placeholder="Your Mobile..">

    <label for="address">Address</label>
    <textarea name="address"></textarea>

    <label for="job_title">Job Title</label>
    <input type="text" id="job_title" name="job_title" placeholder="Job Title..">

    <!-- <label for="Organization">Organization Name</label>
    <input type="text" id="Organization" name="organization" placeholder="Organization.."> -->


    <!-- <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->
  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>


