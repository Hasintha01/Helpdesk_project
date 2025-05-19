<?php 
// Include the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respondId = $_POST['respondId']; 
    $respond = $_POST['respond_message']; 
    $ticketId = $_POST['ticketId']; 

    // Update the response in the database
    $sql = "UPDATE respond SET respond_message = '$respond' WHERE respondId = '$respondId'";

    if ($conn->query($sql) === TRUE) {
        header("Location: tickets.php?ticketId=$ticketId"); // Redirect back to tickets.php with the ticket ID
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Display error message if update fails
    }
} else {
    // Fetch the existing response to prefill the form
    $respondId = $_GET['respondId']; 
    $ticketId = $_GET['ticketId']; 
    $result = $conn->query("SELECT * FROM respond WHERE respondId = '$respondId'"); // Fetch the response based on respond ID

    if ($result->num_rows > 0) {
        $response = $result->fetch_assoc(); 
    } else {
        echo "Response not found."; // Display message if response does not exist
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Response</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
</head>
<body>

    <h2>Update Response</h2>
    <form action="update.php" method="POST">
        <textarea name="respond_message" required><?php echo htmlspecialchars($response['respond_message']); ?></textarea><br> <!-- Prefill with the current response message -->
        <input type="hidden" name="respondId" value="<?php echo htmlspecialchars($respondId); ?>"> <!-- Ensure respond ID is hidden -->
        <input type="hidden" name="ticketId" value="<?php echo htmlspecialchars($ticketId); ?>"> <!-- Ensure ticket ID is hidden -->
        <input type="submit" value="Update">
    </form>

</body>
</html>
