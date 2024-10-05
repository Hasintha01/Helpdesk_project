<?php
// Include database connection
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $respond = $conn->real_escape_string($_POST['respond']);
    $ticketid = $conn->real_escape_string($_POST['ticketid']);

    // Check if a response already exists for this ticket
    $checkSql = "SELECT * FROM responds WHERE ticketid = '$ticketid'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Response already exists
        header("Location: tickets.php?ticketid=$ticketid&response_exists=true");
        exit();
    } else {
        // Insert the response into the database
        $sql = "INSERT INTO responds (ticketid, respond) VALUES ('$ticketid', '$respond')";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to tickets.php with the ticket ID and response_submitted flag
            header("Location: tickets.php?ticketid=$ticketid&response_submitted=true");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
