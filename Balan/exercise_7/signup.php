
<?php
$showAlert = false;
$showError = false;
$emailExist=false;

if (isset($_POST['submit'])) {
    include('partial/dbconnect.php');
  if($_POST['role']=='admin'){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $role = $_POST['role'];
  }else{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $job_title = $_POST['job_title'];
    $salary = $_POST['salary'];
    $hobby = implode(',', $_POST['hobby']);
    $address = $_POST['address'];
    $role = $_POST['role'];
  }
    

   
    // Use prepared statement to protect against SQL injection
    $sql = "SELECT * FROM `exercise_7` WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result1 = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result1) > 0) {
        $emailExist = "Email already exists.";
    } else {
        if ($password == $cpassword) {
            // Use prepared statement to insert data
            if($role=='admin'){
              echo "admin";
             
              $query = "INSERT INTO `exercise_7` (`name`, `email`, `password`, `gender`, `dob`,`address`,`role`, `dt`) VALUES(?, ?, ?, ?, ?, ?, ?, current_timestamp())";
              $stmt = mysqli_prepare($conn, $query);
              mysqli_stmt_bind_param($stmt, "sssssss", $name, $username, $password, $gender, $dob,$address,$role);
  
              if (mysqli_stmt_execute($stmt)) {
                  $showAlert = true;
              } else {
                  // Handle database error
                  $showError = "Error: " . mysqli_error($conn);
              }
            }else{
              echo "employee";
              $query = "INSERT INTO `exercise_7` (`name`, `email`, `password`, `gender`, `dob`, `job_title`,`salary`,`hobby`,`address`,`role`, `dt`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp())";
              $stmt = mysqli_prepare($conn, $query);
              mysqli_stmt_bind_param($stmt, "ssssssisss", $name, $username, $password, $gender, $dob, $job_title,$salary,$hobby,$address,$role);
  
              if (mysqli_stmt_execute($stmt)) {
                  $showAlert = true;
              } else {
                  // Handle database error
                  $showError = "Error: " . mysqli_error($conn);
              }
            }
           
        } else {
            $showError = "Passwords do not match.";
        }
    }
    
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Department application</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
  <?php require('navbar.php'); ?>
    <?php
    if($showAlert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> Your account is created and now can can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$showError.'.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
          }
      if($emailExist){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$emailExist.'.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
          }
?>
  <div class="container my-4">
    <h1 class="text-center">Registration Form</h1>
  <form action="" method="post" >
   <div class="form-group">
    <label for="course">Select to Register As</label>
    <select name="role" id="role" class="form-control" required>
      <option value="">Select to Register As</option>
      <option value="employee">Employee</option>
      <option value="admin">Admin</option>
     
    </select>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <label for="">Gender :</label>
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value="Male">Male
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value="Female">Female
  </label>
</div>

<div class="form-group">
    <label for="dob">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob">
  </div>

  <div class="form-group admin">
    <label for="job_title">Job Title</label>
    <input type="text" class="form-control" id="job_title" name="job_title">
  </div>

  <div class="form-group admin">
    <label for="salary">Salary</label>
    <input type="number" class="form-control" id="salary" name="salary">
  </div>
     <div class="form-group admin">
     <label for="">Hobbies :</label>
        <input type="checkbox" name="hobby[]" value="Cooking"> <label for=""> Cooking</label>
        <input type="checkbox" name="hobby[]" value="Dancing"> <label for=""> Dancing</label>
        <input type="checkbox" name="hobby[]" value="Music"> <label for=""> Music</label>
     </div>
     <div class="form-group">
     <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea><br/>
     </div>



  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">Both password must be same</small>
  </div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <a href="login.php">Already register!</a>
</form>
</div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>

 <script>

$(document).ready(function(){
  //$('#row_dim').hide(); 
  $('#role').change(function(){
      if($('#role').val() != 'admin') {
          $('.admin').show(); 
      } else {
          $('.admin').hide(); 
      } 
     // alert('hello');
  });
});
 </script>

</html>