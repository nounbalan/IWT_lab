<?php
// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the ID of the record to be deleted
    $id = $_GET['id'];

    // Connect to the database
    include('db/dbconnect.php');

    // Prepare and execute the DELETE query
    $query = "DELETE FROM exercise_8 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
        header('location:index.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>