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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<?php require('navbar.php'); ?>
<header class="bg-light text-white p-4">
        <div class="container">
            <h1 class="text-dark text-center">About Us</h1>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Our Mission</h2>
                <p>
                "At BrightTech Solutions, our mission is to illuminate the world through innovative technology solutions. We believe that technology can empower businesses, enrich lives, and drive positive change in our communities and beyond. We are committed to creating cutting-edge software and hardware that enhance efficiency, connectivity, and sustainability. With a relentless focus on quality and a passion for progress, we strive to be a beacon of light in the tech industry, guiding our clients towards a brighter and more prosperous future. Our success is measured not only by our profitability but by the positive impact we have on our clients, employees, and the world we share."
                </p>
            </div>
            <div class="col-md-6">
                <h2></h2>
                <ul>
                    <li>To serve as an enabler of societal transformation through state-of-art higher education and research that match global benchmarks by providing access, resources and opportunities.</li>
                    <li>To become an institution of global eminence.</li>
                    <li>Adapting to ever-changing needs of the society and industries.</li>
                </ul>
            </div>
        </div>

        <div class="mt-4">
            <h2>Our History</h2>
            <p>
            <b>Founding and Early Years:</b> Begin with the company's founding. Who were the founders, and what inspired them to start the company? Describe the initial vision and challenges faced in the early years.</p>
<p><b>Milestones and Growth:</b> Highlight significant milestones and periods of growth in the company's history. This can include expanding into new markets, launching key products, or acquiring other businesses.</p>
<p><b>Notable Achievements:</b> Discuss any notable achievements, awards, or recognitions received by the company over the years.
            </p>
        </div>
    </div>

    <footer class="bg-dark text-white p-3 fixed-bottom">
        <div class="container">
            <p>&copy; 2023 Computer Science </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>