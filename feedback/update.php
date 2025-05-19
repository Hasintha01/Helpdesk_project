<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include 'connection.php'; // Include the database connection

// Initialize variables
$name = $email = $message = '';

// Check if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Load existing feedback
    $stmt = $pdo->prepare("SELECT * FROM form_det WHERE id = ?");
    $stmt->execute([$id]);
    $feedback = $stmt->fetch();

    if ($feedback) {
        $name = $feedback['name'];
        $email = $feedback['email'];
        $message = $feedback['message'];
    } else {
        header("Location: insert.php"); // Redirect if feedback not found
        exit();
    }
}

// Handle Update operation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and execute the SQL statement to update feedback
    $stmt = $pdo->prepare("UPDATE form_det SET name = ?, email = ?, message = ? WHERE id = ?");
    $stmt->execute([$name, $email, $message, $id]); // Execute the prepared statement
    header("Location: insert.php"); // Redirect back to the insert page
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/insert.css"> <!-- Link to external stylesheet -->
    <title>Feedback</title>
    <link rel="icon" href="help-desk01.png" type="image/x-icon">
</head>
<body>
    <h2>Edit Feedback</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>

        <div class="form-group">
            <label for="message">Your Feedback:</label>
            <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($message); ?></textarea>
        </div>

        <button type="submit" name="update">Update Feedback</button>
    </form>
</body>
</html>