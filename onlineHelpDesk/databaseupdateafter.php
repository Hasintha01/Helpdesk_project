<?php

// Include DB connection
require_once "connection.php";

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ticketId = $_POST['ticketId'];
    $registrationId = $_POST["registrationId"]; 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contactNumber"];
    $subject = $_POST["subject"];
    $message = $conn->real_escape_string($_POST["message"]);

  
    $sql = "UPDATE ticket SET 
                registrationId = ?, 
                name = ?, 
                email = ?, 
                contactNumber = ?, 
                subject = ?, 
                message = ? 
            WHERE ticketId = ?"; 

    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the query
        $stmt->bind_param("ssssssi", $registrationId, $name, $email, $contactNumber, $subject, $message, $ticketId);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "<script>window.location.href='mytickets.php';</script>";
            exit();
        } else {
            echo "Update failed: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "Error preparing the SQL query: " . $conn->error;
    }
}

$conn->close();

?>
