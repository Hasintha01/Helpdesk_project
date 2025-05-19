<?php
// Include the database connection 
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST["userId"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $contactNo = $_POST["contactNo"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];

    // Update data in the database
    $sql = "UPDATE user
            SET fName='$fName', lName='$lName', email='$email', password='$password', contactNo='$contactNo', role='$role', gender='$gender', dob='$dob' 
            WHERE userId='$userId'"; // Use $userid here

    // Check if update was successful
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = 'usermanagement.php';</script>";
        exit();
    } else {
        echo "Details update failed: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
