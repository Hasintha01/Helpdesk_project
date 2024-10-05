<?php
// Include the database connection
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respondid = $_POST['respondid'];
    $respond = $_POST['respond'];
    $ticketid = $_POST['ticketid'];

    // Update the response in the database
    $sql = "UPDATE responds SET respond = '$respond' WHERE respondid = $respondid";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: tickets.php?ticketid=$ticketid"); // Redirect back to tickets page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Fetch the existing response to prefill the form
    $respondid = $_GET['respondid'];
    $ticketid = $_GET['ticketid'];
    $result = $conn->query("SELECT * FROM responds WHERE respondid = $respondid");
    $response = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Response</title>
</head>
<body>

    <h2>Update Response</h2>
    <form action="update.php" method="POST">
        <textarea name="respond" required><?php echo htmlspecialchars($response['respond']); ?></textarea><br>
        <input type="hidden" name="respondid" value="<?php echo $respondid; ?>">
        <input type="hidden" name="ticketid" value="<?php echo $ticketid; ?>">
        <input type="submit" value="Update">
    </form>

</body>
</html>
