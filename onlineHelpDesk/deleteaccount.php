<?php
session_start(); // Start the session to access session variables

include 'connection.php'; // Include your database connection file

// Check if userId is set in POST request
if (isset($_POST['userId'])) {
    $userId = $_POST['userId']; // Get the userId from the POST request

    // Prepare and execute the SQL statement to delete the user from the 'user' table
    $sql = "DELETE FROM user WHERE userId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId); // 's' indicates that userId is an integer

    if ($stmt->execute()) {
        // If successful, destroy the session and redirect to the registration page
        session_destroy(); // Log out the user by destroying the session
        header("Location:../login_and_register/register_form.php"); // Redirect to the registration page (adjust path as needed)
        exit();
    } else {
        // If there was an error, display an error message
        echo "Error deleting account: " . $conn->error;
    }
    $stmt->close();
} else {
    // Redirect to profile page if no userId was provided
    header("Location: profilepage.php");
    exit();
}

$conn->close();
?>
