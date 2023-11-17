
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Department Application</title>
    <style>
    .fixed-banner {
      
      margin: 0 auto; /* Center the banner horizontally */
      background-color: #3498db; /* Set your desired background color */
     padding: 20px;
       /* Center the content within the banner */
    }

    .banner-img {
      max-width: 100%; /* Ensure the image doesn't exceed the banner's width */
    }

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color:white;
  font-size:50px;
}
  </style>
</head>
<body>




<?php require('navbar.php'); ?>

 <!-- Hero Section -->
 <header class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Computer Science Department</h1>
            <p>Your gateway to the world of computer science.</p>
            <!-- <a href="#" class="btn btn-light btn-lg">Explore Courses</a> -->
        </div>
    </header>
<div>
    <img src="images/slider/banner.jpeg" width="100%" height="500px" alt="banner"/>
    <div class="centered">Welcome to Pondicherry University</div>

</div>
    <!-- Featured Courses Section -->
    <section class="featured-courses py-5">
        <div class="container">
            <h2 class="text-center mb-4">Featured Courses</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Master of Computer Application - MCA</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Master of Computer Science - MSC</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Master of Technology - M.Tech</h5>
                        </div>
                    </div>
                </div>
               
               
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
          <ul>
           <li>Promoting excellence in the learning process.</li> 
<li>Expanding the horizon of knowledge through creative research.</li>
<li>Maintaining high ethical standard in teaching, research and administration.</li>
<li>Catering to diverse needs of multi-cultural, multi-linguist strata of society.</li>
<li>Providing good academic ambience in pursuit of excellence in education.</li>
<li>Eco-friendly campus as a substratum of multi-disciplinary courses.</li>

          </ul>
           
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
