<?php
// Include your database connection file
@include "connection.php";

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $ticketId = intval($_GET['id']); // Get the ticket ID from URL

    // Prepare the query to fetch the attachment and MIME type based on the ticket ID
    $sql = "SELECT attachment, mimeType, subject FROM ticket WHERE ticketId = $ticketId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Get the file content, MIME type, and subject to use as the filename
        $fileContent = $row['attachment'];
        $fileType = $row['mimeType']; // MIME type stored in the database
        $fileName = $row['subject']; // Filename based on the subject

        // Set headers for file viewing or downloading
        header("Content-Disposition: inline; filename=\"$fileName\"");
        header("Content-Type: $fileType"); // Set correct MIME type
        header("Content-Length: " . strlen($fileContent));

        // Output the file content to the browser
        echo $fileContent;
        exit();
    } else {
        echo "Error: No file found for the given ID.";
    }
} else {
    echo "Error: No ID specified.";
}

// Close the database connection
mysqli_close($conn);
?>
