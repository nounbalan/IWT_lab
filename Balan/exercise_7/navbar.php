<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
   $loggedin=true;
}else{
    $loggedin=false;
}

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php
  if(!$loggedin){
  echo'<a class="navbar-brand" href="index.php">My Company</a>';
  }else{
    echo'<a class="navbar-brand" href="home.php">My Company</a>';
  }
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About us</a>
      </li>
      <?php
      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">Sign Up</a>
      </li>';
      }
      ?>
      <?php
       if($loggedin){
      echo'<li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>';
       }
      ?>
     

    </ul>
  </div>
</nav>
