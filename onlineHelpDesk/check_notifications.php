<?php
session_start(); // Start the session to access user data
require_once "connection.php"; // Include your database connection

// Check if the user is logged in
if (isset($_SESSION['user_registration'])) {
    $registrationNo = $_SESSION['user_registration'];

    // Check for new responses for the user's tickets
    $sql = "SELECT COUNT(*) as newCount FROM respond WHERE userId = ? AND ticketId IN (SELECT ticketId FROM ticket WHERE registrationId = ?) AND respond_message IS NOT NULL";

    $stmt = $conn->prepare($sql);
    // Bind parameters and execute
    $stmt->bind_param("ss", $registrationNo, $registrationNo);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Return JSON response; show red dot if there's any new response
    echo json_encode(['hasNewResponse' => $row['newCount'] > 0]);
} else {
    // If the user is not logged in, return no new response
    echo json_encode(['hasNewResponse' => false]);
}

// Close the database connection
$conn->close();
?>
