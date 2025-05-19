<?php
// Include the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check if the respondId and ticketId are set in the URL
    if (isset($_GET['respondId']) && isset($_GET['ticketId'])) {
        $respondId = $_GET['respondId']; // Get the respond ID
        $ticketId = $_GET['ticketId']; // Get the ticket ID

        // Prepare the SQL statement to delete the response from the database
        $sql = "DELETE FROM respond WHERE respondId = '$respondId'";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to the tickets page after successful deletion
            header("Location: tickets.php?ticketId=$ticketId");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; // Display error message if deletion fails
        }
    } else {
        echo "Error: respondId or ticketId not set."; // Error message if IDs are not provided
    }
} else {
    echo "Error: Invalid request method."; // Error message for invalid request method
}
?>
