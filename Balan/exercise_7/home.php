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
            <p>My Company</p>
        </div>
    </header>

    <?php 
    if(isset($_SESSION['loggedin'])){
    include('partial/dbconnect.php');
  
    }

    if($_SESSION['role']=='employee'){
        include('partial/dbconnect.php');
        $query= "SELECT * FROM exercise_7 WHERE `role`='admin'";
        $result = mysqli_query($conn,$query);
    }else{
        include('partial/dbconnect.php');
        $query= "SELECT * FROM exercise_7 WHERE `role`='employee'";
        $result = mysqli_query($conn,$query);
    }
    ?>

    <!-- User's Courses or Projects Section -->
    <section class="user-projects py-5">
        <div class="container">
            <h2><?php if($_SESSION['role']=='employee') { echo "Admin"; } else { echo "Employee"; } ?> Information</h2>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>DOB</th>
                    <?php if($_SESSION['role']=='admin'){ ?>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Hobby</th>
                    <?php } ?>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                         while($row = mysqli_fetch_assoc($result)){
                        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                     <?php if($_SESSION['role']=='admin') { ?>
                        <td><?php echo $row['job_title']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td><?php echo $row['hobby']; ?></td>
                    <?php } ?>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- Repeat similar cards for other courses or projects -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="container">
            <p>&copy; 2023 My Company</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>