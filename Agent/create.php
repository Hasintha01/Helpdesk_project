<?php
// Include database connection
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $respond_message = $_POST['respond_message']; 
    $ticketId = $_POST['ticketId']; 
    $agentId = $_POST['agentId']; 

    // Fetch the registrationId from the ticket based on ticketId
    $ticketSql = "SELECT registrationId FROM ticket WHERE ticketId = '$ticketId'";
    $ticketResult = $conn->query($ticketSql);

    if ($ticketResult->num_rows > 0) {
        $ticket = $ticketResult->fetch_assoc();
        $userId = $ticket['registrationId']; 
    } else {
        echo "Error: Ticket not found.";
        exit();
    }

    // Attachment placeholder
    $attachment = ''; 

    // Generate a new unique respondId
    $lastIdQuery = "SELECT respondId FROM respond ORDER BY respondId DESC LIMIT 1"; 
    $lastIdResult = $conn->query($lastIdQuery);
    $lastRespondId = $lastIdResult->fetch_assoc()['respondId'];

    // Generate new respondId based on lastRespondId
    if ($lastRespondId) {
        $lastNumericPart = intval(substr($lastRespondId, 1)); 
        $newNumericPart = $lastNumericPart + 1; 
        $respondId = 'R' . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT); 
    } else {
        $respondId = 'R01'; 
    }

    // Check if a response already exists for this ticket
    $checkSql = "SELECT * FROM respond WHERE ticketId = '$ticketId'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Response already exists (not allowing duplicates)
        header("Location: tickets.php?ticketId=$ticketId&response_exists=true");
        exit();
    } else {
        // Insert the response into the database
        $sql = "INSERT INTO respond (respondId, ticketId, respond_message, agentId, userId, attachment) 
                VALUES ('$respondId', '$ticketId', '$respond_message', '$agentId', '$userId', '$attachment')";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to tickets.php with the ticket ID and response_submitted flag
            header("Location: tickets.php?ticketId=$ticketId&response_submitted=true");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
