<?php
// Include database connection file
@include "connection.php";

// Start the session
session_start();

if (!isset($_SESSION['user_registration']) && !isset($_SESSION['admin_registration'])) {
    header('location:../login_and_register/login_form.php');
    exit();
}

// Identify the user based on the session variable set during login
$registrationNo = isset($_SESSION['user_registration']) ? $_SESSION['user_registration'] : $_SESSION['admin_registration'];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the modified form data
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $contactNo = mysqli_real_escape_string($conn, $_POST['contactNo']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    // Prepare the SQL query to update the user's details
    $update_user = "UPDATE user 
                    SET fName = '$fName', 
                        lName = '$lName', 
                        contactNo = '$contactNo', 
                        role = '$role', 
                        gender = '$gender', 
                        dob = '$dob' 
                    WHERE userId = '$registrationNo'";

    // Execute the query
    if (mysqli_query($conn, $update_user)) {
        echo "Profile updated successfully!";
        // Optionally, redirect the user back to the profile page
        header('Location: profilepage.php');
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
