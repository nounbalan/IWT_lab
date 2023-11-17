<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['email']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php require('navbar.php'); ?>

  <!-- User Profile Header -->
  <header class="user-profile-header bg-primary text-white text-center py-5">
        <div class="container">
           
            <h1>User's Name :<?php echo $_SESSION['name'] ;?></h1>
            <p>Computer Science Enthusiast</p>
        </div>
    </header>

    <?php 
    if(isset($_SESSION['loggedin'])){
    include('partial/dbconnect.php');
    $id = $_SESSION['id'];
    $query= "SELECT * FROM exercise_6 WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    }
    ?>

    <!-- User's Courses or Projects Section -->
    <section class="user-projects py-5">
        <div class="container">
            <h2>Student Information</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name:</h5>
                    <p class="card-text"><?php echo $data['name'] ;?></p>
                    <h5 class="card-title">Gender:</h5>
                    <p class="card-text"><?php echo $data['gender'] ;?></p>
                    <h5 class="card-title">Email:</h5>
                    <p class="card-text"><?php echo $data['email'] ;?></p>
                    <h5 class="card-title">Password:</h5>
                    <p class="card-text"><?php echo $data['password'] ;?></p>
                    <h5 class="card-title">Course:</h5>
                    <p class="card-text"><?php echo $data['course'] ;?></p>
                </div>
            </div>
            <!-- Repeat similar cards for other courses or projects -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="container">
            <p>&copy; 2023 Computer Science Department</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>