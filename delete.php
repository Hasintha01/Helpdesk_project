<?php
// Include the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $respondid = $_GET['respondid'];
    $ticketid = $_GET['ticketid'];

    // Delete the response from the database
    $sql = "DELETE FROM responds WHERE respondid = $respondid";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: tickets.php?ticketid=$ticketid"); // Redirect back to tickets page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
