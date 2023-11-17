
<?php 
    if(isset($_POST['submit'])){
       
        $conn = mysqli_connect("localhost", "root", "", "iwt_lab");
        
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        } else {
            
            $name = $_POST['name'];
            $gender = $_POST['gender'];
          //  $filename = $_FILES['fileupload']['name'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $job_title = $_POST['job_title'];
            $salary = $_POST['salary'];
            $martial_status = $_POST['martial_status'];
            $hobby = implode(',', $_POST['hobby']);
            $address = $_POST['address'];

            //$tempname = $_FILES["fileupload"]["tmp_name"];
           

          //  $targetDirectory = "/opt/lampp/htdocs/IWT_lab/exercise_5/image/"; 
           // $targetFile = $targetDirectory.basename($filename); 
           
           // echo $_FILES["fileupload"]["tmp_name"];
           
           // if (move_uploaded_file($_FILES["fileupload"]["tmp_name"],$targetDirectory.$filename)) {
                $query = "INSERT INTO exercise_5 (`name`, `gender`, `file`, `email`, `dob`, `job_title`, `salary`, `martial_status`, `hobby`, `address`) VALUES ('$name', '$gender', '$filename', '$email', '$dob', '$job_title', '$salary', '$martial_status', '$hobby', '$address')";
        
                if (mysqli_query($conn, $query)) {
                    echo "Data Inserted Successfully";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            // } else {
            //     echo "File upload failed!";
            // }
          
            mysqli_close($conn);
        }
       
        
    }
?>